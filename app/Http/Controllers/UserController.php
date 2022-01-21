<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SetUser;


class UserController extends Controller
{
//    function index(){

//     return view('dashboards.users.index');
//    }

//    function profile(){
//        return view('dashboards.users.profile');
//    }
//    function settings(){
//        return view('dashboards.users.settings');
//    }

public function view()
{
  $data['users'] = SetUser::orderBy('id','desc')->paginate(5);
    return view('settings.user',$data);
}



public function store(Request $request)
  {
    $this->validate($request,[
      'email' => 'required|email'
  ]);

   return SetUser::updateOrCreate(
      [
        'id' => $request->id
      ],
      [
        'username' => $request->username,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'role_id' => $request->role_id,
      ]
    );

    return response()->json(
      [
        'success' => true,
       
      ]
    );
  }

  public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $setuser  = SetUser::where($where)->first();
 
        return response()->json($setuser);
    }

    public function destroy(Request $request)
    {
        $setuser = SetUser::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }

}