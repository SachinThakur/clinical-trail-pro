<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScreeningData;
use App\Http\Requests\AddScreeningRequest;

class ScreeningDataController extends Controller
{
    public function index()
    {
        $screeningData = ScreeningData::all();
        $dailyFrequency = ['1' => '1-2','2' => '3-4','3' => '5+' ];
        return view('index',compact('screeningData','dailyFrequency'));
    }

    public function create()
    {
        return view('add-screening');
    }

    public function store(AddScreeningRequest $request)
    {
        $validated = $request->validated();
        // if($request->fails()) {
        //     return Redirect::back()->withErrors($validator);
        // }       
        $screeningData = new ScreeningData;
        $screeningData->first_name         = $request->name;
        $screeningData->date_of_birth   = $request->birth_date;
        $screeningData->migraine_frequency = $request->migraine_freq;
        $screeningData->daily_frequency   = $request->daily_freq;
        
        if(!empty($screeningData->migraine_frequency) && in_array($screeningData->migraine_frequency,['monthly','weekly'])){
            $screeningData->customer_group = 'Cohort A';   
        }elseif(!empty($screeningData->migraine_frequency) && $screeningData->migraine_frequency == 'daily' ){
            $screeningData->customer_group = 'Cohort B';   
        }
        $screeningData->save();
        $successMsg = sprintf("Candidate %s is assigned to %s.",$screeningData->first_name,$screeningData->customer_group);
        return redirect('/')->with('status', $successMsg);
    }
}
