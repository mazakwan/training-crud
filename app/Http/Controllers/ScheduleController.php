<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use File;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        if($request->keyword){
            //search by title
            $user = auth()->user();
            $schedules = $user->schedules()
                ->where('title','LIKE', '%'.$request->keyword.'%')
                ->orWhere('description','LIKE', '%'.$request->keyword.'%')
                ->paginate(2);
        }else{
            //query all schedule from 'schedule' table to $schedules
            // $schedules = Schedule::paginate(2);
            $user = auth()->user();
            $schedules = $user->schedules()->paginate(2);
        }

        //return view
        return view('schedule.index',compact('schedules'));
    }

    public function create()
    {
        //return view
        return view('schedule.create');
    }

    public function store(Request $request)
    {
        //query all schedule from 'schedule' table to $schedules
        $schedule = new Schedule();
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->user_id = auth()->user()->id;
        $schedule->save();

        if($request->hasFile('attachment')){
            // rename - file 5-2021-03-09.jpg
            $filename = $schedule->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();

            Storage::disk('public')->put($filename, File::get($request->attachment));

            $schedule->attachment = $filename;
            $schedule->save();
        }
        //return view
        return redirect()
            ->route('index:schedule')
            ->with([
            'alert-type' => 'alert-primary',
            'alert' => 'successfully created'
        ]);
    }

    public function show(Schedule $schedule)
    {
        //return view
        return view('schedule.show',compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        //return view
        return view('schedule.edit',compact('schedule'));
    }

    public function update(Request $request,Schedule $schedule)
    {
        //update schedule
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->save();
        //return view
        return redirect()->route('index:schedule')->with([
            'alert-type' => 'alert-success',
            'alert' => 'successfully updated'
        ]);;
    }

    public function destroy(Schedule $schedule)
    {
        if($schedule->attachment){
            Storage::disk('public')->delete($schedule->attachment);
        }
        //delete schedule
        $schedule->delete();
        //return view
        return redirect()->route('index:schedule')->with([
            'alert-type' => 'alert-danger',
            'alert' => 'successfully deleted'
        ]);;
    }

    public function forceDestroy(Schedule $schedule)
    {

        //delete schedule
        $schedule->forceDelete();
        //return view
        return redirect()->route('index:schedule')->with([
            'alert-type' => 'alert-danger',
            'alert' => 'successfully deleted'
        ]);;
    }
}
