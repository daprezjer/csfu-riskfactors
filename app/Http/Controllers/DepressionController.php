<?php

namespace App\Http\Controllers;

use App\Demographic;
use App\DepressionModelIndicator;
use App\DepressionForecast;
use App\Helpers;
use Illuminate\Support\Facades\DB;

class DepressionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $demographics = [];
        $demographics['basic'] = Demographic::select(DB::raw('AVG(smoke_ever) AS smoke, AVG(depression_ind) AS depression'))
             ->get();
        $demographics['gender'] = Demographic::select(DB::raw('gender, AVG(smoke_ever) AS smoke, AVG(depression_ind) AS depression'))
            ->where('gender','<>',NULL)
            ->groupBy('gender')->get();
        $demographics['race'] = Demographic::select(DB::raw('race, AVG(smoke_ever) AS smoke, AVG(depression_ind) AS depression'))
             ->where('race','<>',NULL)
             ->groupBy('race')->get();
        $demographics['grade_level'] = Demographic::select(DB::raw('grade_level, AVG(smoke_ever) AS smoke, AVG(depression_ind) AS depression'))
            ->where('grade_level','<>',NULL)
            ->groupBy('grade_level')->get();
        $demographics['genderRace'] = Demographic::select(DB::raw('gender, race, AVG(smoke_ever) AS smoke, AVG(depression_ind) AS depression'))
            ->where('gender','<>',NULL)
            ->where('race','<>',NULL)
            ->groupBy('gender')
            ->groupBy('race')
            ->get();
        $demographics['genderGradeLevel'] = Demographic::select(DB::raw('gender, grade_level, AVG(smoke_ever) AS smoke, AVG(depression_ind) AS depression'))
             ->where('gender','<>',NULL)
             ->where('grade_level','<>',NULL)
             ->groupBy('gender')
             ->groupBy('grade_level')
             ->get();
        $demographics['raceGradeLevel'] = Demographic::select(DB::raw('race, grade_level, AVG(smoke_ever) AS smoke, AVG(depression) AS depression'))
            ->where('race','<>',NULL)
            ->where('grade_level','<>',NULL)
            ->groupBy('race')
            ->groupBy('grade_level')
            ->get();

        $models = DepressionModelIndicator::select('depression_model_indicators.*', 'depression_indicators.variable', 'depression_models.r_squared', 'depression_models.n')
            ->join('depression_indicators','depression_model_indicators.indicator_id','=','depression_indicators.id')
            ->join('depression_models','depression_model_indicators.model_id','=','depression_models.id')
            ->get()->toArray();

        assoc($models, 'model_id');

        /** Get information for forecasts */
        $forecasts = DepressionForecast::all()->toArray();
        $cis = ['75','90','95','99'];

        return view('depression', ['page' => 'depression', 'demographics' => $demographics, 'models' => $models, 'forecasts' => $forecasts, 'cis' => $cis]);
    }
}
