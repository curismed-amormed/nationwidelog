<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practices;

class PracticesController extends Controller
{
    public function index()
{
  $data['practices'] = Practices::orderBy('id','desc')->paginate(5);
    return view('settings.practices',$data);
}

public function store(Request $request)
  {
    $this->validate($request,[
        'email' => 'required|email'
    ]);

   return Practices::updateOrCreate(
      [
        'id' => $request->id
      ],
      [
        'name' => $request->name,
        'address1' => $request->address1,
        'address2' => $request->address2,
        'email' => $request->email,
        'phone' => $request->phone,
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
        $practices  = Practices::where($where)->first();
 
        return response()->json($practices);
    }

    public function destroy(Request $request)
    {
        $practices = Practices::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
