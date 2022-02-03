<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medical;
use App\Models\Insurance;
use App\Models\Provider;

class MedicalController extends Controller
{
    public function index()
    {
        $insurances = Insurance::all();
        $providers = Provider::all();

        $medicals =  Medical::with('provider')->with('insurance')->paginate(10);

   
        return view('medical-record',compact('medicals','insurances','providers'));

    }
    
    public function store(Request $request)
      {
         $medicalId = $request->id;
        if($medicalId){
             
            $medical = Medical::find($medicalId);

            if($request->hasFile('medicaldoc')){
                $path = $request->file('medicaldoc')->store('public/medicaldocs');
                $medical->medicaldoc = $path;
            }   
         }else{
                $path = $request->file('medicaldoc')->store('public/medicaldocs');
               $medical = new Medical;
               $medical->medicaldoc = $path;
         }
        $medical->location = $request->location;
        $medical->dos = $request->dos;
        $medical->patient = $request->patient;
        $medical->medical_status = $request->medical_status;
        $medical->file_type = $request->file_type;
        $medical->insurance_id = $request->insurance_id;
        $medical->provider_id = $request->provider_id;
        $medical->denial_date = $request->denial_date;
        $medical->encounter = $request->encounter;
        $medical->medical_reason = $request->medical_reason;
        $medical->save();
     
        return Response()->json($medical);
         }
    
        public function edit(Request $request)
        {   
            $where = array('id' => $request->id);
            $medical  = Medical::where($where)->first();
     
            return response()->json($medical);
        }

        public function destroy(Request $request)
        {
            $medical = Medical::where('id',$request->id)->delete();
       
            return response()->json(['success' => true]);
        }
}
