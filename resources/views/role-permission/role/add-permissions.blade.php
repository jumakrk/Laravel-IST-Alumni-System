<x-app-layout>
    <div class="container mx-auto px-36 py-4">
        <div class="flex justify-center">
            <div class="w-full">

                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                        <span class="block sm:inline">{{ session('status') }}</span>
                    </div>
                @endif

                <div class="bg-white shadow-md rounded-lg">
                    {{-- Top part of form --}}
                    <div class="bg-gray-100 p-4 border-b">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Role : {{ $role->name }}
                            <a href="{{ url('roles') }}" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 text-sm rounded-3xl">Back</a>
                        </h4>
                    </div>
                    <div class="p-4">
                        <form action="{{ url('roles/'.$role->id.'/give-permission') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                @error('permission')
                                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                @enderror
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Permissions</label>

                                <div class="flex flex-wrap">
                                    @foreach ($permissions as $permission)
                                    <div class="mr-24 mb-2">
                                        <label>
                                            <input 
                                                type="checkbox" 
                                                name="permission[]" 
                                                value="{{ $permission->name }}" 
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                id="name" 
                                                class="rounded">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            {{-- Button --}}
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-sm rounded-3xl focus:outline-none focus:shadow-outline">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
