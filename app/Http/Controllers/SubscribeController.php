<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
{
    public function subscribe()
    {
//        dd(\request()->all());
        $topic = DB::table('topics')->where([
            'topic' => request('topic')
        ])->first();
//        return response()->json($topic);
//        $data = request()->validate([
//           'url' => 'url'
//        ]);
        DB::table('subscribers')->insert([
           'topic_id' => $topic->id,
            'url' => request('url')
        ]);
        return response()->json([
            'url' => request('url'),
            'topic' => $topic->topic
        ]);
    }
}
