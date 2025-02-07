<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Author;
use Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.authors.index');
    }

    public function anyData()
    {
        $model = Author::query();
        return \DataTables::eloquent($model)
                ->addColumn('option', function(Author $author) {
                   return view("backend.authors.option", compact("author"));
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
        if(Auth::user()->hasPermission('create-author')){
            return view('backend.authors.create');
        } else {
            return redirect()->route('author.index');
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
            'name' => 'required'
        ]);
        $author = new Author();
        $author->authorname = $request->name;
        $author->save();
        $request->session()->flash('alert-success','Author '.$author->authorname.' was created successfully.');
        return redirect()->route('author.index');
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
    public function edit(Request $request, $id)
    {
        if(Auth::user()->hasPermission('update-author')){
            $author = Author::findOrFail($id);
            return view('backend.authors.edit',compact('author'));
        } else {
            $request->session()->flash('alert-danger','Sorry, you dont have permission to edit this item!');
            return redirect()->route('author.index');
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
            'name' => 'required'
        ]);
        $author = Author::findOrFail($id);
        $author->authorname = $request->name;
        $author->save();
        $request->session()->flash('alert-info','New author was updated successfully.');
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Auth::user()->hasPermission('delete-author')){
            Author::findOrFail($id)->delete();
            $request->session()->flash('alert-danger','Author was deleted sucessfully.');
        }else{
            $request->session()->flash('alert-danger','Sorry, you dont have permission to delete this item');
        }
        return redirect()->route('author.index');
    }
}
