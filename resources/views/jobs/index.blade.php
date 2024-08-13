<x-app-layout>
    <div class="container max-w-6xl mx-auto p-6">
        @if (session('status'))
            <div id="flash-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif
        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">Jobs</h1>
            <a href="{{ route('jobs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-3xl hover:bg-blue-600">Create Job</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($jobs as $job)
                <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                    <h2 class="text-xl font-bold mb-2">{{ $job->title }}</h2>
                    <hr class="my-4 border-black">
                    <p class="text-gray-600 mb-6">{{ Str::limit($job->description, 100) }}</p>
                    <p class="text-gray-500 font-semibold mb-2">Posted on: {{ $job->posted_at->format('M d, Y') }}</p>
                    <p class="text-gray-500 font-semibold mb-4">Posted by: {{ $job->user->name }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('jobs.show', $job->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-3xl hover:bg-blue-600 transition-colors duration-300">View Details</a>
                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-3xl hover:bg-red-600 transition-colors duration-300">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- JavaScript for auto-hiding the flash message -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                setTimeout(() => {
                    flashMessage.style.opacity = 0;
                    setTimeout(() => flashMessage.remove(), 300); // Remove after fade-out
                }, 3000); // Wait 3 seconds before starting fade-out
            }
        });
    </script>
</x-app-layout>
