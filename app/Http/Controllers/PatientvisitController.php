<?php

namespace App\Http\Controllers;
use App\Models\Patients;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Models\patientvisit;
use App\Models\File;
use App\Models\Complaint;
use Illuminate\Support\Facades\Log;
use DB;
 
class PatientvisitController extends Controller
{
    public function patientvisitList(Request $request){
        $adds=Patients::all();
        $date = date('Y-m-d');
        date_default_timezone_set('Asia/Manila');
        return view('patientvisit.patientvisit_list', compact('adds','date'));   
    }

    public function patientListOption(Request $request){

        $patients = Patients::select('id', 'fname', 'lname', 'mname')->get();
        return response()->json(['data' => $patients]);
    }

    public function addPatient(Request $request){
      
        $patient = new Patientvisit();
        $patient->stid = $request->input('stid');
        $patient->date = $request->input('date');
        $patient->time = $request->input('time');
        
        $patient->save();

    return redirect()->back()->with('success', 'Added Successfully');
    }

    public function ListStudent(){   
       $patients = Patients::with('patientvisits')->get();
       return view('patientvisit.students_info', compact('patients'));
    }
    public function studentLogin(Request $request){
        $patient = new Patientvisit();
        $patient->stid = $request->input('stid');
        $patient->date = $request->input('date');
        $patient->time = $request->input('time');
        
        $patient->save();
        
        return redirect()->back()->with('success', 'Added Successfully');
    }
    public function visitSearch(Request $request, $id){
        $date = date('Y-m-d');
        date_default_timezone_set('Asia/Manila');

        $files = File::where('patient_id', $id)->get();  
        $meddatas = Medicine::all();
        $meddata = [];
        $quantity=[];
        foreach ($meddatas as $data) {
            $meddata[$data->id] = $data->medicine;
            $quantity=[$data->id] =$data->qty;
        }

      //gin ajax kuni nga part
      //still fixing
        $patients = Patients::all();    
        $patientSearch = Patients::find($id);

        if ($request->ajax()) {
            $patientSearch = Patients::find($id);
            return response()->json($patientSearch);
        }

        $patientVisit = Patientvisit::where('stid', $id)->get();
        return view('patientvisit.patientvisit_list', compact('patients','patientSearch','patientVisit', 'meddata','quantity','files','date'));
    }
    public function patienttrans($id){
        $complaints =  Complaint::all();
        $meddatas = Medicine::all();
        $meddata = [];
        $quantity = [];
        
        foreach ($meddatas as $data) {
        $meddata[$data->id] = $data->medicine;
        $quantity[$data->id] = $data->qty;
        }
        $patients = Patients::all();
        $patientVisit = DB::table('patients')
        ->join('patientvisit', 'patients.id', '=', 'patientvisit.stid') 
        ->where('patientvisit.id', $id) 
        ->select('patients.*', 'patientvisit.*') 
        ->get();
        $medicines = Medicine::all();
        $stids = $patientVisit->pluck('stid'); 
        $files = File::where('patient_id',  $stids )->get();
        return view('patientvisit.patienttransaction', compact('patientVisit', 'medicines', 'meddata', 'files','complaints'));
  
    }   
    public function patientsAddItem(Request $request){
       
        $patient = Patientvisit::findOrFail($request->id);
      
        if ($request->has('date')) {
            $patient->date = $request->input('date');
        }
        if ($request->has('time')) {
            $patient->time = $request->input('time');
        }

        if ($request->has('chief_complaint')) {
            $patient->chief_complaint = $request->input('chief_complaint');
        }
        
        if ($request->has('treatment')) {
            $patient->treatment = $request->input('treatment');
        }
        if ($request->has('certificate')) {
            $patient->certificate = $request->input('certificate');
        }
        $input1 = $request->input('qty', []);  
        $input2 = $request->input('medicine', []);
        
        $maxCount = max(count($input1), count($input2));
        $input1 = array_pad($input1, $maxCount, '');  
        $input2 = array_pad($input2, $maxCount, '');  
        
        $input1 = array_map(function($value) {
            return $value === null ? '' : $value;
        }, $input1);
        
        $input2 = array_map(function($value) {
            return $value === null ? '' : $value;
        }, $input2);
        
        $quantity = implode(',', $input1);
        $medicine = implode(',', $input2);
        
        $patient->qty = $quantity;
        $patient->medicine = $medicine;
        
        $patient->save();
             
        return redirect()->back()->with('success', 'Added Successfully');
        } 
         //Setting function
        public function Settings(){
        return view ('settings.info');
         }
        // testing Center
        public function test(Request $request){
        
            return view('test.test')->render();
        }
        public function test2(Request $request){
         $datas=Patients::all();
            return view('test.test2', compact('datas'));
        }
    
    }
        
        
