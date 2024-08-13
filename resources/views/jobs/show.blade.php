<x-app-layout>
    <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8"> <!-- Adjusted max-w to make it wider -->
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex justify-between">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Job Details</h3>
                <a href="{{ route('jobs.edit', $job->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Edit Job
                </a>
            </div>
            <div class="border-t border-gray-200">
                <!-- Title Field -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <label for="title" class="text-sm font-medium text-gray-500">Title</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <p class="text-sm text-gray-900">{{ $job->title }}</p>
                    </div>
                </div>
                <!-- Location Field -->
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <label for="location" class="text-sm font-medium text-gray-500">Location</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <p class="text-sm text-gray-900">{{ $job->location }}</p>
                    </div>
                </div>
                <!-- Type Field -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <label for="type" class="text-sm font-medium text-gray-500">Type</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <p class="text-sm text-gray-900">{{ $job->type }}</p>
                    </div>
                </div>
                <!-- Description Field -->
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <label for="description" class="text-sm font-medium text-gray-500">Description</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <p class="text-sm text-gray-900">{{ $job->description }}</p>
                    </div>
                </div>
                <!-- Qualifications Field -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <label for="qualifications" class="text-sm font-medium text-gray-500">Qualifications Required</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <p class="text-sm text-gray-900">{{ $job->qualifications }}</p>
                    </div>
                </div>
                <!-- Application Deadline Field -->
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <label for="application_deadline" class="text-sm font-medium text-gray-500">Application Deadline</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <p class="text-sm text-gray-900">{{ $job->application_deadline->format('M d, Y') }}</p>
                    </div>
                </div>
                <!-- Date Posted Field -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <label for="posted_at" class="text-sm font-medium text-gray-500">Date Posted</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <p class="text-sm text-gray-900">{{ $job->posted_at->format('M d, Y') }}</p>
                    </div>
                </div>
                <!-- User (Poster) Field -->
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <label for="user" class="text-sm font-medium text-gray-500">Posted By</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <p class="text-sm text-gray-900">{{ $job->user->name }}</p>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 flex justify-between sm:px-6">
                <!-- Back Button -->
                <a href="{{ route('jobs.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-3xl text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Back
                </a>
                <!-- Apply for Job Button -->
                <a href="{{ route('jobs.apply', $job->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-3xl text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Apply for Job
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
