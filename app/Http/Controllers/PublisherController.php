<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use App\Publisher;
use Auth;

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
    public function create(Request $request)
    {
        if(Auth::user()->hasPermission('create-publisher')){
            return view('backend.publishers.create');
        }else{
            $request->session()->flash('alert-danger','Sorry, you dont have permission to create a new one!');
            return redirect()->route('publisher.index');
        }
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
    public function edit(Request $request,$id)
    {
        if(Auth::user()->hasPermission('update-publisher')){
            $publisher = Publisher::findOrFail($id);
            return view('backend.publishers.edit',compact('publisher'));
        }else{
            $request->session()->flash('alert-success','Sorry, you dont have permission to edit this one!');
            return redirect()->route('publisher.index');
        }
        
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
        if(Auth::user()->hasPermission('delete-publisher')){
            Publisher::findOrFail($id)->delete();
            $request->session()->flash('alert-danger','Publisher was deleted sucessfully.');
        }else{
            $request->session()->flash('alert-danger','Sorry, you dont have permission to delete this one!');
        }
        return redirect()->route('publisher.index');
    }
}
