<x-app-layout>

    <div class="container mx-auto px-36 py-4">
        <div class="flex justify-center">
            <div class="w-full">

                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                        <span class="block sm:inline">{{ session('status') }}</span>
                    </div>
                @endif

                <div class="bg-white shadow-md rounded-lg mt-3">
                    <div class="bg-gray-100 p-4 border-b">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Roles 
                            <a href="{{ url('roles/create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 text-sm rounded-3xl">
                                Add Role
                            </a>
                        </h4>
                    </div>
                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left divide-x divide-gray-200">Id</th>
                                        <th class="py-3 px-6 text-left divide-x divide-gray-200">Name</th>
                                        <th class="py-3 px-6 text-left">Action</th>
                                    </tr>
                                </thead>

                                {{-- Table body --}}
                                <tbody class="text-gray-600 text-sm font-light">

                                    @foreach ($roles as $role)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left divide-x divide-gray-200 font-medium">{{ $role->id }}</td>
                                        <td class="py-3 px-6 text-left divide-x divide-gray-200 font-medium">{{ $role->name }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <a href="{{ url('roles/'.$role->id.'/give-permission') }}" class="text-blue-500 font-bold hover:text-blue-700">Add/Edit Role Permission</a>
                                            <span class="mx-1">|</span>
                                            <a href="{{ url('roles/'.$role->id.'/edit') }}" class="text-blue-500 font-bold hover:text-blue-700">Edit Role</a>
                                            <span class="mx-1">|</span>
                                            <a href="{{ url('roles/'.$role->id.'/delete') }}" class="text-red-500 font-bold hover:text-red-700">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
