<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function first()
    {
        $datas = DB::table('articles')
            ->select('articles.id','articles.title','articles.content','articles.image','articles.user_id','articles.category_id','categories.name')
            ->Join('categories', 'articles.category_id', '=', 'categories.id')
            ->orderBy('articles.id','desc')
            ->get();
        return view('/auth/first', compact('datas'));
    }

    public function first_detail($id)
    {
        $datas = DB::table('articles')
            ->select('articles.id','articles.title','articles.content','articles.image','articles.user_id','articles.category_id', DB::raw('DATE_FORMAT(articles.created_at, "%d %M, %Y") as created_at'),'categories.name')
            ->Join('categories', 'articles.category_id', '=', 'categories.id')
            ->where('articles.id', $id)
            ->first();
        return view('/auth/first_detail', compact('datas'));
    }

    public function index()
    {
        return view('/home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
