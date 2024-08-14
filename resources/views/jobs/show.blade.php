<x-app-layout>
    <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Display Flash Messages -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative flash-message" id="flash-message">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 border border-red-400 text-green-700 px-4 py-3 rounded-xl relative flash-message" id="flash-message">
                {{ session('error') }}
            </div>
        @elseif (session('info'))
            <div class="mb-4 p-4 text-white bg-blue-500 rounded-md flash-message" id="flash-message">
                {{ session('info') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex justify-between">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Job Details</h3>
                @role('super-admin|admin')
                <a href="{{ route('jobs.edit', $job->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Edit Job
                </a>
                @endrole
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

    <!-- JavaScript to Hide Flash Messages -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the flash message element
            var flashMessage = document.getElementById('flash-message');

            // Check if the flash message exists
            if (flashMessage) {
                // Set a timeout to hide the flash message after 3 seconds
                setTimeout(function() {
                    flashMessage.style.opacity = '0';
                    flashMessage.style.transition = 'opacity 0.5s ease-out';
                    
                    // Optionally remove the element from the DOM after fade-out
                    setTimeout(function() {
                        flashMessage.remove();
                    }, 500); // Matches the duration of the fade-out transition
                }, 3000); // Time before fade-out begins
            }
        });
    </script>
</x-app-layout>
