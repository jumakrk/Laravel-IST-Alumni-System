<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications;
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        
        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back()->with('status', 'Notification marked as read.');
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('status', 'All notifications marked as read.');
    }

    public function destroy($id)
    {
        $notification = DatabaseNotification::findOrFail($id);

        if ($notification->notifiable_id !== Auth::id()) {
            return redirect()->back()->withErrors('Unauthorized action.');
        }

        $notification->delete();

        return redirect()->back()->with('status', 'Notification deleted.');
    }
}
