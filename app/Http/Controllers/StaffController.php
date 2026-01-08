<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('order')
            ->orderBy('name')
            ->get();

        $specializations = Staff::select('specialization')
            ->distinct()
            ->pluck('specialization');

        return view('staff.index', compact('staff', 'specializations'));
    }

    public function show($slug)
    {
        $member = Staff::where('slug', $slug)->firstOrFail();
        return view('staff.show', compact('member'));
    }
}
