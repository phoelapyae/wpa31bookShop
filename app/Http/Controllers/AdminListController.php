<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Admin;
use App\Role;
use DB;
use Auth;

class AdminListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.adminlists.index');
    }

    public function anyData(){
        $model = Admin::query();
        return \DataTables::eloquent($model)
        ->addColumn('role',function($model){
            $data = $model->roles->first()->name;
            return $data;
        })
        ->addColumn('option',function(Admin $admin){
            $roles = Role::select('id','name')->get();
            return view('backend.adminlists.option',compact('admin','roles'));
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
        $roles = Role::select('name','id')->get();
        return view('backend.adminlists.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'is_super' => 0,
            'is_delete' => 0
        ];
        $admin = Admin::create($data);
        $admin->roles()->attach($request->get('roles'));
        return redirect()->route('administrator.index');
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
        if(Auth::user()->hasPermission('edit-admin')){
            $roles = Role::select('name','id')->get();
            $admin = Admin::findOrFail($id);
            return view('backend.adminlists.edit',compact('roles','admin'));
        }else{
            $request->session()->flash('alert-danger','Sorry, you dont have permission to edit this item!');
            return redirect()->route('role.index');
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
        $role_id = $request->input('roles');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        if(isset($password) && !empty($password)){
            $userupdate = ['name' => $name, 'email' => $email, 'password' => bcrypt($password)];
        } else {
            $userupdate = ['name' => $name, 'email' => $email];
        }
        Admin::findOrFail($id)->update($userupdate);
        DB::table('role_admins')->where('admin_id',$id)->update(['role_id' => $role_id]);
        return redirect()->route('administrator.index');
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
