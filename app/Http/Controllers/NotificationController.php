<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $notifications = Notification::all();
        $notifications_count = Notification::count();
        return view("point.notifications.notifications", compact("notifications", "notifications_count"));                                                               
    }
}
