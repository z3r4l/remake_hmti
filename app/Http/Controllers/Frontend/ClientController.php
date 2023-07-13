<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Divisi;
use App\Models\Post;
use App\Models\Repository;
use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        return view('frontend.page.beranda.index',
 [
            'posts'             => Post::with(['category'])->latest()->paginate(),
            'postsLimit'        => Post::with(['category'])->latest()->offset(1)->limit(4)->get(),
            'jumlahRepository'  => Post::all()->count(),
            'jumlahAnggota'     => Struktur::all()->count() - 4,
            'struktur'          => Struktur::where('divisi_id', '1')->limit(4)->get(),
        ]);
    }

    public function tentang()
    {
        return view('frontend.page.tentang.index');
    }

    public function struktur(){
        return view('frontend.page.struktur.index',[
            'struktur' => Struktur::where('divisi_id', '1')->get()
        ]);
    }

    public function kegiatan(){
        $posts          = Post::with(['category'])->latest()->paginate(6);
        return view('frontend.page.kegiatan.index', compact('posts'));
    }

    public function loadOnScroll(Request $request)
    {
        $posts = DB::table('posts')
            ->select('posts.*', 'categories.name as category_name','categories.slug as category_slug')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->orderByDesc('created_at')
            ->paginate(6);


        if ($request->ajax()) {
            $view = view('frontend.partials.cardKegiatan.index', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('frontend.page.kegiatan.index', compact('posts'));
    }

    public function post(Post $post){
        return view('frontend.page.post.index',
    [
        'post' => $post,
        'category' => Category::all(),
        'posts'     => Post::latest()->limit(2)->get()
    ]);
    }

    public function categoryLoadOnScroll(Request $request, Category $category){
        $posts = Post::where('category_id', $category->id)->latest()->paginate(10);
        if ($request->ajax()) {
            $view = view('frontend.partials.cardKegiatan.index', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('frontend.page.category.index', compact('posts'));
    }

    public function kritikSaran()
    {
        return view('frontend.page.kritikSaran.index');
    }

    public function repository()
    {   $dt = Carbon::now();

        // dd($dt->month);
        // $repository = Repository::latest()->get();
        $repository = DB::table('repositories')
        ->select('*')
        // ->orderByRaw("DATE_FORMAT(time, '%M') DESC")
        ->orderBy('created_at', 'DESC')
        ->get();
        // dd($repository);
        return view('frontend.page.repository.index', compact('repository'));
    }
    public function repositoryContent(Repository $repository){
        $repositoryContent  =  DB::table('repository_contents')
        ->select('repository_contents.*', 'repositories.id','repositories.slug as repository_slug')
        ->leftJoin('repositories', 'repository_contents.repository_id', '=', 'repositories.id')
        ->where('repository_contents.repository_id', '=', $repository->id)
        ->orderByDesc('time')
        ->get();
        return view('frontend.page.repository.repositoryContent.index', compact('repositoryContent'));
    }

    public function divisiIndex(Divisi $divisi){
     
        return view('frontend.page.divisi.index', [
            'divisis'        => Divisi::find($divisi),
            'struktur'      => $divisi->strukturs->load('divisi'),
            'namaDivisi'    => $divisi->name,
            'descDivisi'    => $divisi->definisi,
        ]);
    }
}
