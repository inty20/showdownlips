<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $user = DB::table('users')->where('id', Auth::id())->first();
        $times = DB::select('select id, nome_time from users_equip where users_id = ? order by created_at desc limit 10', [Auth::id()]);

        return view('home', ['user' => $user, 'times' => $times]);
    }

    public function perfil(Request $request)
    {
        $update = [];
        if(!is_null($request->name)) $update['name'] = $request->name;
        if(!is_null($request->email)) $update['email'] = $request->email;
        if(!is_null($request->password)) $update['password'] = Hash::make($request->password);

        if(!empty($update)) DB::table('users')->where('id', Auth::id())->update($update);
        // update Auth 

        if(!empty($request->photo)){
            //echo '<pre>'; var_dump($request->photo); die;
            $extension = 'photo_'.Auth::id().'.'.pathinfo($request->photo, PATHINFO_EXTENSION);
            Storage::disk('local')->put($extension, $request->photo);
        }

        return redirect()->route('home');
    }

    public function desafiar(Request $request)
    {
        DB::table('users_equip')
            ->insert([
                'users_id' => Auth::id(),
                'tier' => $request->tier,
                'nome_time' => $request->nome_time,
                'pokemon_1' => $request->pokemon_1,
                'pokemon_2' => $request->pokemon_2,
                'pokemon_3' => $request->pokemon_3,
                'pokemon_4' => $request->pokemon_4,
                'pokemon_5' => $request->pokemon_5,
                'pokemon_6' => $request->pokemon_6
            ]);

        return redirect()->route('home');
    }

    public function resultados(Request $request)
    {
        if(!empty($request->elite1)){
            $extension = 'batalha1_'.$request->time.'.'.pathinfo($request->elite1, PATHINFO_EXTENSION);
            Storage::disk('local')->put($extension, $request->elite1);
        }
        if(!empty($request->elite2)){
            $extension = 'batalha2_'.$request->time.'.'.pathinfo($request->elite2, PATHINFO_EXTENSION);
            Storage::disk('local')->put($extension, $request->elite2);
        }
        if(!empty($request->elite3)){
            $extension = 'batalha3_'.$request->time.'.'.pathinfo($request->elite3, PATHINFO_EXTENSION);
            Storage::disk('local')->put($extension, $request->elite3);
        }
        if(!empty($request->elite4)){
            $extension = 'batalha4_'.$request->time.'.'.pathinfo($request->elite4, PATHINFO_EXTENSION);
            Storage::disk('local')->put($extension, $request->elite4);
        }
        if(!empty($request->elite5)){
            $extension = 'batalha5_'.$request->time.'.'.pathinfo($request->elite5, PATHINFO_EXTENSION);
            Storage::disk('local')->put($extension, $request->elite5);
        }

        return redirect()->route('home');
    }
}
