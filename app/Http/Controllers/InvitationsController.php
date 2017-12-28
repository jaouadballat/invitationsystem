<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationsController extends Controller
{
    public function send($id)
    {
    	$user = \App\Invitation::findOrFail($id);
    	dd($user);
    }
}
