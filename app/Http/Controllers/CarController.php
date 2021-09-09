<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use File;
use Storage;

class CarController extends Controller
{
    public function index(Request $request)
    {
        if($request->keyword){
            //search by title
            $user = auth()->user();
            $cars = $user->cars()
                ->where('plate_number','LIKE', '%'.$request->keyword.'%')
                ->paginate(2);
        }else{
            //query all schedule from 'schedule' table to $schedules
            // $schedules = Schedule::paginate(2);
            $user = auth()->user();
            $cars = $user->cars()->paginate(2);
        }
        //query all schedule from 'schedule' table to $schedules
        //$cars = Car::get();
        //return view
        return view('car.index',compact('cars'));
    }

    public function create()
    {
        //return view
        return view('car.create');
    }

    public function store(Request $request)
    {
        //query all schedule from 'schedule' table to $schedules
        $car = new Car();
        $car->model = $request->model;
        $car->plate_number = $request->plate_number;
        $car->user_id = auth()->user()->id;
        $car->save();


        if($request->hasFile('attachment')){
            // rename - file 5-2021-03-09.jpg
            $filename = $car->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();

            Storage::disk('public')->put($filename, File::get($request->attachment));

            $car->attachment = $filename;
            $car->save();
        }

        //return view
        return redirect()->route('index:car')->with([
            'alert-type' => 'alert-primary',
            'alert' => 'successfully created'
        ]);;
    }

    public function show(Car $car)
    {
        //return view
        return view('car.show',compact('car'));
    }

    public function edit(Car $car)
    {
        //return view
        return view('car.edit',compact('car'));
    }

    public function update(Request $request,Car $car)
    {
        //update schedule
        $car->model = $request->model;
        $car->plate_number = $request->plate_number;
        $car->save();
        //return view
        return redirect()->route('index:car')->with([
            'alert-type' => 'alert-success',
            'alert' => 'successfully updated'
        ]);;
    }

    public function destroy(Car $car)
    {
        if($car->attachment){
            Storage::disk('public')->delete($car->attachment);
        }
        //delete schedule
        $car->delete();
        //return view
        return redirect()->route('index:car')->with([
            'alert-type' => 'alert-danger',
            'alert' => 'successfully deleted'
        ]);;
    }

    public function forceDestroy(Car $car)
    {

        //delete schedule
        $car->forceDelete();
        //return view
        return redirect()->route('index:car')->with([
            'alert-type' => 'alert-danger',
            'alert' => 'successfully deleted'
        ]);;
    }
}
