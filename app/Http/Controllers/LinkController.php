<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkUpload;

class LinkController extends Controller
{
    public function saveLink(Request $request)
    {
        $id = $request->get("id");
        $title = $request->get("title");
        $link = $request->get("link");
        $tab = $request->get("tab");

        return LinkUpload::updateOrCreate(
            ['id' => $id],
            [
                'id' => $id,
                'title' => $title,
                'link' => $link,
                'tab' => $tab
            ]
        );
    }
    public function getLinks()
    {
        return LinkUpload::all();
    }

    public function deleteLink(Request $request)
    {
        $id = $request->get("id");
        $link = LinkUpload::find($id);
        if ($link) $link->delete();
        return $link;
    }


    
  
}
