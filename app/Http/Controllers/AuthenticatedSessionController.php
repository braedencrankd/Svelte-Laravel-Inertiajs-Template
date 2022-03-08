<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view
     */

    public function create() {
        return Inertia::render('Login');
    }

    /**
     * Handle incomming authentication
     */
}
