<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\PatientDetail;
use App\Models\Provider;
use App\Models\WorkStatus;


class PatientController extends Controller
{
  public function detailindex($acc_no)
    {
      $patient = Patient::where('account_no', $acc_no)->first();
      

      $providers = Provider::all();
      $workstatus = WorkStatus::all();
      $patients = Patient::all();
      

      $patientsdetail =  PatientDetail:: where('select_status', 'Closed')->with('provider')->with('workstatus')->with('patients')
     ->get();
      
     // $data['patientsdetail'] = Patient::where('account_no', 'like', '%' . $request->account_no . '%')->get();
        return view('patientsdetail',compact('patient', 'patientsdetail','workstatus','providers','patients'));

    }
    
    public function pendinglist()
    {
      
      $pendinglist = PatientDetail::where('select_status', 'Open')->with('workstatus')->get();
        return view('pendinglist',compact('pendinglist'));
    }

    public function detailstore(Request $request)
      {
        PatientDetail::updateOrCreate(
          [
            'id' => $request->id
          ],
          [
            'workstatus_id' => $request->workstatus_id,
            'file_type' => $request->file_type,
            'select_reason' => $request->select_reason,
            'no_of_pages' => $request->no_of_pages,
            'provider_id' => $request->provider_id,
            'dos' => $request->dos,
            'select_status' => $request->select_status,
            'range' => $request->range
          ]
        );
    
        return response()->json(
            [
              'success' => true,
             
            ]
          );
        }
    
        public function detailedit(Request $request)
        {   
            $where = array('id' => $request->id);
            $patientdetail  = PatientDetail::where($where)->first();
     
            return response()->json($patientdetail);
        }
    
        public function detaildestroy(Request $request)
        {
            $patientdetail = PatientDetail::where('id',$request->id)->delete();
       
            return response()->json(['success' => true]);
        }

    public function index()
    {
      $data['patients'] = Patient::orderBy('id','desc')->paginate(5);
        return view('patients',$data);
    }
    
    public function store(Request $request)
      {
        Patient::updateOrCreate(
          [
            'id' => $request->id
          ],
          [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'account_no' => $request->account_no,
            'dob' => $request->dob,
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
            $patients  = Patient::where($where)->first();
     
            return response()->json($patients);
        }
    
        public function destroy(Request $request)
        {
            $patients = Patient::where('id',$request->id)->delete();
       
            return response()->json(['success' => true]);
        }

        // Fetch records
     public function getLastName(Request $request){

            if($request->ajax())
            {
           // $data = Patient::search($request->get('patient_col'))->get();
           $data = Patient::where
           ('last_name', 'like', '%' . $request->lastName . '%')->get();
            return response()->json(['data' => $data ]);
            }
      }

      public function getFirstName(Request $request){
        if($request->ajax())
        {
            $data = Patient::where('first_name', 'like', '%' . $request->firstName . '%')->get();
        return response()->json(['data' => $data ]);
        }
      }

      public function getAccount(Request $request){
        if($request->ajax())
        {
            $data = Patient::where('account_no', 'like', '%' . $request->accountNo . '%')->get();
        return response()->json(['data' => $data ]);
        }
      }

      public function getDob(Request $request){
        if($request->ajax())
        {
            $data = Patient::where('dob', 'like', '%' . $request->dobDate . '%')->get();
        return response()->json(['data' => $data ]);
        }
      }



       
}



