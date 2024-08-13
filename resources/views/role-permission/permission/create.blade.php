<x-app-layout>
    <div class="container max-w-6xl mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg">
            {{-- Top part of form --}}
            <div class="bg-gray-100 p-4 border-b">
                <h4 class="text-lg font-semibold flex justify-between items-center">
                    Create Permission
                    <a href="{{ url('permissions') }}" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 text-sm rounded-full">Back</a>
                </h4>
            </div>
            <div class="p-6">
                <form action="{{ url('permissions') }}" method="POST">
                    @csrf
                    {{-- Input field --}}
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Permission Name:</label>
                        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter permission name">
                    </div>
                    {{-- Button --}}
                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-sm rounded-full focus:outline-none focus:shadow-outline">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
