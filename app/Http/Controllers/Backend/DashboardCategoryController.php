<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('categories')->select('id', 'slug', 'name')->orderBy('created_at', 'DESC');
            return Datatables::of($data)
                    ->addIndexColumn('DT_RowIndex')
                    ->addColumn('action', function($data){
     
                        $id             = $data->id;
                        $slug           = $data->slug;
                        $url_edit       = route('dashboard.category.edit', $slug);
                        $url_delete     = route('dashboard.category.destroy', $slug);
      
                        $button     = '<a href="'.$url_edit.'" class="btn btn-rounded btn-sm btn-outline-warning mr-2" data-toggle="tooltip" title="Edit" data-bs-placement="top"><i class="mdi mdi-pencil"></i></a>';
                        $button    .= '<a href="javascript:void(0)" id="'.$id.'" data-id="'.$url_delete.'" class="btn btn-rounded btn-sm btn-delete btn-outline-danger mr-2" data-toggle="tooltip" title="Delete" data-bs-placement="top"><i class="mdi mdi-delete"></i></a>';
        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        
       
        return view('backend.category.create', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name'      =>  $request->name,
        ]);
        
        return  redirect()->route('dashboard.category.index')->with('success','Kategori Berhasil Di Buat');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name'      =>  $request->name,
        ]);

        return redirect()->route('dashboard.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Category::where('slug', $slug)->delete();

        $category->delete();
        //return response
        return response()->json([
        
          'success' => true,
          'message' => 'Deleted Data Success!.',
      ]); 
    }

    // public function tables(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Category::select('id','name','slug');
    //         return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('action', function($row){
     
    //                        $btn = '<a href="javascript:void(0)" class="btn btn-danger">View</a>';
    
    //                         return $btn;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
    //     }
        
    //     return view('backend.category.index');
    // }


}
