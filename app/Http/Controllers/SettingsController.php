<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingsController extends Controller
{
    public static function index() {
        return Inertia::render('Settings/Index');
    }
}
