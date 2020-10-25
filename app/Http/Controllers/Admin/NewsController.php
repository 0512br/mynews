<?php
//Controllerの雛形
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 14で追記、Modelを扱えるようにしている
use App\News;

class NewsController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }
    // 13で追記
    public function create(Request $request)
    {
        //14で追記
        //①Validationの実行
        $this->validate($request, News::$rules);
        //②Newsインスタンス作成
        $news = new News;
        // $rules = $news->rules;
        //③値を用意
        $form = $request->all();
        //画像が送信されたら保存して$news->image_pathに画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        //③フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //③フォームから送信されてきたimageを削除する
        unset($form['image']);
        //④データベースに保存する
        $news->fill($form)->save();
        
        return redirect('admin/news/create');
    }
    // 15で追記
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $post = News::where('title', $cond_title)->get();
        } else {
            $posts = News::all();
        }
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    // 16で追記
    // editアクションは編集画面を処理
    public function edit(Request $request)
    {
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.news.edit', ['news_form' => $news]);
    }
    // updateアクションは編集画面から送信されたフォームデータを処理
    public function update(Request $request)
    {
        $this->validate($request, News::$rules);
        $news = News::find($request->id);
        $news_form = $request->all();
        
        if ($request->remove == 'true') {
            $news_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image_path')->store('public/image');
            $news_form['image_path'] = basename($path);
        } else {
            $news_form['image_path'] = $news->image_path;
        }
           
        
        unset($news_form['image']);
        unset($news_form['remove']);
        unset($news_form['_token']);
        $news->fill($news_form)->save();
        return redirect('admin/news');
    }
    
    //16で追記
    public function delete(Request $request){
        $news = News::find($request->id);
        $news->delete();
        return redirect('admin/news/');
    }
}