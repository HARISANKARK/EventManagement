<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['from','to']);

        $from = $request->from ?? null;
        $to = $request->to ?? null;

        $events = Event::filter($filters)->get();

        return view('events.index',compact('from','to','events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'event_date' => 'required|date',
            'no_of_attendees' => 'required|integer',
        ]);

        try
        {
            $event = new Event;
            $event->event_name = $request->event_name;
            $event->description = $request->description;
            $event->e_date = $request->event_date;
            $event->no_of_attendees = $request->no_of_attendees;
            $event->save();

            return redirect()->back()->with('success','Event Added Successfully');
        }catch (\Exception $e)
        {
            // Handle the exception
            Log::error('An error occurred In EventController: ' . $e->getMessage());
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
        $event = Event::find($id);

        return view('events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'event_date' => 'required|date',
            'no_of_attendees' => 'required|integer',
        ]);

        try
        {
            $event = Event::find($id);
            $event->event_name = $request->event_name;
            $event->description = $request->description;
            $event->e_date = $request->event_date;
            $event->no_of_attendees = $request->no_of_attendees;
            $event->save();

            return redirect('/events')->with('success','Event Updated Successfully');
        }catch (\Exception $e)
        {
            // Handle the exception
            Log::error('An error occurred In EventController: ' . $e->getMessage());
            // Validation failed
            return redirect()->back()->withInput()->with('danger','Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
