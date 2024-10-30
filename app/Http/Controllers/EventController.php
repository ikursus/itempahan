<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('calendar.template-index');
    }

    public function getEvents(Request $request)
    {
        $events = Event::query()
            ->where('user_id', auth()->id())
            ->get()
            ->map(function ($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->start->format('Y-m-d H:i:s'),
                    'end' => $event->end->format('Y-m-d H:i:s'),
                    'description' => $event->description,
                    'color' => $event->color,
                    'allDay' => $event->all_day,
                ];
            });

        return response()->json($events);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'color' => 'nullable|string',
            'all_day' => 'boolean'
        ]);

        $data['user_id'] = auth()->id();

        $event = Event::create($data);

        return response()->json($event);
    }

    public function update(Request $request, Event $event)
    {
        // Check if user owns the event
        if ($event->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'color' => 'nullable|string',
            'all_day' => 'boolean'
        ]);

        $event->update($validated);

        return response()->json($event);
    }

    public function destroy(Event $event)
    {
        if ($event->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted']);
    }
}
