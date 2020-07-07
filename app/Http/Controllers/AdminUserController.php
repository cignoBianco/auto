<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminUserController extends Controller
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
        $users = User::all();
        foreach($users as $user) {
            $user->garage = (DB::table('garages')
            ->where('id', $user->garage_id)->first()->brand) ?
            DB::table('garages')
            ->where('id', $user->garage_id)->first()->brand 
            : 'no garage';
        }
        
        return view('admin/user/user', ['users' => $users]);
    }


    public function createForm() {
        $garages = DB::table('garages')->get();
        return view('admin/user/user_form', 
        [ 'garages' => $garages]);
    }


    public function create(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->is_admin = (isset($request->is_admin) == 'on' ? '1' : '0');
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->garage_id = $request->garage_id;
        $user->balance = $request->balance;
        $user->garage_id = $request->garage_id;
        
        $user->save();
        
        return redirect('/admin_panel/users');
    }


    public function updateForm(Request $request, $id) {
        $user = User::find($id);
        $garages = DB::table('garages')->get();
        
        return view('admin/user/update_user_form', 
            ['garages' => $garages, 
            'user' => $user]
        );
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->is_admin = (isset($request->is_admin) == 'on' ? '1' : '0');
        $user->email = $request->email;
        $user->garage_id = $request->garage_id;
        $user->balance = $request->balance;
        
        $user->save();

        return redirect('/admin_panel/users');
    }

    
    public function delete(Request $request, $id) 
    {
        $result = User::where('id',$id)->delete();

        return redirect('/admin_panel/users');
    }
}
