<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $notificationsQuery = Notification::query();

        if ($status === 'read') {
            $notificationsQuery->where('read', true);
        } elseif ($status === 'unread') {
            $notificationsQuery->where('read', false);
        }

        $notifications = $notificationsQuery->latest()->paginate(15)->withQueryString();
        
        return view('pages.notifications.all_notifications', compact('notifications', 'status'));
    }

    public function show(Notification $notification)
    {
        $notification->update(['read' => true]);
        
        $user = $notification->user;

        return view('pages.notifications.show_notification', compact('notification', 'user'));
    }
}
