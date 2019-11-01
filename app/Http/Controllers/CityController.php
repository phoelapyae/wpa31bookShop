<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use App\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.cities.index');
    }

    public function anyData(){
        $model = City::query();
        return \DataTables::eloquent($model)
        ->addColumn('option',function(City $city){
            return view('backend.cities.option',compact('city'));
        })
        ->rawColumns(['option'])
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $city = new City();
        $city->cityname = $request->name;
        $city->save();
        $request->session()->flash('alert-success','New city '.$city->cityname.' was created successfully.');
        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('backend.cities.edit',compact('city'));
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
        $this->validate($request,[
            'name' => 'required'
        ]);
        $city = City::findOrFail($id);
        $city->cityname = $request->name;
        $city->save();
        $request->session()->flash('alert-info','Current city was updated successfully.');
        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        City::findOrFail($id)->delete();
        $request->session()->flash('alert-danger','City was deleted sucessfully.');
        return redirect()->route('city.index');
    }
}
