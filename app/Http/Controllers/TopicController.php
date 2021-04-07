<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class TopicController extends Controller
{

    public function publish()
    {
        $topic = Topic::where('topic', request('topic'))->first();
//        return response()->json($topic->subscriber);
        if($topic->subscriber->count() != 0) {
            $client = new Client();

            foreach ($topic->subscriber as $subscriber) {
                $res = $client->request('POST', $subscriber->url, request()->all());
            }
            return response()->json($res->getStatusCode());
        }else{
            return response()->json([
                'message' => 'Publish would have been successful if subscribers exist',
            ], 200);
        }
    }
}
