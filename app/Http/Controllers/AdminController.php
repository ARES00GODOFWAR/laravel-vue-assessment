<?php

namespace App\Http\Controllers;

use App\Models\AdminForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PdfUpload;

class AdminController extends Controller
{

    public function getSnippets(){
        return AdminForm::all();
    }

    public function getPdfs(){
        return PdfUpload::all();
    }

    public function store(Request $request)
    {
        $id = $request->get("id");
        $title = $request->get("title");
        $description = $request->get("description");
        $snippet = $request->get("snippet");

        return AdminForm::updateOrCreate(
            ['id' => $id],
            [
                'id' => $id,
                'title' => $title,
                'description' => $description,
                'snippet' => $snippet
            ]
        );
    }
    public function deleteSnippet(Request $request)
    {
        $id = $request->get("id");
        $snippet = AdminForm::find($id);
        if ($snippet) $snippet->delete();
        return $snippet;
    }

}
