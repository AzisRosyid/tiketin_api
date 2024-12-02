<?php

namespace App\Http\Controllers;

use App\Http\Middleware\JwtAuthenticate;
use Illuminate\Http\Request;
use App\Models\BusDeparture;
use App\Models\BusSchedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class BusDepartureController extends Controller
{
    public function __construct()
    {
        $this->middleware(JwtAuthenticate::class);
    }

    public function index()
    {
        $buses = BusDeparture::with(['checkpointStart', 'checkpointEnd'])->get();
        return response()->json(['busDepartures' => $buses], 200);
    }

    public function show($id)
    {
        $rules = [
            'bus_id' => 'required|integer|min:0',
        ];

        $validator = Validator::make(['bus_id' => $id], $rules);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->first()], 422);
        }

        $bus = BusDeparture::find($id);

        if (!$bus) {
            return response(['errors' => 'BusDeparture not found'], 404);
        }

        $schedules = BusSchedule::where('bus_id', $id)->get();

        return response()->json(['bus' => $bus, 'schedules' => $schedules], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'duration' => 'required|date_format:H:i:s',
            'release_date' => 'required|date',
            'genre' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ];

        $messages = [
            'required' => 'The :attribute required'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->first()], 422);
        }

        $file = null;
        if ($request->file('image') != null) {
            $photo = $request->file('image')->getClientOriginalExtension();
            $file = Carbon::now()->format('Y_m_d_His') . '_' . $request->name . '.' . $photo;
            $request->file('image')->move('images', $file);
        }

        BusDeparture::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'release_date' => $request->release_date,
            'genre' => $request->genre,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $file
        ]);

        return response(['message' => 'BusDeparture successfuly created!'], 201);
    }
}
