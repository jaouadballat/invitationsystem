<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function calendar()
    {
    	$events = [];
    	foreach (\App\Event::all() as $e) {
	    		$events[] = \Calendar::event(
			    $e->event, 
			    true, 
			    $e->start_at, 
			    $e->end_at,
			    $e->id, 
					[
						'url' => 'http://invitationsystem.dev/admin/events/' . $e->id
					]
			);
    	}

		$calendar = \Calendar::addEvents($events)
		->setOptions([ 'firstDay' => 1 ]) ;
    	return view('calendar', compact('calendar'));
    }
}
