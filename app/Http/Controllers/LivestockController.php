<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use App\Http\Requests\StoreLivestockRequest;
use App\Http\Requests\UpdateLivestockRequest;
use App\Tables\Livestocks;
use ProtoneMedia\Splade\Facades\Toast;

class LivestockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('livestock.index',
        [
            'livestock' => Livestocks::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livestock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivestockRequest $request)
    {
        Livestock::create($request->validated());

        Toast::title('Success!')
            ->message('Livestock Created Successfully!')
            ->success()
            ->leftTop()
            ->info()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('livestock.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livestock $livestock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livestock $livestock)
    {
        return view('livestock.edit', compact('livestock'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateLivestockRequest $request, Livestock $livestock)
    {
        $livestock->update($request->validated());

        Toast::title('Success!')
            ->message('Livestock Updated Successfully!')
            ->success()
            ->leftTop()
            ->info()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('livestock.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livestock $livestock)
    {
        $livestock->delete();


        Toast::title('Success!')
            ->message('Livestock Deleted Successfully!')
            ->success()
            ->leftTop()
            ->info()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('livestock.index');
    }
}
