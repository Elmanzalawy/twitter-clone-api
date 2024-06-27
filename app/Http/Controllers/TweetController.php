<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Http\Requests\StoreTweetRequest;
use App\Http\Requests\UpdateTweetRequest;
use App\Models\User;

class TweetController extends Controller
{
    public function __construct(){
        info(request()->fullUrl());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = Tweet::query()
            ->with('user:id,name,username,avatar')
            ->latest()
            ->paginate();

        return response()->json($tweets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTweetRequest $request)
    {
        $tweet = Tweet::create([
            'user_id' => User::first()->id,
            'body' => $request->body,
        ]);

        return response()->json($tweet);
    }

    /**
     * Display the specified resource.
     */
    public function findTweetById(Tweet $tweet)
    {
        $tweet->load('user:id,name,username,avatar');
        return response()->json($tweet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTweetRequest $request, Tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        //
    }
}
