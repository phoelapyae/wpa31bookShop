<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use App\Publisher;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.publishers.index');
    }

    public function anyData()
    {
        $model = Publisher::query();
        return \DataTables::eloquent($model)
                ->addColumn('option', function(Publisher $publisher) {
                   return view("backend.publishers.option", compact("publisher"));
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
        return view('backend.publishers.create');
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
            'name' => 'required|min:3'
        ]);
        $pub = new Publisher();
        $pub->publishername = $request->name;
        $pub->save();
        $request->session()->flash('alert-success','Publisher '.$pub->publishername.' was created successfully.');
        return redirect()->route('publisher.index');
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
        $publisher = Publisher::findOrFail($id);
        return view('backend.publishers.edit',compact('publisher'));
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
            'name' => 'required|min:3'
        ]);
        $pub = Publisher::findOrFail($id);
        $pub->publishername = $request->name;
        $request->session()->flash('alert-info','New publisher was updated successfully.');
        $pub->save();
        return redirect()->route('publisher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Publisher::findOrFail($id)->delete();
        $request->session()->flash('alert-danger','Publisher was deleted sucessfully.');
        return redirect()->route('publisher.index');
    }
}
