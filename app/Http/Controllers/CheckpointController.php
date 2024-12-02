<?php

namespace App\Http\Controllers;

use App\Http\Middleware\JwtAuthenticate;
use App\Models\BusDeparture;
use App\Models\Checkpoint;
use Illuminate\Http\Request;

class CheckpointController extends Controller
{
    public function __construct()
    {
        $this->middleware(JwtAuthenticate::class);
    }

    public function index(Request $request)
    {
        $checkpoints = Checkpoint::all();
        if ($request->has('checkpoint_start') && $request->checkpoint_start > 0) {
            $departures = BusDeparture::where('checkpoint_start', $request->checkpoint_start)->get();
            $checkpoints = $checkpoints->filter(function ($checkpoint) use ($departures) {
                return $departures->contains('checkpoint_end', $checkpoint->id);
            })->values();
        } else if ($request->has('checkpoint_end') && $request->checkpoint_end > 0) {
            $departures = BusDeparture::where('checkpoint_end', $request->checkpoint_end)->get();
            $checkpoints = $checkpoints->filter(function ($checkpoint) use ($departures) {
                return $departures->contains('checkpoint_start', $checkpoint->id);
            })->values();
        }
        return response()->json(['checkpoints' => $checkpoints], 200);
    }
}
