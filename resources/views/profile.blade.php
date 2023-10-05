@extends('inc.nav')

@section('content')
@include('inc.sidebar')
<div class="content-wrapper">
    <div class="d-flex justify-content-between align-content-center p-4">
        <div>Edit my profile</div>
        <div><a class="btn btn-info">Edit Profile</a></div>

    </div>
    <hr>
    <div class="p-4">
        <h3>Introduction</h3>
        <p>Let the Liberator community and instructors recognize you</p>
    </div>
    <div class="d-flex gap-4 p-4">
        <div>
            <p>Full Name</p>
        </div>
        <div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <div class="d-flex gap-5 ps-4">
        <div>
            <p>Profile photo</p>
        </div>
        <div>
            <div class="bg-info p-4">
                <i class="fa fa-user fa-6x" aria-hidden="true"></i>
            </div>
        </div>
        <div>
            <a class="btn btn-info p-4">Upload Photo</a>
            <p>Maximum size of 1MB. JPG, GIF, or PNG. </p>
        </div>
    </div>
    <hr>
    <div class="ps-4">
        <h3>Work Experience and Education</h3>
        <p>Tell us about your experience and education to get a personalized learning
            experience with course recommendations.</p>
        <div class="d-flex "></div>
    </div>
</div>
@endsection