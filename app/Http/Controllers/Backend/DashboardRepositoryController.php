<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepositoryRequest;
use App\Models\Repository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DashboardRepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  DB::table('repositories')
            ->select( 'id','slug','name')
            ->orderBy('created_at', 'desc')->get();
           
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
     
                        $id             = $data->id;
                        $slug           = $data->slug;
                        $url_edit       = route('dashboard.repository.edit', $slug);
                        $url_delete     = route('dashboard.repository.destroy', $slug);
      
                        $button     = '<a href="'.$url_edit.'" class="btn btn-rounded btn-sm btn-outline-warning mr-2" data-toggle="tooltip" title="Edit" data-bs-placement="top"><i class="mdi mdi-pencil"></i></a>';
                        $button    .= '<a href="javascript:void(0)" id="'.$id.'" data-id="'.$url_delete.'" class="btn btn-rounded btn-sm btn-delete btn-outline-danger mr-2" data-toggle="tooltip" title="Delete" data-bs-placement="top"><i class="mdi mdi-delete"></i></a>';
        
                        return $button;
                    })
                    ->addColumn('repositoryContents', function($data){
                        $slug           = $data->slug;
                        $url_isi        = route('dashboard.repository.content.index', $slug);
                        $buttonAddContents     = '<a href="'.$url_isi.'" class="btn btn-rounded btn-sm btn-outline-dark mr-2" data-toggle="tooltip" title="Isi Content" data-bs-placement="top"><i class="mdi mdi-folder-plus"></i></a>';

                        return $buttonAddContents;
                    })
                    ->rawColumns(['action','repositoryContents'])
                    ->make(true);
        }
        
        return view('backend.repository.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.repository.create', [
            'repository' => new Repository
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepositoryRequest $request)
    {

        // dd($request->all());
        Repository::create([
            'name'  => $request->name,
        ]);

        return redirect()->route('dashboard.repository.index')->with('success','Repository Berhasil Di Buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(Repository $repository)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function edit(Repository $repository)
    {
        return view('backend.repository.edit', compact('repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(RepositoryRequest $request, Repository $repository)
    {
        $repository->update([
            'name'  => $request->name,
        ]);

        return redirect()->route('dashboard.repository.index')->with('success','Repository Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repository $repository)
    {
       $repository->delete();
    }
}
