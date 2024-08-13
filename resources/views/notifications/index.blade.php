<!-- resources/views/notifications/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if($notifications->isEmpty())
                        <p class="text-gray-500">{{ __('No notifications found.') }}</p>
                    @else
                        <ul class="space-y-4">
                            @foreach($notifications as $notification)
                                <li class="p-4 border rounded-lg shadow-sm bg-gray-50">
                                    <div class="flex items-center justify-between">
                                        <p class="text-gray-800">
                                            {{ $notification->data['message'] ?? 'Notification data is missing or incomplete.' }}
                                        </p>
                                        <button 
                                            onclick="document.getElementById('notification-{{ $notification->id }}').classList.toggle('hidden')"
                                            class="text-blue-500 hover:text-blue-700 focus:outline-none"
                                        >
                                            {{ __('View Notification') }}
                                        </button>
                                    </div>
                                    @if(isset($notification->data['job_id']))
                                        <div id="notification-{{ $notification->id }}" class="hidden mt-4 space-y-2">
                                            <a href="{{ route('jobs.show', $notification->data['job_id']) }}" class="text-blue-500 hover:text-blue-700">
                                                {{ __('View Job') }}
                                            </a>
                                            <div class="flex space-x-2">
                                                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded-3xl hover:bg-blue-600 focus:outline-none">
                                                        {{ __('Mark as Read') }}
                                                    </button>
                                                </form>
                                                <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-3xl hover:bg-red-600 focus:outline-none">
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-red-500">{{ __('Job ID not found in the notification data.') }}</p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="mt-4 px-6 py-3">
                    <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-block bg-gray-200 text-gray-800 py-2 px-4 rounded hover:bg-gray-300 focus:outline-none">
                            {{ __('Mark All as Read') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
