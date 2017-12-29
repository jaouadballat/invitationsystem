<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Notification;
use App\Notifications\SendInvitation;

class InvitationsController extends Controller
{
    public function send($id)
    {
        $invitation = \App\Invitation::findOrFail($id);
        $email = $invitation->email;
    	Notification::route('mail', $email)
            ->notify(new SendInvitation($invitation));
        $invitation->send_at = Carbon::now();
        $invitation->save();
    	return redirect()->back();

    }

    public function accept(\App\Invitation $invitation)
    {
    	$invitation->accepted_at = Carbon::now();
    	$invitation->save();
    	return view('accept');
    }

    public function reject(\App\Invitation $invitation)
    {
    	$invitation->rejected_at = Carbon::now();
    	$invitation->save();
    	return view('reject');
    }
}
