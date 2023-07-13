<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Repository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\RepositoryContent;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardRepositoryContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Repository $repository)
    {
        return view('backend.repository.contents.index',compact('repository'));
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
    public function store(Request $request, Repository $repository)
    {
        RepositoryContent::create([
            'repository_id' => $request->repository_id,
            'name'  => $request->name,
            'time'  => Carbon::createFromFormat('Y-m', $request->input('time')),
            'link'  => $request->link,
        ]);

        return redirect()->route('dashboard.repository.content.index', $repository->slug)->with('success','Repository Content Berhasil Di Buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RepositoryContent  $repositoryContent
     * @return \Illuminate\Http\Response
     */
    public function show(RepositoryContent $repositoryContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RepositoryContent  $repositoryContent
     * @return \Illuminate\Http\Response
     */
    public function edit(RepositoryContent $repositoryContent, Repository $repository)
    {
        return view('backend.repository.contents.edit', compact('repositoryContent', 'repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RepositoryContent  $repositoryContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RepositoryContent $repositoryContent, Repository $repository)
    {
        $repositoryContent->update([
            'repository_id' => $request->repository_id,
            'name'  => $request->name,
            'time'  => Carbon::createFromFormat('Y-m', $request->input('time')),
            'link'  => $request->link,
        ]);

        return redirect()->route('dashboard.repository.content.index', $repository->slug)->with('success','Repository Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RepositoryContent  $repositoryContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepositoryContent $repositoryContent)
    {
        $repositoryContent->delete();
        return response()->json([
            'success'   => true,
            'message'   => 'Data Repository Content Berhasi Di Hapus'
        ]);
    }

    public function table(Request $request, Repository $repository){
        if ($request->ajax()) {
            $data =  DB::table('repository_contents')
            ->select('repository_contents.*', 'repositories.id','repositories.slug as repository_slug')
            ->leftJoin('repositories', 'repository_contents.repository_id', '=', 'repositories.id')
            ->where('repository_contents.repository_id', '=', $repository->id)
            ->orderByDesc('created_at')
            ->get();
          
            return DataTables::of($data)
                    ->addIndexColumn('DT_RowIndex')
                    ->addColumn('action', function($data){
                        $id             = $data->id;
                        $slug           = $data->slug;
                        $slugRepo       = $data->repository_slug;
                        $url_edit       = route('dashboard.repository.content.edit', [$slug, $slugRepo]);
                        $url_delete     = route('dashboard.repository.content.destroy', $slug);
      
                        $button         =  '<a href="'.$url_edit.'" class="btn btn-rounded btn-sm btn-outline-warning mr-2" data-toggle="tooltip" title="Edit" data-bs-placement="top"><i class="mdi mdi-pencil"></i></a>';
                        $button         .= '<a href="javascript:void(0)" id="'.$id.'" data-id="'.$url_delete.'" class="btn btn-rounded btn-sm btn-delete btn-outline-danger mr-2" data-toggle="tooltip" title="Delete" data-bs-placement="top"><i class="mdi mdi-delete"></i></a>';
        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return redirect()->redirect('dashboard.repository.content.index');
    }
}
