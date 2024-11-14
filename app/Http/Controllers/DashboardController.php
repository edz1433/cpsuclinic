<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dash()
    {
        $patients = Patients::all();
        $users = User::all();

        $pstudent = Patients::where('category', 1)->get();
        $pemployee = Patients::where('category', 2)->get();
        $pguest = Patients::where('category', 3)->get();

        $remarks1 = Patients::where('pexam_remarks', 1)->where('category', 1)->get();
        $remarks2 = Patients::where('pexam_remarks', 2)->where('category', 1)->get();
        $remarks3 = Patients::where('pexam_remarks', 3)->where('category', 1)->get();

        return view('home.dashboard', compact('patients', 'users', 'pstudent', 'pemployee', 'pguest', 'remarks1', 'remarks2', 'remarks3'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('getLogin')->with('success','You have been Successfully Logged Out');
    }
}
