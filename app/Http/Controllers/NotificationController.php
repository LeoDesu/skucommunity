<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getUnread(User $user)
    {
        return $user->notifications->where('read', false)->sortByDesc('created_at')->values()->map(function($notification){
            $notification->time = date('d/m/Y ເວລາ G:i', strtotime($notification->created_at));
            return $notification;
        });
    }
    
    public function read(Request $request)
    {
        $notification = Notification::find($request->id);
        return $notification->update(['read' => true]);
    }
}
