<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('home');
    }


    public function ShowParts() {

        return view('site.parts');
    }

    public function ShowTable() {

        return view('site.stol-zakazov');
    }

    public function ShowCatalogOem() {

        return view('site.catalog');
    }

    public function ShowCatalog() {

        return view('site.main-catalog');
    }

    public function GetConsierge() {
        
        return  view('site.consierge');
    }

    public function GetConsiergeParthner() {
        
        return  view('site.consierge-parthner');
    }

    public function GetConsiergeAbout() {
        
        return  view('site.consierge-about');
    }

    public function GetConsiergeFaq() {
        
        return  view('site.consierge-faq');
    }

}
