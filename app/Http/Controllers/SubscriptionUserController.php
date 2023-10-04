<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionUser;
use Illuminate\Http\Request;

class SubscriptionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        return $request->user()->subscriptionUsers()->with('subscription.organization')
        ->when($request->has('active'), function ($query) use($request){

            $query->whereIn('subscription_id', [optional($request->user()->activeSubscriptionUser())->id]);
        })
        ->get();
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
     * @param  \App\Models\SubscriptionUser  $subscriptionUser
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionUser $subscriptionUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubscriptionUser  $subscriptionUser
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscriptionUser $subscriptionUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubscriptionUser  $subscriptionUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscriptionUser $subscriptionUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionUser  $subscriptionUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionUser $subscriptionUser)
    {
        //
    }
}
