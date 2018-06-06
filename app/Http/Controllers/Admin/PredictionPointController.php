<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

use App\Prediction;
use App\Team;


class PredictionPointController extends Controller
{

    public function index()
    {
        $data = [];
        $data['allPredictions'] = Prediction::all();
        return view('prediction-point.index', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'plus' => 'required|numeric',
            'minus' => 'required|numeric',
        ]);

        $prediction = Prediction::find($request->predictionId);
        if (($prediction->plus == $request->plus) && ($prediction->minus == $request->minus)) {
            Session::flash('alert-warning', 'No change');
            return redirect('/admin/prediction-points');
        }
        $prediction->update([
            'plus' => $request->plus,
            'minus' => $request->minus,
        ]);

        Session::flash('alert-success', 'Prediction Points changed successfully for prediction: ' . $prediction->name);
        return redirect('/admin/prediction-points');
    }
}
