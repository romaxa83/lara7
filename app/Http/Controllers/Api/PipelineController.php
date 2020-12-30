<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Pipeline\FirstHub;
use App\Pipeline\FirstPipe;
use App\Pipeline\SecondPipe;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class PipelineController extends Controller
{
    public function pipeline(Request $request, Pipeline $pipeline)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'number' => 'required',
        ]);

        $result = $pipeline->send($validated)
            ->through([
            FirstPipe::class,
            SecondPipe::class,
        ])->thenReturn();

//        dd($result);

        return response()->json($result);
    }

    public function hub(Request $request, FirstHub $hub)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'number' => 'required',
        ]);

        $hub->pipe($validated, 'first');
        $result = $hub->pipe($validated, 'second');

        return response()->json($result);
    }
}

