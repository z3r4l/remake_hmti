<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Divisi;
use App\Models\Post;
use App\Models\Struktur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){
      $dataPost      = Post::count();
      $dataCategory  = Category::count();
      $dataStruktur  = Struktur::count() - 4;
      $dataDivisi    = Divisi::count();
    return view('backend.dashboard.index', compact('dataPost','dataCategory', 'dataStruktur', 'dataDivisi'));
   }
}
