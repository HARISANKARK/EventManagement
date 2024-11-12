<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowEvents($e_id)
    {
        $event = Event::find($e_id);
        $registrations = Registration::where('event_id',$e_id)->get();
        return view('registration.event_requests',compact('event','registrations'));
    }
    public function index(Request $request)
    {
        $filters = $request->only(['from','to','event_id']);
        $registrations = Registration::join('events','registrations.event_id','=','events.e_id')->filter($filters)->get();

        $from = $request->from ?? null;
        $to = $request->to ?? null;

        $events = Event::all();

        return view('registration.index',compact('from','to','events','registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($e_id)
    {
        $event = Event::find($e_id);
        return view('registration.create',compact('event','e_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|integer',
            'date' => 'required|date',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_no' => 'required|regex:/^\+?[0-9]{10,15}$/',
        ]);

        try
        {
            $registration = new Registration;
            $registration->event_id = $request->event_id;
            $registration->r_date = $request->date;
            $registration->r_name = $request->name;
            $registration->r_email = $request->email;
            $registration->r_email = $request->email;
            $registration->r_phone_no = $request->phone_no;
            $registration->r_user_id = Auth::user()->id;
            $registration->save();

            return redirect('/events')->with('success','Event Updated Successfully');
        }catch (\Exception $e)
        {
            // Handle the exception
            Log::error('An error occurred In RegistrationController: ' . $e->getMessage());
            // Validation failed
            return redirect()->back()->withInput()->with('danger','Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
