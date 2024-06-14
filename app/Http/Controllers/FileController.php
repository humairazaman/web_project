<?php

namespace App\Http\Controllers;

use App\Models\filings;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function open_file_form()
    {
        return view('student.upload');
    }

    public function store_file(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:pdf,doc,docx,xls,csv,jpeg,png|max:4048',
        ]);

        $filename = time() . '.' . $req->file->extension();
        $req->file->move('uploads', $filename);

        $filewritter = new filings;
        $filewritter->file = $filename;
        $filewritter->save();

        return redirect('student/upload');
    }

    public function show_file_data()
    {
        $data = filings::all();
        return view('student.display', compact('data'));
    }

    public function file_view($id)
    {
        $data = filings::find($id);
        return view('student.view', compact('data'));
    }
    public function file_download($file)
    {
        // return response()->download(public_path('uploads/'.$file));
        $filePath = storage_path('app/uploads/' . $file);

        if (Storage::exists('uploads/' . $file)) {
            // The file exists, so we can download it
            return response()->download($filePath);
        } else {
            // The file does not exist, you may want to handle this case
            return Response::make('File not found.', 404);
        }
        
    }
    
}

