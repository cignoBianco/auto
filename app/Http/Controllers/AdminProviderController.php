<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Provider;

class AdminProviderController extends Controller
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
        $providers = Provider::all();
        
        return view('admin/provider/provider', ['providers' => $providers]);
    }


    public function createForm() {
        return view('admin/provider/provider_form');
    }


    public function create(Request $request)
    {
        $provider = new Provider();

        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->description = $request->description;
        $provider->assessment = $request->assessment;
        $provider->orders_completed_at_time_amount = $request->orders_completed_at_time_amount;
        $provider->orders_not_completed_at_time_amount = $request->orders_not_completed_at_time_amount;
        $provider->orders_not_completed_amount = $request->orders_not_completed_amount;
        
        $provider->save();
        
        return redirect('/admin_panel/providers');
    }


    public function updateForm(Request $request, $id) {
        $provider = Provider::find($id);
        
        return view('admin/provider/update_provider_form',
         ['provider' => $provider]);
    }


    public function update(Request $request, $id)
    {
        $provider = Provider::find($id);

        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->description = $request->description;
        $provider->assessment = $request->assessment;
        $provider->orders_completed_at_time_amount = $request->orders_completed_at_time_amount;
        $provider->orders_not_completed_at_time_amount = $request->orders_not_completed_at_time_amount;
        $provider->orders_not_completed_amount = $request->orders_not_completed_amount;
        
        $provider->save();

        return redirect('/admin_panel/providers');
    }

    
    public function delete(Request $request, $id) 
    {
        $result = Provider::where('id',$id)->delete();

        return redirect('/admin_panel/providers');
    }
}
