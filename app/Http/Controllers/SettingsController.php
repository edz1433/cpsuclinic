<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
use App\Models\User;

class SettingsController extends Controller
{
    public function accountRead()
    {
        return view('settings.info');
    }
    public function Complaint(){
        $datas = Settings::all();
        return view ('patientvisit.complaint', compact('datas'));
    }
    public function complaintInsert(Request $request){
        $request->validate([
            'complaint' => 'required'
           ]);
           
           Settings::create([
             'complaint' => $request->input('complaint')
           ]);
           return redirect()->back()->with('success', 'Added Successfully');
    }
    public function complaintEditRead($id){
        $complaint = Settings::find($id);
        $datas = Settings::all();
        return view( 'patientvisit.complaint', compact('datas','complaint'));
    }
   public function complaintUpdate(Request $request){
    $request->validate([
        'complaint' => 'required',
    ]);

    $complaint = Settings::findOrFail($request->id);       
    if ($request->has('complaint')) {
        $complaint->complaint = $request->input('complaint');
    }
      $complaint->save();
    return redirect()->back()->with('success', 'Updated Successfully');
   } 

   public function complaintDelete($id){
    $complaint = Settings::find($id);
    if ($complaint) {
        $complaint->delete();

        return response()->json([
            'status' => 200,
            'complaint' => $id,
        ]);
    }
    
    return response()->json([
        'status' => 404,
        'message' => 'Medicine not found',
    ]);
   }
  
}
