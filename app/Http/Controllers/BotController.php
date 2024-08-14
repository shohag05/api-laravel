<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use Illuminate\Http\Request;

class BotController extends Controller
{
    // public function CreateThread($url, $title, $thread_id)          // create data with parameter
    // {
    //     $thread = Bot::create([
    //         'url' => $url,
    //         'title' => $title,
    //         'thread_id' => $thread_id
    //     ]);

    //     return response()->json($thread);
    // }

    public function CreateThread(Request $request){
        try {
            $thread = Bot::create([
                'url' => $request->input('url'),
                'title' => $request->input('title'),
                'thread_id' => $request->input('thread_id')
            ]);

            if ($thread) {
                return response()->json($thread, 201);
            } else {
                return response()->json(['error' => 'Make sure you give all the parameter'], 500);
            }
        } 
        catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while creating the thread'], 500);
        }
    }

    public function GetThread(Request $request)
    {
        $thread_id = $request->thread_id;
        $thread = Bot::where('thread_id', $thread_id)->get();

        if ($thread) {
            return response()->json($thread, 200); // 200 OK
        } else {
            return response()->json(['error' => 'Data not found for this thread_id'], 404); // 404 Not Found
        }
    }
}
