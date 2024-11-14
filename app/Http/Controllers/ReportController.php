<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use PDF;

class ReportController extends Controller
{
    public function reportsSrch(){
        
        // $patients = Patients::all();
        
        $patients = Patients::limit(10)->get();
        return view('reports.list', compact('patients'));
    } 
    public function peheReport($id)
    {
        $patients = Patients::leftjoin('college', 'patients.studCollege', '=', 'college.college_abbr')
        ->where('patients.id', $id)
        ->select('patients.*', 'patients.created_at as createdas')
        ->first();

        $hregion = !empty($patients->home_region) ? Region::find($patients->home_region) : null;
        $hprovince  = !empty($patients->home_province) ? Province::where('province_id', $patients->home_province)->first() : null;
        $hcity = !empty($patients->home_city) ? City::where('city_id', $patients->home_city)->first() : null;
        $hbarangay = !empty($patients->home_brgy) ? Barangay::find($patients->home_brgy) : null;
        $gregion = !empty($patients->guardian_region) ? Region::find($patients->guardian_region) : null;
        $gprovince = !empty($patients->guardian_province) ?  Province::where('province_id', $patients->guardian_province)->first() : null;
        $gcity = !empty($patients->guardian_city) ? City::where('city_id', $patients->guardian_city)->first() : null;
        $gbarangay = !empty($patients->guardian_brgy) ? Barangay::find($patients->guardian_brgy) : null;

                    
        $pdf = PDF::loadView('patient.pehe_report', compact('patients', 'hregion', 'hprovince', 'hcity', 'hbarangay', 'gregion', 'gprovince', 'gcity', 'gbarangay', 'id'))->setPaper('Legal', 'portrait');
        return $pdf->stream();
    }

    public function waiverReport(){
        $pdf = PDF::loadView('reports.waiver')
        ->setPaper([0, 0, 816, 1248], 'portrait'); 
        return $pdf->stream();
    }
    public function refusedReport(){
        
        $pdf = PDF::loadView('reports.refusedwaiver')->setPaper('Legal', 'portrait');
        return $pdf->stream();
        
    }

    public function reportsRead($id){
       // $patients = Patients::all();
      
        $patients = Patients::limit(10)->get();
        return view('reports.list', compact('patients', 'id'));
    }

}
