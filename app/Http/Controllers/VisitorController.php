<?php

namespace App\Http\Controllers;

use App\Models\AdminForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index(){
        return AdminForm::all();
    }
}
