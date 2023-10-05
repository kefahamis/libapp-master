<?php

namespace App\Http\Controllers\API\Hr;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $status = $request->query('status');
        $courses = Course::paginate(10);
        // return view('inc.contents.subscriptions',compact('courses'));
        // $courses = Course::query()->orderBy('start_date', 'desc')->paginate(10);
        // $courses->where('status', 'Published');

        // if (Auth::check()) {
        //     switch (Auth::id()) {
        //         case 1:
        //         case 2:
        //             // Users with ID 1 and 2 can access all queries
        //             switch ($status) {
        //                 case 'Draft':
        //                     $courses->where('status', 'Draft');
        //                     break;
        //                 case 'Published':
        //                     $courses->where('status', 'Published');
        //                     break;
        //             }
        //             break;
        //         case 3:
        //             // User with ID 3 can only access published queries
        //             if ($status === 'Published')
        //                 $courses->where('status', 'Published');
        //             break;
        //         default:
        //             // Handle other user IDs if needed
        //             break;
        //     }
        // } else {
        //     return response()->json(['status' => 'error', 'message' => 'Unauthorized!'], 401);
        // }

        // $courses = $courses->orderBy('start_date', 'desc')->paginate(10);

        if ($courses)
            return response()->json(['status' => 'success', 'data' => $courses], 200);
        return response()->json(['status' => 'error', 'message' => 'Not found'], 404);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = Course::find($id);
        if ($courses)
            return response()->json(['status' => 'success', 'data' => $courses], 200);
        return response()->json(['status' => 'error', 'errors' => 'Course Not Found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'status' => 'required|string|max:50',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $user_id = Auth::user()->role_as;

        $course = Course::find($id);
        if ($user_id === 2 && $course->status === 'Draft') {
            if ($course) {
                $course->status = $request->input('status');
                $course->update();

                return response()->json(['status' => 'success', 'message' => 'Course Updated Successfully'], 200);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Not Found'], 404);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized!'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}