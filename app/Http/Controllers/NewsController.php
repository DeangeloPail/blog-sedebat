<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $usuario = Auth::user()->name;

        if($usuario != 'admin')
        {
            $News =  DB::table('news')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->select('news.id', 'news.descripcion_img', 'news.titulo', 'news.img', 'news.contenido', 'news.destacada', 'news.resumen', 'users.name', 'users.profile_photo_path', 'users.email', 'news.created_at')
            ->where('users.name', '=', "$usuario")
            ->orderBy('destacada', 'DESC')
            ->paginate(15);
        }else{
            $News =  DB::table('news')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->select('news.id', 'news.descripcion_img', 'news.titulo', 'news.img', 'news.contenido', 'news.destacada', 'news.resumen', 'users.name', 'users.profile_photo_path', 'users.email', 'news.created_at')
            ->orderBy('destacada', 'DESC')
            ->paginate(15);
        }

        if (!$News) {
            return redirect()->back()->with('error', 'Item not found');
        }
        return view('news.index', compact('News'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = date('d-m-Y-H:i:s');
        $date = str_replace(':', "", $date);
        $news = new News();
        $news->titulo = $request->titulo;
        $news->contenido = $request->contenido;
        $news->descripcion_img = $request->descripcion_img;
        $news->user_id = Auth::user()->id;

        if ($request->hasFile("img")) {
            $file = $request->file('img');
            $img = $request->file("img");
            $nameImg = Str::slug($request->titulo) . "{$date}." . $img->guessExtension();
            $slash = Controller::returnSlashes();
            $route = public_path("images{$slash}news{$slash}");
            // $img->move($route, $nameImg);
            $file->storeAs('public/images/news', $nameImg);
            $news->img = $nameImg;
        }

        $news->save();

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): View
    {
        $news = News::find($news);


        if (!$news) {
            return redirect()->back()->with('error', 'Item not found');
        }



        $news = $news->toArray()[0];
        //dd($news);

        if (!Storage::exists("public/images/news/{$news['img']}")) {
            $news['img'] = "default-image.jpg";
        }

        return view('news.show', compact('news'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
    {
        $news = News::find($news);

        if (!$news) {
            return redirect()->back()->with('error', 'Item not found');
        }

        $news = $news->toArray()[0];

        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {

        // $request->validate([
        //     'titulo' => 'required|max:50',
        //     'contenido' => 'require|max:100'

        // ]);

        $date = date('d-m-Y-H:i:s');
        $date = str_replace(':', "", $date);

        if ($request->hasFile("img")) {
            $img = $request->file("img");
            $nameImg = Str::slug($request->titulo) . "{$date}." . $img->guessExtension();
            $slash = Controller::returnSlashes();
            $route = public_path("images{$slash}news{$slash}");
            // $img->move($route, $nameImg);
            $img->storeAs('public/images/news', $nameImg);
            $news->img = $nameImg;
        }
        $news->titulo = $request->titulo;
        $news->contenido = $request->contenido;


        $news->update();

        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $img = $news->img;
        $slash = Controller::returnSlashes();
        $file_path = public_path("storage{$slash}images{$slash}news{$slash}$img");
        if (!Storage::exists($file_path)) {
            unlink($file_path);
        }
        $news->delete();

        return redirect()->route('news.index');
    }

    public function stared(News $news)
    {

        $news = $news->toArray();

        $newsA = News::whereId($news['id'])->first();

        if ($newsA->destacada) {
            $newsA->destacada = false;
        } else {
            $newsA->destacada = true;
        }

        $newsA->update();

        return redirect()->route('news.index');
    }

    public function guestShow($id): View
    {

        $news = DB::table('news')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->select('news.id', 'news.descripcion_img', 'news.titulo', 'news.img', 'news.contenido', 'news.destacada', 'news.resumen', 'users.name', 'users.email', 'news.created_at')
            ->where('news.id', '=', $id)
            ->first();

        $newsAll = News::all();
        $newsCant = $newsAll->count();
        $newsAll = $newsAll->toArray();

        if ($newsCant - 1 <= 1) {
            if ($newsCant == 2) {
                if ($id == $newsAll[0]['id']) {
                    $firstNews = $newsAll[1];
                    $secondNews = null;
                } else {
                    $firstNews = $newsAll[0];
                    $secondNews = null;
                }
            } else {
                $firstNews = $newsAll[0];
                $secondNews = null;
            }
        } else {
            $nId = 0;
            $count = 0;
            $aux = 0;

            while ($nId != $id) {
                $nId = $newsAll[$count]['id'];
                $aux = $count;
                $count++;
            }

            $exclude = array((int) $aux);
            $firstEx = $this->getRandomNumber(0, $newsCant - 1, $exclude);
            $firstNews = $newsAll[$firstEx];
            array_push($exclude, $firstEx);
            $secondNews = $newsAll[$this->getRandomNumber(0, $newsCant - 1, $exclude)];
        }


        if (!$news) {
            return redirect()->back()->with('error', 'Item not found');
        }



        if (!Storage::exists("public/images/news/{$news->img}")) {
            $news['img'] = "default-image.jpg";
        }

        return view('news.guestShow', compact('news', 'firstNews', 'secondNews'));
    }

    

    public function guestNews()
    {

        $News = News::orderBy('destacada', 'DESC')->paginate(15);

        if (!$News) {
            return redirect()->back()->with('error', 'Item not found');
        }


        return view('news.guestNews', compact('News'));
    }

    public function getRandomNumber($from, $to, array $exclude)
    {
        do {
            $n = mt_rand($from, $to);
        } while (in_array($n, $exclude));

        return $n;
    }
}
