<x-app-layout>
    <div class="container mx-auto px-36 py-4">
        <div class="flex justify-center">
            <div class="w-full">
                <div class="bg-white shadow-md rounded-lg">
                    {{-- Top part of form --}}
                    <div class="bg-gray-100 p-4 border-b">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Create User
                            <a href="{{ url('users') }}" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 text-sm rounded-3xl">Back</a>
                        </h4>
                    </div>
                    <div class="p-4">
                        {{-- Display Validation Errors --}}
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Whoops! Something went wrong.</strong>
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('users') }}" method="POST">
                            @csrf
                            {{-- Input field --}}
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter name">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter email">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter password">
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm password">
                            </div>
                            <div class="mb-4">
                                <label for="major" class="block text-gray-700 text-sm font-bold mb-2">Major:</label>
                                <select name="major" id="major" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" disabled>Select Major</option>
                                    <option value="software_development">Software Development</option>
                                    <option value="cyber_security">Cyber Security</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="roles" class="block text-gray-700 text-sm font-bold mb-2">Roles:</label>
                                <select name="roles[]" id="roles" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Button --}}
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-sm rounded-3xl focus:outline-none focus:shadow-outline">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
