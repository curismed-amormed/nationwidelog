<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denial;
use App\Models\Pending;


class DenialController extends Controller
{
    public function index()
    {
      $data['denials'] = Denial::orderBy('id','desc')->paginate(5);
        return view('settings.denial',$data);
    }
    
    public function store(Request $request)
      {
        Denial::updateOrCreate(
          [
            'id' => $request->id
          ],
          [
            'denial_reasons' => $request->denial_reasons,
            'status' => $request->status
            
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
            $denials  = Denial::where($where)->first();
     
            return response()->json($denials);
        }
    
        public function destroy(Request $request)
        {
            $denials = Denial::where('id',$request->id)->delete();
       
            return response()->json(['success' => true]);
        }

        public function view()
        {
          $data['pendings'] = Pending::orderBy('id','desc')->paginate(5);
            return view('settings.pendings',$data);
        }
        
        public function pendingstore(Request $request)
          {
            Pending::updateOrCreate(
              [
                'id' => $request->id
              ],
              [
                'pending_reasons' => $request->pending_reasons,
                'status' => $request->status
                
              ]
            );
        
            return response()->json(
                [
                  'success' => true,
                 
                ]
              );
            }
        
            public function pendingedit(Request $request)
            {   
                $where = array('id' => $request->id);
                $pendings  = Pending::where($where)->first();
         
                return response()->json($pendings);
            }
        
            public function pendingdestroy(Request $request)
            {
                $pendings = Pending::where('id',$request->id)->delete();
           
                return response()->json(['success' => true]);
            }
}
