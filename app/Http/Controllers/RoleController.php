<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Role;
use App\Admin;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.roles.index');
    }

    public function anyData(){
        $model = Role::query();
        return \DataTables::eloquent($model)
        ->addColumn('permissions', function ($model) {
            foreach ($model->permissions as $key => $value) {
                # code...
                $data[] = $key;
            }
            return $data;
        })
        ->addColumn('option',function(Role $role){
            return view('backend.roles.option',compact('role'));
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
        $permissions = config('role-permissions');
        return view('backend.roles.create',compact('permissions'));
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
            'name' => 'required|min:3|unique:roles',
            'slug' => 'required|min:3|unique:roles',
            'permissions' => 'required|array'
        ]);
        Role::create($request->input());
        return redirect()->route('role.index');
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
        $role = Role::findOrFail($id);
        $permissions = config('role-permissions');
        return view('backend.roles.edit',compact('permissions','role'));
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
            'name' => 'required|min:3|unique:roles',
            'slug' => 'required|min:3|unique:roles',
            'permissions' => 'required|array'
        ]);
        Role::findOrFail($id)->update($request->all());
        return redirect()->route('role.index');
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
