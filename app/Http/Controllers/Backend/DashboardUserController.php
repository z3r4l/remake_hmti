<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')->select('id', 'name', 'is_admin', 'email')->orderBy('created_at', 'DESC');
            return DataTables::of($data)
                    ->addIndexColumn('DT_RowIndex')
                    ->addColumn('changeJob', function($data){
                        $id             = $data->id;
                        $url_edit       = route('dashboard.user.edit', $id);
      
                        $button         = '<form id="make-admin-form-'.$data->id.'" action="'.route('dashboard.user.update', $data->id).'" method="POST">
                                            ' . csrf_field() .'
                                            ' . method_field('PUT') . '
                                            <button type="submit" class="btn btn-rounded btn-sm btn-success mr-2" data-toggle="tooltip" title="Jadikan Admin" data-bs-placement="top" onclick="event.preventDefault(); makeAdmin('.$data->id.')">Jadikan Admin</button>
                                            </form>';
                        $admin          = '<p>Admin</p>';
        
                        $kondisi = "";
                        if ($data->is_admin == 1) {
                            $kondisi = $admin;  
                        } else {
                            $kondisi = $button; 
                        }
                        return $kondisi;
                    })
                    ->addColumn('delete', function($data){
                        $id             = $data->id;
                        $url_delete     = route('dashboard.user.destroy', $id);
                        $buttonDelete   = '<a href="javascript:void(0)" id="'.$id.'" data-id="'.$url_delete.'" class="btn btn-rounded btn-sm btn-delete btn-outline-danger mr-2" data-toggle="tooltip" title="Delete" data-bs-placement="top"><i class="mdi mdi-delete"></i></a>';
                        
                        return $buttonDelete;
                    })
                    ->rawColumns(['changeJob', 'delete'])
                    ->make(true);
        }
        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->is_admin = 1;
        $user->save();
        return redirect()->route('dashboard.user.index')->with('success', 'User berhasil dijadikan admin.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return response()->json([
            'success'   => true,
            'message'   => 'Data User Berhasi Di Hapus'
        ]);
    }
}
