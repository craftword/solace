<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**     
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('firstname', '!=', Auth::user()->firstname )->pluck('firstname', 'id');       
        $roles = Role::all()->pluck('name', 'name');
        return view('admin.notifications.index', compact('users', 'roles'));
    }

     public function store(Request $request)
    {

    	$notification = Notification::create($request->all());
        
        return back()
            ->with('success','Notification was sent successfully .');
<<<<<<< HEAD
     } 

      public function unreadNotification()
    {
          $user = User::find(Auth::user()->id);
          $data = array();         
             foreach ($user->unreadNotifications as $notification) {
                $data = $notification->data;                
            }         
    	  

         return response()->json(array($data));
     }

      public function markAsRead(Request $request)
    {
          //$user = User::find(Auth::user()->id);
         $users = Role::find($request->roleId)->users;
         foreach($users as $user) {
             $user->unreadNotifications->markAsRead();
         }
         
         return response()->json(array('msg' => 'update Notification'));
     } 
 

=======
     }       
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
}
