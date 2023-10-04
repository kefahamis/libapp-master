<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Course;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return $request->user()
                ->bookings()->with('course')
                ->paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
                        'course_id'=>'required'
        ]);

        $course = Course::where(['id'=>$data['course_id'], 'status'=>'published'])->first();

        abort_if(!$course, 404, 'The course was not found!');

        $existingBooking = Booking::where(['course_id'=>$data['course_id']])->with('course', 'subscriptionUser.subscription')->first();

        if($existingBooking)
        {
            $out = $existingBooking->toArray();
            $out['message'] = 'already booked';
            return $out;
        }

        $activeSubscriptionUser = $request->user()->activeSubscriptionUser();

        if(!$activeSubscriptionUser)
        {
            // return Response::deny(, 403);
            return response()->json('no valid subscription found', 403);
        }

        DB::beginTransaction();
        $out = Booking::create([
                    'course_id'=>$data['course_id'],
                    'user_id'=>$request->user()->id,
                    'subscription_user_id'=>$activeSubscriptionUser->id
        ]);



        $activeSubscriptionUser->updateCourseCount();

        $out->load('course', 'subscriptionUser.subscription');

        DB::commit();

        $out['message'] = 'booking creted';

        return $out;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
