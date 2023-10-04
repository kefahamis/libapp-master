<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Course;
use App\Models\Topic;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return Course::with(['tags', 'topics', 'booking'])->addSelect('courses.*')
                ->where('status', 'published')
                ->when($request->has('tags'), function ($q) use($request){

                    $tags = explode(",",$request->get('tags'));
                    $q->join('course_tag', 'course_tag.course_id', 'courses.id');
                    $q->join('tags', 'tags.id', 'course_tag.tag_id');
                    $q->whereIn('tags.name', $tags);

                })
                ->when($request->has('topic_id'), function ($q) use($request){


                    $q->join('course_topic', 'course_topic.course_id', 'courses.id');
                    $q->where('course_topic.topic_id', $request->get('topic_id'));

                })
                ->when($request->has('recommended'), function ($q) use ($request) {

                    $recommendedTopics = Booking::query()
                                        ->addSelect('course_topic.topic_id')
                                        ->join('course_topic', 'course_topic.course_id', 'bookings.course_id')
                                        ->where('bookings.user_id', $request->user()->id)
                                        ->get()
                                        ->pluck('topic_id');

                    $q->join('course_topic', 'course_topic.course_id', 'courses.id');
                    $q->whereIn('course_topic.topic_id', $recommendedTopics);
                })
                ->when($request->has('booked'), function ($q) use($request){

                    if($request->get('booked') == 'yes'){

                    $q->join('bookings', 'bookings.course_id', 'courses.id');
                    $q->where('bookings.user_id', $request->user()->id);
                    }
                    else {

                    $q->leftJoin('bookings', function ($q) use ($request){
                        $q->on('bookings.course_id','=' ,'courses.id');
                        $q->where('user_id', $request->user()->id);

                    });

                    $q->whereNull('bookings.user_id');

                    }

                })
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        return $course->load('topics');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
