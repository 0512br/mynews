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
        //Validationを行う
        $this->validate($request, News::$rules);
        $news = new News;
        $form = $request->all();
        //画像が送信されたら保存して$news->image_pathに画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //フォームから送信されてきたimageを削除する
        unset($form['iimage']);
        //データベースに保存する
        $news->fill($form);
        $news->save();
        
        return redirect('admin/news/create');
    }
}
