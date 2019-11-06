<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use App\Shop;
use Auth;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.shops.index');
    }

    public function anyData(){
        $model = Shop::query();
        return \DataTables::eloquent($model)
        ->addColumn('option',function(Shop $shop){
            return view('backend.shops.option',compact('shop'));
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
        if(Auth::user()->hasPermission('create-shop')){
            return view('backend.shops.create');
        }else{
            $request->session()->flash('alert-danger','Sorry you dont have permission to creat a new one!');
            return redirect()->route('shop.index');
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
        $shop = new Shop();
        $shop->shopname = $request->name;
        $shop->save();
        $request->session()->flash('alert-success','New shop '.$shop->shopname.' was created successfully.');
        return redirect()->route('shop.index');
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
        if(Auth::user()->hasPermission('create-shop')){
            $shop = Shop::findOrFail($id);
            return view('backend.shops.edit',compact('shop'));
        }else{
            $request->session()->flash('alert-danger','Sorry you dont have permission to edit this item!');
            return redirect()->route('shop.index');
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
        $shop = Shop::findOrFail($id);
        $shop->shopname = $request->name;
        $shop->save();
        $request->session()->flash('alert-info','Current shop was updated successfully.');
        return redirect()->route('shop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       Shop::findOrFail($id)->delete();
       $request->session()->flash('alert-danger','Shop was deleted sucessfully.');
       return redirect()->route('shop.index');
    }
}
