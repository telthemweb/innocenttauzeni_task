<?php

namespace App\Http\Controllers\TrackingEquipments;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function __construct()
    {
        //this middleware will check if user is logged in
        // if you are not logged in it will redirect you back to login page!!
        $this->middleware('auth');
    }
    /**
     * Display a listing of Assigned Equipments.
     */
    public function index()
    {
        //Fetch all users from the table users
        $assignments = Assignment::orderByDesc('created_at')->get();
        if (auth()->user()->can(['assign equipment'], $assignments)) {
            //we pass view data Equipments
            return view('Assigments.index', compact('assignments'));
        }
        abort(403, 'You are not allowed to view assigned Equipment');
    }

}
