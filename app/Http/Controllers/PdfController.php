<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PdfUpload;

class PdfController extends Controller
{
    public function pdfUpload(Request $request){

        $request->validate([
            'file' => 'required|max:2048',
        ]);

        $id = $request->get('id'); 
        $title = $request->get('title');

        $sumn = PdfUpload::find($id);
 
         if($request->file()) {
             $file_name = time().'_'.$request->file->getClientOriginalName();
             $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');
             $updated_path = '/storage/' . $file_path;
            if ($sumn == null) {
                PdfUpload::create([
                    'id' => $id,
                    'title' => $title,
                    'path' => $updated_path,
               ]);
            }
            else {
                $sumn->updateOrCreate(
                    ["id" => $id],
                    [
                    'id' => $id,
                    'title' => $title,
                    'path' => $updated_path,
                ]);
            }
             return response()->json(['success'=>'File uploaded successfully.']);
         }
        
   }

   public function deletePdf(Request $request)
   {
       $id = $request->get("id");
       $pdf = PdfUpload::find($id);
       if ($pdf) $pdf->delete();
       return $pdf;
   }
}