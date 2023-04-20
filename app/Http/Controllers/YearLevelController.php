<?php

namespace App\Http\Controllers;

use App\Models\YearLevel;

class YearLevelController extends Controller
{
    public function index()
    {
       return YearLevel::all();
    }
}
