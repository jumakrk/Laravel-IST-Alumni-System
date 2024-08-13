<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        return view('role-permission.user.index', [
            'users' => $users
        ]);
    }

    public function create(){
        $roles = Role::pluck('name', "name")->all();
        $majors = ['Software Development', 'Cyber Security']; // Updated majors array
        return view('role-permission.user.create', [
            'roles' => $roles,
            'majors' => $majors // Pass majors to the view
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3', 
                'max:255'
            ],
        
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:'.User::class
            ],
        
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],

            'roles' => [
                'required',
                'array'
            ],
            'roles.*' => [
                'string'
            ],

            'major' => [
                'string',
                'required',
            ]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'major' => $request->major,
        ]);

        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User created successfully with roles');
    }

    public function edit(User $user){
        $roles = Role::pluck('name', "name")->all();
        $userRoles = $user->roles->pluck('name')->all();
        $majors = ['Software Development', 'Cyber Security']; // Updated majors array
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'majors' => $majors // Pass majors to the view
        ]);
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3', 
                'max:255'
            ],
        
            'password' => [
                'nullable',
                'confirmed',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'roles' => [
                'required',
                'array'
            ],
            'roles.*' => [
                'string'
            ],

            'major' => [
                'string',
                'required',
            ]
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'major' => $request->major,
        ];

        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User updated successfully with roles');
    }

    public function destroy($userId){
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('/users')->with('status', 'User deleted successfully');
    }
}
