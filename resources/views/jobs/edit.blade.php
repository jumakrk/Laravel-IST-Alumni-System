<x-app-layout>
    <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Job</h3>
            </div>
            <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="border-t border-gray-200">
                    <!-- Title Field -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="title" class="text-sm font-medium text-gray-500">Title</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" required>
                        </div>
                    </div>
                    <!-- Location Field -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="location" class="text-sm font-medium text-gray-500">Location</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="text" name="location" id="location" value="{{ old('location', $job->location) }}" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" required>
                        </div>
                    </div>
                    <!-- Type Field (Dropdown) -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="type" class="text-sm font-medium text-gray-500">Type</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <select name="type" id="type" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" required>
                                <option value="" disabled>Select job type</option>
                                <option value="Cyber Security" {{ old('type', $job->type) == 'Cyber Security' ? 'selected' : '' }}>Cyber Security</option>
                                <option value="Software Development" {{ old('type', $job->type) == 'Software Development' ? 'selected' : '' }}>Software Development</option>
                            </select>
                        </div>
                    </div>
                    <!-- Major Field (Dropdown) -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="major" class="text-sm font-medium text-gray-500">Major</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <select name="major" id="major" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" required>
                                <option value="" disabled>Select major</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major }}" {{ old('major', $job->major) == $major ? 'selected' : '' }}>{{ $major }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Description Field -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="description" class="text-sm font-medium text-gray-500">Description</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <textarea name="description" id="description" rows="4" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" required>{{ old('description', $job->description) }}</textarea>
                        </div>
                    </div>
                    <!-- Qualifications Field -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="qualifications" class="text-sm font-medium text-gray-500">Qualifications Required</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <textarea name="qualifications" id="qualifications" rows="4" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" required>{{ old('qualifications', $job->qualifications) }}</textarea>
                        </div>
                    </div>
                    <!-- Application Deadline Field -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="application_deadline" class="text-sm font-medium text-gray-500">Application Deadline</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="date" name="application_deadline" id="application_deadline" value="{{ old('application_deadline', $job->application_deadline->format('Y-m-d')) }}" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" required>
                        </div>
                    </div>
                    <!-- Date Posted Field -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <label for="posted_at" class="text-sm font-medium text-gray-500">Date Posted</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="date" name="posted_at" id="posted_at" value="{{ old('posted_at', $job->posted_at->format('Y-m-d')) }}" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" required>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 text-right sm:px-6 flex justify-between">
                    <!-- Back Button -->
                    <a href="{{ route('jobs.show', $job->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-3xl text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Back
                    </a>
                    <!-- Update Job Button -->
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-3xl text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
