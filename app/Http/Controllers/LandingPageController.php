<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class LandingPageController extends Controller
{
    public function dashboard()
    {
       
        return view('index');
    }

    public function index()
    {
        return view('auth.login');
    }

   
   
    public function create()
    {
        return view('role.create');
    }
    
  
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            
        ]);
       
        $role = new role([
            //'created_by_id' => auth()->user()->id,
            'created_by_id' => 1,
            'name' => $request->get('name'),
            'is_superadmin' => 1,
            'is_active' => 1,
            
        ]);
        $role->save();
      
        return redirect()->route('role.index')->with('success', 'Role Uploaded successfully');
    }
}
