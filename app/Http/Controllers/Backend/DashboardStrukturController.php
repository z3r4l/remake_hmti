<?php

namespace App\Http\Controllers\Backend;

use App\Models\Divisi;
use App\Models\Struktur;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StrukturRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DashboardStrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Struktur::with('divisi')->latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('divisi', function($data){
                        return $data->divisi->name;
                    })
                    ->addColumn('action', function($data){
     
                        $id             = $data->id;
                        $slug           = $data->slug;
                        $url_edit       = route('dashboard.struktur.edit', $slug);
                        $url_delete     = route('dashboard.struktur.destroy', $slug);
      
                        $button     = '<a href="'.$url_edit.'" class="btn btn-rounded btn-sm btn-outline-warning mr-2" data-toggle="tooltip" title="Edit" data-bs-placement="top"><i class="mdi mdi-pencil"></i></a>';
                        $button    .= '<a href="javascript:void(0)" id="'.$id.'" data-id="'.$url_delete.'" class="btn btn-rounded btn-sm btn-delete btn-outline-danger mr-2" data-toggle="tooltip" title="Delete" data-bs-placement="top"><i class="mdi mdi-delete"></i></a>';
        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('backend.struktur.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $struktur = new Struktur;
        $divisi     = Divisi::get();
        return view('backend.struktur.create', compact('struktur', 'divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StrukturRequest $request)
    {
        $path = $request->file('image');
        $extension  = $path->getClientOriginalExtension(); 

        $resize = Image::make($path)->resize(307, 409)->encode();
        $hash   = time().md5($resize->__toString()).".{$extension}";
        $path   = "storage/struktur/{$hash}";
        $resize->save(public_path($path));

        Struktur::create([
            'divisi_id'         => $request->divisi_id,
            'name'              => $request->name,
            'jabatan'           => $request->jabatan,
            'image'             => $hash
        ]);

        // Storage::disk('local')->put('public/struktur/' . $path, file_get_contents($file)); 

        return redirect()->route('dashboard.struktur.index')->with('success', 'Data Struktur Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur $struktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Struktur $struktur)
    {
        $divisi = Divisi::latest()->get();
        return view('backend.struktur.edit', compact('struktur', 'divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function update(StrukturRequest $request, Struktur $struktur)
    {
        if($request->hasFile('image')){
          
            $path = $request->file('image');
            $extension  = $path->getClientOriginalExtension(); 
    
            $resize = Image::make($path)->resize(307, 409)->encode();
            $hash   = time().md5($resize->__toString()).".{$extension}";
            $path   = "storage/struktur/{$hash}";
            Storage::delete('public/struktur/' . $struktur->image);
            $resize->save(public_path($path));

        }else{
            $hash       = $struktur->image;
        }

       $struktur->update([
            'divisi_id'         => $request->divisi_id,
            'name'              => $request->name,
            'jabatan'           => $request->jabatan,
            'image'             => $hash,
        ]);

        return redirect()->route('dashboard.struktur.index')->with('success', 'Data Struktur Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struktur $struktur)
    {
        $struktur->delete();
        Storage::delete('public/struktur/' . $struktur->image);

        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Di Hapus'
        ]);
    }
}
