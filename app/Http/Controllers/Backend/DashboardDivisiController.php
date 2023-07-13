<?php

namespace App\Http\Controllers\Backend;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\DivisiRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class DashboardDivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Divisi::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
     
                        $id             = $data->id;
                        $slug           = $data->slug;
                        $url_edit       = route('dashboard.divisi.edit', $slug);
                        // $url_show       = route('dashboard.divisi.show', $slug);
                        $url_delete     = route('dashboard.divisi.destroy', $slug);
      
                        $button     = '<a href="'.$url_edit.'" class="btn btn-rounded btn-sm btn-outline-warning mr-2" data-toggle="tooltip" title="Edit" data-bs-placement="top"><i class="mdi mdi-pencil"></i></a>';
                        // $button    .= '<a href="'.$url_show.'" class="btn btn-rounded btn-sm btn-outline-info mr-2" data-toggle="tooltip" title="Show" data-bs-placement="top"><i class="mdi mdi-eye"></i></a>';
                        $button    .= '<a href="javascript:void(0)" id="'.$id.'" data-id="'.$url_delete.'" class="btn btn-rounded btn-sm btn-delete btn-outline-danger mr-2" data-toggle="tooltip" title="Delete" data-bs-placement="top"><i class="mdi mdi-delete"></i></a>';
        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('backend.divisi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisi = new Divisi;
        return view('backend.divisi.create', compact('divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisiRequest $request)
    {
        $path = $request->file('image');
        $extension  = $path->getClientOriginalExtension(); 

        $resize = Image::make($path)->resize(1320, 741)->encode();
        $hash   = time().md5($resize->__toString()).".{$extension}";
        $path   = "storage/divisi/{$hash}";
        $resize->save(public_path($path));
        
        Divisi::create([
            'name'      => $request->name,
            'image'     => $hash,
            'definisi'  => $request->definisi
        ]);

        // Storage::disk('local')->put('public/divisi/' . $path, file_get_contents($file)); 


        return redirect()->route('dashboard.divisi.index')->with('success', 'Data Divisi Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        return view('backend.divisi.edit', compact('divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(DivisiRequest $request, Divisi $divisi)
    {        
        if($request->hasFile('image')){
            
            $path = $request->file('image');
            $extension  = $path->getClientOriginalExtension(); 

            $resize = Image::make($path)->resize(1320, 741)->encode();
            $hash   = time().md5($resize->__toString()).".{$extension}";
            $path   = "storage/divisi/{$hash}";
            Storage::delete('public/divisi/' . $divisi->image);
            $resize->save(public_path($path));

        }else{
            $hash       = $divisi->image;
        }
       $divisi->update([
            'name'      => $request->name,
            'image'     => $hash,
            'definisi'  => $request->definisi
        ]);

        return redirect()->route('dashboard.divisi.index')->with('success', 'Data Divisi Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        Storage::delete('public/divisi/' . $divisi->image);
        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Di Hapus'
        ]);
    }
}
