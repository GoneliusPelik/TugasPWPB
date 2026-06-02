<?php

namespace App\Http\Controllers;

use App\Models\Event;

class FrontEndController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->latest()->get();
        return view('welcome', compact('events'));
    }

    public function show($id)
    {
        $event = Event::with('category')->findOrFail($id);
        return view('event_show', compact('event'));
    }
}
