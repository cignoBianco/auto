<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Auto_product;

class AdminAutoProductController extends Controller
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
        $parts = Auto_product::all();
        foreach($parts as $part) {
            $part->category = DB::table('categories')
            ->where('id', $part->category_id)->first()->name;
        }
        
        return view('admin/product/product', ['products' => $parts]);
    }


    public function createForm() {
        $categories = DB::table('categories')->get();
        $statuses = DB::table('statuses')->get();
        //$producers = DB::table('producers')-get();
        return view('admin/product/create_form', 
        ['statuses' => $statuses, 'categories' => $categories]);
    }


    public function create(Request $request)
    {
        $t = $request->file('main_picture')->move(('uploads'),
        $request->main_picture.'.'.
        $request->file('main_picture')->extension());

        $product = new Auto_product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->specifications = $request->specifications;
        $product->category_id = $request->category_id;
        $product->points = $request->points;
        $product->price = $request->price;
        $product->performer_price = $request->performer_price;
        $product->price_in_points = $request->price_in_points;
        $product->status_id = $request->status_id;
        $product->available = (isset($request->available) == 'on' ? '1' : '0');
        $product->main_picture = ($request->main_picture) 
            ? 'uploads/'.$t->getFileName() : $part->main_picture;
        $product->seo_url = $request->seo_url;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        $product->save();
        
        return redirect('/admin_panel/products');
    }


    public function updateForm(Request $request, $id) {
        $part = Auto_product::find($id);
        $categories = DB::table('categories')->get();
        $statuses = DB::table('statuses')->get();
        $part->category = DB::table('categories')
            ->where('id', $part->category_id)->first()->name;
        
        return view('admin/product/update_product_form', 
            ['categories' => $categories, 
            'product' => $part, 
            'statuses' => $statuses]);
    }


    public function update(Request $request, $id)
    {
        if (null !== ($request->file('main_picture'))) {
            $t = $request->file('main_picture')->move(('uploads'),
            $request->main_picture.'.'.
            $request->file('main_picture')->extension());
        }

        $product = Auto_product::find($id);

        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->specifications = $request->specifications;
        $product->category_id = $request->category_id;
        $product->points = $request->points;
        $product->price = $request->price;
        $product->performer_price = $request->performer_price;
        $product->price_in_points = $request->price_in_points;
        $product->status_id = $request->status_id;
        $product->seo_url = $request->seo_url;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

   
        
        $product->available = (isset($request->available) == 'on' ? '1' : '0');
        $product->main_picture = ($request->main_picture) 
            ? 'uploads/'.$t->getFileName() : $product->main_picture;
        
        $product->save();

        return redirect('/admin_panel/products');
    }

    
    public function delete(Request $request, $id) 
    {
        $result = Auto_product::where('id',$id)->delete();

        return redirect('/admin_panel/products');
    }
}
