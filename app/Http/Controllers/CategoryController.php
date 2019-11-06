<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Category;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categories.index');
    }

    public function anyData(){
        $model = Category::query();
        return \DataTables::eloquent($model)
        ->addColumn('option',function(Category $category){
            return view('backend.categories.option',compact('category'));
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
        if(Auth::user()->hasPermission('create-category')){
            return view('backend.categories.create');
        }else{
            $request->session()->flash('alert-danger','Sorry, you dont have permission to creat a new.');
            return redirect()->route('category.index');
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
            'name' => 'required|min:6'
        ]);

        $cat = new Category();
        $cat->categoryname = $request->name;
        $cat->save();
        $request->session()->flash('alert-success','Category '.$cat->categoryname.' was created successfully.');
        return redirect()->route('category.index');
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
        if(Auth::user()->hasPermission('update-category')){
            $category = Category::findOrFail($id);
            return view('backend.categories.edit',compact('category'));
        }else{
            $request->session()->flash('alert-danger','Sorry, you dont have permission to edit this item.');
            return redirect()->route('category.index');
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
            'name' => 'required|min:6'
        ]);
        $cat = Category::findOrFail($id);
        $cat->categoryname = $request->name;
        $cat->save();
        $request->session()->flash('alert-info','Category was updated successfully.');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Auth::user()->hasPermission('delete-category')){
            Category::findOrFail($id)->delete();
            $request->session()->flash('alert-danger','Category was deleted sucessfully.');
        }else{
            $request->session()->flash('alert-danger','Sorry, you dont have permission to delete this item.');
        }
        
        return redirect()->route('category.index');
    }
}
