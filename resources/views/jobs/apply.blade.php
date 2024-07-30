<x-app-layout>
    <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Apply for Job</h3>
            </div>
            <div class="border-t border-gray-200">
                <form method="POST" action="{{ route('applications.store', $job->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="name" class="text-sm font-medium text-gray-500">Name</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="text" name="name" id="name" class="mt-1 block w-full sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="email" class="text-sm font-medium text-gray-500">Email</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="email" name="email" id="email" class="mt-1 block w-full sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="phone" class="text-sm font-medium text-gray-500">Phone</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="text" name="phone" id="phone" class="mt-1 block w-full sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="cover_letter" class="text-sm font-medium text-gray-500">Cover Letter</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <textarea name="cover_letter" id="cover_letter" rows="4" class="mt-1 block w-full sm:text-sm border-gray-300 rounded-md" required></textarea>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="cv" class="text-sm font-medium text-gray-500">CV (PDF, DOC, DOCX)</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="file" name="cv" id="cv" class="mt-1 block w-full sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    </div>

                    <div class="px-4 py-3 sm:px-6 flex justify-between">
                        <a href="{{ route('jobs.show', $job->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Back
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Apply
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
