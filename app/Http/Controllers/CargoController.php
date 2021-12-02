<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargoRequest;
use App\Http\Resources\CargoResource;
use App\Models\Load;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $cargos = Load::with('point')->orderBy('id','desc')
            ->get();

        return CargoResource::collection($cargos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CargoRequest  $request
     * @return CargoResource
     */
    public function store(CargoRequest $request)
    {
        $load =  Load::create($request->all())->point()
            ->create(['name'=>$request->input('from').' - '.$request->input('to')]);

        return $this->show($load->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CargoResource
     */
    public function show(int $id)
    {
        $cargo = Load::whereId($id)->with('point')
            ->first();

        return CargoResource::make($cargo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
