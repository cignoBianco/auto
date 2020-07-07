<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Excel;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Auto_part;

class AdminAutoPartController extends Controller
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
        $parts = Auto_part::all();
        foreach($parts as $part) {
            $part->category = DB::table('categories')
            ->where('id', $part->category_id)->first()->name;
        }
        
        return view('admin/part/part', ['parts' => $parts]);
    }


    public function createForm() {
        $categories = DB::table('categories')->get();
        $statuses = DB::table('statuses')->get();
        //$producers = DB::table('producers')-get();
        return view('admin/part/create_form', 
        ['statuses' => $statuses, 'categories' => $categories]);
    }


    public function create(Request $request)
    {
        $t = $request->file('main_picture')->move(('uploads'),
        $request->main_picture.'.'.
        $request->file('main_picture')->extension());
//(new Auto_part());
        $part = new Auto_part();
//dd($request->name);

        $part->name = $request->name;
        
        $part->number = $request->number;
        $part->article = $request->article;
        $part->description = $request->description;
        $part->specifications = $request->specifications;
        $part->category_id = $request->category_id;
        $part->producer = $request->producer;
        $part->description = $request->description;
        $part->price = $request->price;
        $part->producer_price = $request->producer_price;
        $part->priority = $request->priority;
        $part->status_id = $request->status_id;
        $part->provider_id = 1;//$request->producer;
        $part->available = (isset($request->available) == 'on' ? '1' : '0');
        $part->main_picture = ($request->main_picture) 
            ? 'uploads/'.$t->getFileName() : $part->main_picture;
        $part->seo_url = $request->seo_url;
        $part->meta_title = $request->meta_title;
        $part->meta_description = $request->meta_description;
        $part->meta_keywords = $request->meta_keywords;
//dd($part);
        $part->save();
        
        return redirect('/admin_panel/parts');
    }


    public function createFromExcel(Request $request)
    {
        dd($request);

        if (null == ($request->file('custom-file-input'))) {
            return redirect('/admin_panel/parts');
        }

        $path = $request->file('custom-file-input')->getPathName();
        
        $parts = (new FastExcel)->withoutHeaders()->import($path);
        
        for ($i = 2; $i < 100; ++$i) {
            if (Auto_part::where('name', '=', $parts[$i][0])->exists()
                || $parts[$i][2] == null) {
                continue;
            }

            $part = new Auto_part();
            $part->name = $parts[$i][0];
            $part->number = $parts[$i][2];
            $part->article = $parts[$i][1];
            $part->description = $parts[$i][3];
            $part->specifications = $parts[$i][4];
            $part->category_id = $parts[$i][5];
            $part->producer = $parts[$i][6];
            $part->price = $parts[$i][7];
            $part->producer_price = $parts[$i][8];
            $part->priority = $parts[$i][10];
            $part->status_id = $parts[$i][9];
            $part->provider_id = 1;
            $part->available = (isset($parts[$i][11]) == 'on' ? '1' : '0');
            $part->main_picture = ($parts[$i][12]) 
                ? 'uploads/'.$parts[$i][12] : $part->main_picture;
            $part->seo_url = $parts[$i][13];
            $part->meta_title = $parts[$i][14];
            $part->meta_description = $parts[$i][15];
            $part->meta_keywords = $parts[$i][16];
            $part->save();

        }

        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('uploads',$name);
                $images[]=$name;
            }
        }
        
        return redirect('/admin_panel/parts');
    }


    public function updateForm(Request $request, $id) {
        $part = Auto_part::find($id);
        $categories = DB::table('categories')->get();
        $statuses = DB::table('statuses')->get();
        $part->category = DB::table('categories')
            ->where('id', $part->category_id)->first()->name;
        
        return view('admin/part/update_part_form', 
            ['categories' => $categories, 
            'part' => $part, 
            'statuses' => $statuses]);
    }


    public function update(Request $request, $id)
    {
        if (null !== ($request->file('main_picture'))) {
            $t = $request->file('main_picture')->move(('uploads'),
            $request->main_picture.'.'.
            $request->file('main_picture')->extension());
        }

        $part = Auto_part::find($id);

        $part->name = $request->name;
        
        $part->number = $request->number;
        $part->article = $request->article;
        $part->description = $request->description;
        $part->specifications = $request->specifications;
        $part->category_id = $request->category_id;
        $part->producer = $request->producer;
        $part->description = $request->description;
        $part->price = $request->price;
        $part->producer_price = $request->producer_price;
        $part->priority = $request->priority;
        $part->status_id = $request->status_id;
        $part->provider_id = 1;//$request->producer;
        $part->seo_url = $request->seo_url;
        $part->meta_title = $request->meta_title;
        $part->meta_description = $request->meta_description;
        $part->meta_keywords = $request->meta_keywords;
//dd($part);
   
        
        $part->available = (isset($request->available) == 'on' ? '1' : '0');
        $part->main_picture = ($request->main_picture) 
            ? 'uploads/'.$t->getFileName() : $part->main_picture;
        
        $part->save();

        return redirect('/admin_panel/parts');
    }

    
    public function delete(Request $request, $id) 
    {
        $result = Auto_part::where('id',$id)->delete();

        return redirect('/admin_panel/parts');
    }
}
