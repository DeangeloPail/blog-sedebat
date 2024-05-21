<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {

        $news = DB::table('news')
        ->join('users', 'news.user_id', '=', 'users.id')
        ->select('news.id', 'news.descripcion_img', 'news.titulo', 'news.img', 'news.contenido', 'news.destacada', 'news.resumen', 'users.name', 'users.profile_photo_path', 'users.email', 'news.created_at')
        ->where('news.destacada', '=', true)
        ->get();

        $latestNews = DB::table('news')
        ->join('users', 'news.user_id', '=', 'users.id')
        ->select('news.id', 'news.descripcion_img', 'news.titulo', 'news.img', 'news.contenido', 'news.destacada', 'news.resumen', 'users.name', 'users.profile_photo_path', 'users.email', 'news.created_at')
        ->latest('news.created_at')
        ->first();

        $latestWeekNews = DB::table('news')
        ->join('users', 'news.user_id', '=', 'users.id')
        ->select('news.id', 'news.descripcion_img', 'news.titulo', 'news.img', 'news.contenido', 'news.destacada', 'news.resumen', 'users.name', 'users.profile_photo_path', 'users.email', 'news.created_at')
        ->orderBy('news.created_at', 'desc')
        ->skip(1)
        ->take(9)
        ->get();

        // $news = News::where('destacada', true)->get();

        // $news = $news->toArray();

        return view('welcome', compact('news', 'latestNews', 'latestWeekNews'));
    }
    public function tramites()
    {

        $latestNews = News::latest('created_at')->first();

        $destacatedNews = News::where('destacada', true)->get();

        $lastDestacated = News::where('destacada', true)->latest('created_at')->first();

        return view('tramites', compact('destacatedNews', 'latestNews', 'lastDestacated'));
    }
}