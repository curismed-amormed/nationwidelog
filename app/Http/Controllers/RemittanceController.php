<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remittance;
use App\Models\Insurance;
use App\Models\Provider;
use App\Models\WorkStatus;


class RemittanceController extends Controller
{
    public function view()
    {
      $insurances = Insurance::all();
      $providers = Provider::all();
     // dd($providers);
     $remittances =  Remittance::with('provider')->with('insurance')->paginate(10);
     //Remittance::all();
     
       // return view('remittances',['data1' => $insurances],['data2' => $providers],$data);
       // return view('remittances',['data3' => $remittances],['data1' => $insurances],['data2' => $providers]);
        return view('remittances',compact('insurances','providers','remittances'));

    }
    
    public function remittancestore(Request $request)
      {

      //   $request->validate([
         
      //     'doc' => 'required|doc|mimes:jpg,png,jpeg,gif,svg|max:2048',
         
      // ]);
       
         $remittanceId = $request->id;
        if($remittanceId){
             
            $remittance = Remittance::find($remittanceId);

            if($request->hasFile('doc')){
                $path = $request->file('doc')->store('public/docs');
                $remittance->doc = $path;
            }   
         }else{
                $path = $request->file('doc')->store('public/docs');
               $remittance = new Remittance;
               $remittance->doc = $path;
         }
         
    
        $remittance->check_date = $request->check_date;
        $remittance->check_amount = $request->check_amount;
        $remittance->check_no = $request->check_no;
        $remittance->provider_id = $request->provider_id;
        $remittance->insurance_id = $request->insurance_id;
        $remittance->save();
     
        return Response()->json($remittance);
    
  
       
         }
    
        public function remittanceedit(Request $request)
        {   
            $where = array('id' => $request->id);
            $remittances  = Remittance::where($where)->first();
     
            return response()->json($remittances);
        }
    
        public function remittancedestroy(Request $request)
        {
            $remittances = Remittance::where('id',$request->id)->delete();
       
            return response()->json(['success' => true]);
        }

        public function index()
    {
        
        $data['workstatus'] = WorkStatus::orderBy('id','desc')->paginate(5);
        return view('workstatus',$data);

    }
    
    public function store(Request $request)
      {

       
         $workstatusId = $request->id;
        if($workstatusId){
             
            $workstatus = WorkStatus::find($workstatusId);

            if($request->hasFile('work_file')){
                $path = $request->file('work_file')->store('public/work_file');
                $workstatus->work_file = $path;
            }   
         }else{
                $path = $request->file('work_file')->store('public/work_file');
               $workstatus = new WorkStatus;
               $workstatus->work_file = $path;
         }
         
    
        $workstatus->location = $request->location;
        $workstatus->file_name = $request->file_name;
        $workstatus->total_pages = $request->total_pages;
        $workstatus->pdf_pages = $request->pdf_pages;
        $workstatus->status = $request->status;
        $workstatus->save();
     
        return Response()->json($workstatus);
    
  
       
         }
    
        public function edit(Request $request)
        {   
            $where = array('id' => $request->id);
            $workstatus  = WorkStatus::where($where)->first();
     
            return response()->json($workstatus);
        }
    
        public function destroy(Request $request)
        {
            $workstatus = WorkStatus::where('id',$request->id)->delete();
       
            return response()->json(['success' => true]);
        }
}
