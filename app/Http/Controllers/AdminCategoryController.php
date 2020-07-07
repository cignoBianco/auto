<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Category;


class AdminCategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        foreach($categories as $category) {
            $category->section = DB::table('sections')
            ->where('id', $category->section_id)->first()->name;
        }
        
        return view('admin/category/category', ['categories' => $categories]);
    }


    public function createForm() {
        $sections = DB::table('sections')->get();
        return view('admin/category/create_form', ['sections' => $sections]);
    }


    public function create(Request $request)
    {
        $t = $request->file('main_picture')->move(('uploads'), 
            $request->main_picture.'.'.
            $request->file('main_picture')->extension());

        $category = new Category();

        $category->name = $request->name;
        $category->specifications = $request->specifications;
        $category->section_id = $request->section_id;
        $category->priority = $request->priority;
        $category->show = (isset($request->show) == 'on' ? '1' : '0');
        //$category->main_picture = 'uploads/'.$request->main_picture;
        $category->main_picture = ($request->main_picture) 
            ? 'uploads/'.$t->getFileName() : $category->main_picture;
        $category->seo_url = $request->seo_url;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;

        $category->save();
        
        
        return redirect('/admin_panel/categories');
    }


    public function updateForm(Request $request, $id) {
        $category = Category::find($id);
        $sections = DB::table('sections')->get();
        $category->section = DB::table('sections')
            ->where('id', $category->section_id)->first()->name;
        
        return view('admin/category/update_category_form', ['category' => $category, 
        'sections' => $sections]);
    }


    public function update(Request $request, $id)
    {
        if (null !== ($request->file('main_picture'))) {
            $t = $request->file('main_picture')->move(('uploads'), 
                $request->main_picture.'.'.
                $request->file('main_picture')->extension());
        }

        $category = Category::find($id);

        $category->name = $request->name;
        $category->specifications = $request->specifications;
        $category->section_id = $request->section_id;
        $category->priority = $request->priority;
        $category->show = (isset($request->show) == 'on' ? '1' : '0');
        $category->main_picture = ($request->main_picture) 
            ? 'uploads/'.$t->getFileName() : $category->main_picture;
        $category->seo_url = $request->seo_url;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;

        $category->save();

        return redirect('/admin_panel/categories');
    }

    
    public function delete(Request $request, $id) 
    {
        $result = Category::where('id',$id)->delete();

        return redirect('/admin_panel/categories');
    }
}
