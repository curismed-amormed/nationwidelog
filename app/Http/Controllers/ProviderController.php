<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Insurance;


class ProviderController extends Controller
{
    public function index()
    {
      $data['providers'] = Provider::orderBy('id','desc')->paginate(5);
        return view('settings.providers',$data);
    }
    
    public function store(Request $request)
      {
        Provider::updateOrCreate(
          [
            'id' => $request->id
          ],
          [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
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
            $providers  = Provider::where($where)->first();
     
            return response()->json($providers);
        }
    
        public function destroy(Request $request)
        {
            $providers = Provider::where('id',$request->id)->delete();
       
            return response()->json(['success' => true]);
        }

        public function view()
        {
          $data['insurances'] = Insurance::orderBy('id','desc')->paginate(5);
            return view('settings.insurance',$data);
        }
        
        public function insurancestore(Request $request)
          {
            Insurance::updateOrCreate(
              [
                'id' => $request->id
              ],
              [
                'insurance_name' => $request->insurance_name,
                'status' => $request->status
                
              ]
            );
        
            return response()->json(
                [
                  'success' => true,
                 
                ]
              );
            }
        
            public function insuranceedit(Request $request)
            {   
                $where = array('id' => $request->id);
                $insurances  = Insurance::where($where)->first();
         
                return response()->json($insurances);
            }
        
            public function insurancedestroy(Request $request)
            {
                $insurances = Insurance::where('id',$request->id)->delete();
           
                return response()->json(['success' => true]);
            }

}
