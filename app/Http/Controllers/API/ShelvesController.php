<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ShelveResource;
use App\Http\Resources\ShelvesCollection;
use App\Shelves;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShelvesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = new ShelvesCollection(Shelves::all());
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shelve = Shelves::create($request->all());
        return response()->json($shelve, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = new ShelveResource(Shelves::findOrFail($id));
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shelve = Shelves::findOrFail($id);
        $shelve->delete();
        return response()->json($shelve);
    }
}
