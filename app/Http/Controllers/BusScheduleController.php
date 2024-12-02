<?php

namespace App\Http\Controllers;

use App\Http\Middleware\JwtAuthenticate;
use App\Models\BusDeparture;
use App\Models\BusSchedule;
use Illuminate\Http\Request;

class BusScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(JwtAuthenticate::class);
    }

    public function index(Request $request)
    {
        $busSchedules = collect();

        if (
            $request->has('checkpoint_start') && $request->checkpoint_start > 0
            && $request->has('checkpoint_end') && $request->checkpoint_end > 0
        ) {

            $departure = BusDeparture::where('checkpoint_start', $request->checkpoint_start)
                ->where('checkpoint_end', $request->checkpoint_end)
                ->first();

            if ($departure) {
                // Fetch bus schedules directly related to this departure
                $busSchedules = BusSchedule::with(['bus', 'busDeparture'])
                    ->where('bus_departure_id', $departure->id)
                    ->get()
                    ->makeHidden(['bus_id', 'bus_departure_id']);
            }
        } else {
            // If no filters are applied, fetch all schedules
            $busSchedules = BusSchedule::with(['bus', 'busDeparture'])->get()->makeHidden(['bus_id', 'bus_departure_id']);;
        }

        return response()->json(['busSchedules' => $busSchedules], 200);
    }
}
