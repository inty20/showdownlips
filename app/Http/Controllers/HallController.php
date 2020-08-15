<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HallController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users_equip = DB::select('select * from users_equip 
            join users on users.id = users_equip.users_id 
            where hall_fame = ? order by users_equip.created_at desc', [1]);

        return view('hall', ['users_equip' => $users_equip]);
    }
}
