<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function getUserInfo()
    {
        $request = request();
        $id = $request->input("id");
        $userInfo = UserInfo::when($id, function ($query, $id) {
            return $query->where("sid", $id)->get();
        });
        $response = ["message" => "User data is", $userInfo];
        return response($response, 200);
    }
    
    
    public function notifyUser(Request $request)
    {

        $user = User::where('id', $request->id)->first();
        $notification_id = $user->notification_id;
        $title = $request->title;
        $message =  $request->message;
        $id = $user->id;
        $type = $request->type;
        // $title = "Greeting Notification";
        // $message = "Have good day!";
        // $id = $user->id;
        // $type = "basic";
        $res = send_notification_FCM($notification_id, $title, $message, $id, $type);

        if ($res == 1) {
            return response()->json(['message' => 'notification Added']);
        } else {
            return response()->json(['message' => 'notification does not Added']);
        }
    }
    
    
}
