<?php

namespace App\Http\Controllers\API\User;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubscriptionUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return response()->json($subscriptions);
    }

    public function show(Subscription $subscription)
    {
        // Check if the subscription was found
        if (!$subscription) {
            return response()->json(['error' => 'Subscription not found'], 404);
        }

        return response()->json($subscription);
    }

    public function subscribe(Request $request, Subscription $subscription)
    {

        $exists = SubscriptionUser::where('subscription_id', $subscription->id)
            ->where('email', Auth::user()->email)
            ->exists();

        // Check if the user has already subscribed this subscription
        if ($exists) {
            return response()->json(['error' => 'You have already subscribed to this subscription'], 400);
        }

        // Create a subscription record
        $subscribe = SubscriptionUser::class;
        $subscribeModel = $subscribe::firstOrNew(['email' => Auth::user()->email]);
        $userAssociate = User::find(Auth::id());
        $subscribeModel->user()->associate($userAssociate);
        $subscriptionAssociate = User::find($subscription->id);
        $subscribeModel->subscription()->associate($subscriptionAssociate);
        $subscribeModel->name = Auth::user()->name;
        $subscribeModel->save();

        return response()->json(['message' => 'subscribed successfully'], 200);
    }
}