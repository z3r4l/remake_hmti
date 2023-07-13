<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
// use Intervention\Image\Exception\NotReadableException;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('posts')
            ->select('posts.*', 'categories.name as category_name')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->orderByDesc('created_at');
            
            return DataTables::of($data)
                    ->addIndexColumn('DT_RowIndex')
                    // ->addColumn('category', function($data){
                    //     return $data->category->name;
                    // })
                    ->addColumn('action', function($data){
     
                        $id             = $data->id;
                        $slug           = $data->slug;
                        $url_edit       = route('dashboard.posts.edit', $slug);
                        $url_show       = route('dashboard.posts.show', $slug);
                        $url_delete     = route('dashboard.posts.destroy', $slug);
      
                        $button     = '<a href="'.$url_edit.'" class="btn btn-rounded btn-sm btn-outline-warning mr-2" data-toggle="tooltip" title="Edit" data-bs-placement="top"><i class="mdi mdi-pencil"></i></a>';
                        $button    .= '<a href="'.$url_show.'" class="btn btn-rounded btn-sm btn-outline-info mr-2" data-toggle="tooltip" title="Show" data-bs-placement="top"><i class="mdi mdi-eye"></i></a>';
                        $button    .= '<a href="javascript:void(0)" id="'.$id.'" data-id="'.$url_delete.'" class="btn btn-rounded btn-sm btn-delete btn-outline-danger mr-2" data-toggle="tooltip" title="Delete" data-bs-placement="top"><i class="mdi mdi-delete"></i></a>';
        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('backend.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts  = new Post;
        $category   = Category::latest()->get();
        return view('backend.post.create', compact('category', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
    
        $path = $request->file('image');
        $extension  = $path->getClientOriginalExtension(); 
        
        $resize = Image::make($path)->resize(856, 580)->encode();
        $hash   = time().md5($resize->__toString()).".{$extension}";
        Storage::disk('local')->put('public/posts/' . $hash, $resize); 
        // $path   = "storage/posts/{$hash}";
        // $resize->save();

        Post::create([
            'title'             => $request->title,
            'category_id'       => $request->category_id,
            'link'              => $request->link,
            'body'              => $request->body,
            'image'             => $hash,
        ]);
        
        // Storage::disk('local')->put('public/posts/' . $path, file_get_contents($file)); 


        return redirect()->route('dashboard.posts.index')->with('success', 'Data Postingan Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('backend.post.show',[
            'post'     => $post,
            'category'  => Category::latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::latest()->get();
        $posts = $post;
        return view('backend.post.edit', compact('posts', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        if($request->hasFile('image')){
            
            $path = $request->file('image');
            $extension  = $path->getClientOriginalExtension(); 
    
            $resize = Image::make($path)->resize(856, 580)->encode();
            $hash   = time().md5($resize->__toString()).".{$extension}";
            $path   = "storage/posts/{$hash}";
            Storage::delete('public/posts/' . $post->image);
            $resize->save(public_path($path));
        }else{
            $hash       = $post->image;
        }
       $post->update([
            'title'             => $request->title,
            'category_id'       => $request->category_id,
            'link'              => $request->link,
            'body'              => $request->body,
            'image'             => $hash,
        ]);

        return redirect()->route('dashboard.posts.index')->with('success', 'Data Postingan Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Storage::delete('public/posts/' . $post->image);
        return response()->json([
            'success'   => true,
            'message'   => 'Data Postingan Berhasi Di Hapus'
        ]);
    }
}
