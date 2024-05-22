<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMapRequest;
use App\Http\Requests\UpdateMapRequest;
use App\Models\Map;
use ProtoneMedia\Splade\Facades\Toast;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $markers = Map::all();

        $initialMarkers = [];
        foreach ($markers as $marker) {
            $initialMarkers[] = [
                'position' => [
                    'lat' => $marker->lat,
                    'lng' => $marker->lng,
                ],
                'draggable' => true,
            ];
        }

        return view('map.index', compact('initialMarkers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('map.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMapRequest $request)
    {
        Map::create($request->validated());
        Toast::title('Map created')->message('The map has been created successfully')->success();
        return redirect()->route('map.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Map $map)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map)
    {
        return view('map.edit', compact('map'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMapRequest $request, Map $map)
    {
        $map->update($request->validated());
        Toast::title('Map updated')->message('The map has been updated successfully')->success();
        return redirect()->route('maps.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map)
    {
        $map->delete();
        Toast::title('Map deleted')->message('The map has been deleted successfully')->success();
        return redirect()->route('map.index');
    }
}
