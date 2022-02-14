<?php

namespace App\Http\Controllers;

use App\Http\Resources\LotResource;
use App\Models\Lot;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lots = Lot::orderBy('lots.id', 'asc');
        if ($request->filled('program')) {
            $lots->where('programs.name', 'like', '%' . $request->program . '%')->join('programs', 'programs.id', '=', 'lots.program_id')->get();
        };
        if ($request->filled('price')) {
            $lots->where('price', '<=', $request->price);
        };
        if ($request->filled('area')) {
            $lots->where('area', '>=', $request->area);
        };
        return LotResource::collection($lots->paginate(9));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function show(Lot $lot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lot $lot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lot $lot)
    {
        //
    }
}
