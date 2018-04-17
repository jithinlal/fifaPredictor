<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prediction;

class OverallResultController extends Controller
{
    public function index()
    {
        $overallPredictions = Prediction::where('type', 'overall')->get();
        return view('overall-result.list');
    }

}
