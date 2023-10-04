<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class CPDController extends Controller
{
    //

    public function index(Request $request)
    {
        $query = $request->user()->bookings()
            ->addSelect('bookings.*', 'courses.cpd_hours')
            ->join('courses', 'courses.id', 'bookings.course_id')
            ->with('course')
            ->where('attended', 'yes');
        return [
            'records' => $query->paginate(),
            'total_cpd' => $query->sum('cpd_hours')
        ];
    }
}