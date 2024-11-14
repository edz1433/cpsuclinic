<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Patients;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\File as FileFacade;


class FileController extends Controller
{
    public function fileRead(Request $request, $cat, $id){
        $patient = Patients::find($id);
        $files = File::where('patient_id', $id)->get();
        return view('file.list', compact('cat', 'id', 'files', 'patient'));
    }

    public function fileCreate(Request $request, $id)
    {     
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();
    
            do {
                $randomNumber = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
                $fileName = $randomNumber . '_' . $originalFileName;
            } while (file_exists(public_path('Uploads/' . $fileName)));
    
         
            if ($file->move(public_path('Uploads'), $fileName)) {
                
                $document = File::create([
                    'patient_id' => $id,
                    'file' => $fileName,
                ]);
    
                return redirect()->back()->with('success', 'File uploaded successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to upload file.');
            }
        } else {
            return redirect()->back()->with('error', 'No file uploaded.');
        }
    }

    public function deleteFile($id){

        $file = File::find($id); 

        if ($file) {

            $file_path = public_path('Uploads/'.$file->file);
            if(file_exists( $file_path )){
                unlink($file_path);
            }
            $file->delete();
        
            return response()->json([
                'status' => 200,
                'file' => $id, 
            ]);
        }
        return response()->json([
            'status' => 404,
            'message' => 'Medicine not found',
        ]);

}}
