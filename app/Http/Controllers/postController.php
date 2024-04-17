<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class postController extends Controller
{
    function createPost(Request $request){
        try {
            $authorId = $request->input('author_id');
            $randomNumber = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);
            $imgUrl = $request->input('img_url') . $randomNumber;

            // Check if author_id is available
            if (!$authorId) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Author ID is required'
                ], 400);
            }

            // Create post if author_id is available
            Post::create([
                'author_id' => $authorId,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'img_url' => $imgUrl,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Post creation successfully'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Post creation failed'
            ], 500);
        }
    }

    public function allPosts()
    {
        try {
            $posts = Post::all();
            
            return response()->json([
                'status' => 'success',
                'posts' => $posts
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to fetch posts'
            ], 500);
        }
    }
}
