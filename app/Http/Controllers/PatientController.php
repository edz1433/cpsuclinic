<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use App\Models\Patients;
use App\Models\College;
use App\Models\Course;
use App\Models\Office;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    
    public function patientAdd() 
    {
        $regions = Region::all();
        $col = College::where('campus', '=', Auth::user()->campus)->get();
        $patients = Patients::all();
        
        $offices = Office::all();
        return view('patient.patient_add', compact('col', 'patients', 'offices', 'regions'));
    }

    public function patientRead($id) 
    {
        $col = College::where('campus', '=', Auth::user()->campus)->get();
       // $patients = Patients::where('category', $id)->get();
        $patients = Patients::where('category', $id)->limit(10)->get();

        return view('patient.patient_list', compact('col', 'patients', 'id'));
    }

    public function patientData($id)
    {
        $patients = Patients::where('category', $id)
            ->select('id', 'age', 'sex', 'c_status', 'pexam_remarks', 
                     \DB::raw("CONCAT(lname, ' ', fname, ' ', IFNULL(ext_name, ''), ' ', IFNULL(mname, '')) as full_name"))
            ->get();
    
        return response()->json(['data' => $patients]);
    }

    public function moreInfo($id, $mid){
        $regions = Region::all();
        $col = College::where('campus', '=', Auth::user()->campus)->get();
        $patients = Patients::find($mid);
        $hprovinces = Province::where('region_id', $patients->home_region)->get();
        $hcities = City::where('city_id', $patients->home_city)->get();
        $hbarangays = Barangay::find($patients->home_brgy);

        $gprovinces = Province::where('region_id', $patients->guardian_region)->get();
        $gcities = City::where('city_id', $patients->guardian_city)->get();
        $gbarangays = Barangay::find($patients->guardian_brgy);

        $offices = Office::all();
   
        if (is_null($id)) {
            // Return an error response or redirect if the ID is null
            return redirect()->back()->with('error', 'ID cannot be null.');
        }
        return view('patient.patient_moreinfo', compact('col', 'patients', 'offices', 'regions', 'hprovinces', 'hcities', 'hbarangays', 'gprovinces', 'gcities', 'gbarangays'));
    }

    public function patientCreate(Request $request)
    {
        $request->validate([
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'category' => 'required',
            'home_region' => 'required',
            'home_province' => 'required',
            'home_city' => 'required',
            'home_brgy' => 'required',
            'contact' => 'required',
            'stud_nation' => 'required',
            'stud_religion' => 'required',
            'c_status' => 'required',
            'studCollege' => 'nullable',
            'studCourse' => 'nullable',
            'office' => 'nullable',
            'guardian' => 'required',
            'guardian_occup' => 'required',
            'guardian_contact' => 'required',
            'guardian_region' => 'required',
            'guardian_province' => 'required',
            'guardian_city' => 'required',
            'guardian_brgy' => 'required',
            'height_cm' => 'required',
            'height_ft' => 'required',
            'weight_kg' => 'required',
            'weight_lb' => 'required',
            'bmi' => 'required',
            'temp' => 'nullable',
            'pr' => 'nullable',
            'bp' => 'nullable',
            'rr' => 'nullable',
        ]);
    
        Patients::create([
            'lname' => $request->input('lname'),
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'ext_name' => $request->input('ext_name'),
            'birthdate' => $request->input('birthdate'),
            'age' => $request->input('age'),
            'sex' => $request->input('sex'),
            'category' => $request->input('category'),
            'home_region' => $request->input('home_region'),
            'home_province' => $request->input('home_province'),
            'home_city' => $request->input('home_city'),
            'home_brgy' => $request->input('home_brgy'),
            'contact' => $request->input('contact'),
            'stud_nation' => $request->input('stud_nation'),
            'stud_religion' => $request->input('stud_religion'),
            'c_status' => $request->input('c_status'),
            'studCollege' => $request->input('studCollege'),
            'studCourse' => $request->input('studCourse'),
            'office' => $request->input('office'),
            'guardian' => $request->input('guardian'),
            'guardian_occup' => $request->input('guardian_occup'),
            'guardian_contact' => $request->input('guardian_contact'),
            'guardian_region' => $request->input('guardian_region'),
            'guardian_province' => $request->input('guardian_province'),
            'guardian_city' => $request->input('guardian_city'),
            'guardian_brgy' => $request->input('guardian_brgy'),
            'height_cm' => $request->input('height_cm'),
            'height_ft' => $request->input('height_ft'),
            'weight_kg' => $request->input('weight_kg'),
            'weight_lb' => $request->input('weight_lb'),
            'bmi' => $request->input('bmi'),
            'temp' => $request->input('temp'),
            'pr' => $request->input('pr'),
            'bp' => $request->input('bp'),
            'rr' => $request->input('rr'),
        ]);
    
        return redirect()->back()->with('success', 'Added Successfully');
    }
    

    public function patientUpdate(Request $request)
    {
        $patient = Patients::findOrFail($request->id);
        $column = $request->column;
        if ($column == 'birthdate') {
            $birthdate = Carbon::parse($request->value);
            $age = $birthdate->age;
            $patient->update([
                $column => $request->value,
                'age' => $age
            ]);
        } else {
            $patient->update([
                $column => $request->value
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function patientHistory(Request $request)
    {
        $patient = Patients::find($request->id);
        $column = $request->column;
        $value = $request->value;
        $array = $request->data_array; 

        $arrayVal = $patient->$column;
        $arrayVal = explode(",", $arrayVal);
        $currentValue = isset($arrayVal[$array]) ? $arrayVal[$array] : null;
        $newvalue = $currentValue === $value ? '' : $value;
        $arrayVal[$array] = $newvalue;
        $newarrayVal = implode(",", $arrayVal);
        $patient->$column = $newarrayVal;
        $patient->save();
        
    
        return response()->json(['success' => true]);
    }
    
    
    public function getCollege(Request $request)
    {
        $selectedCampus = $request->input('campus');

        $college = College::where('campus', $selectedCampus)->get();

        return response()->json(['college' => $college]);
    }

    public function getCourse(Request $request)
    {
        $selectedCollege = $request->input('studCollege');

        $course = Course::where('progCollege', $selectedCollege)->get();

        return response()->json(['course' => $course]);
    }
    
    public function patientDelete($id){
        $patient = Patients::find($id);
        if ($patient) {
            $patient->delete();
    
            return response()->json([
                'status' => 200,
                'uid' => $id,
            ]);
        }
    
        return response()->json([
            'status' => 404,
            'message' => 'Patient not found',
        ]);
    }


}
