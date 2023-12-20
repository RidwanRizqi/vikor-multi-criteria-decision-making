<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\Criteria;

class HomeController extends Controller
{
    public function index(){
        $countAlternative = Alternative::count();
        $countCriteria = Criteria::count();

        return view('dashboard.home', compact('countCriteria', 'countAlternative'));
    }
}
