<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\User;
use App\Models\Patientvisit;
use App\Models\Complaint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dash()
    {
        $patients = Patients::count();
        $users = User::all();

        $pstudent = Patients::where('category', 1)->get();
        $pemployee = Patients::where('category', 2)->get();
        $pguest = Patients::where('category', 3)->get();

        $remarks1 = Patients::where('pexam_remarks', 1)->where('category', 1)->get();
        $remarks2 = Patients::where('pexam_remarks', 2)->where('category', 1)->get();
        $remarks3 = Patients::where('pexam_remarks', 3)->where('category', 1)->get();
     
        $complaintsCount = Patientvisit::select('chief_complaint')
        ->whereNotNull('chief_complaint')
        ->groupBy('chief_complaint')
        ->selectRaw('count(*) as count, chief_complaint')
        ->get();
    
        $complaintsnum = $complaintsCount->pluck('chief_complaint')->toArray();
        
        $validComplaints = Complaint::whereIn('id', $complaintsnum)->pluck('id')->toArray();
        
        $filteredComplaintsCount = $complaintsCount->filter(function ($item) use ($validComplaints) {
            return in_array($item->chief_complaint, $validComplaints);
        });
        
        $complaintsData = Complaint::whereIn('id', $filteredComplaintsCount->pluck('chief_complaint')->toArray())
            ->get(['id', 'complaint', 'colorcode']);
        
        $result = $filteredComplaintsCount->map(function ($item) use ($complaintsData) {
            $complaint = $complaintsData->firstWhere('id', $item->chief_complaint);
            return [
                'complaint' => $complaint->complaint ?? null,
                'count' => $item->count,
                'colorcode' => $complaint->colorcode ?? null,
            ];
        });

        return view('home.dashboard', compact('patients', 'users', 'pstudent', 'pemployee', 'pguest', 'remarks1', 'remarks2', 'remarks3', 'result'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('getLogin')->with('success','You have been Successfully Logged Out');
    }
}
