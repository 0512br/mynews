<?php
//Controllerの雛形
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    public function add()
    {
        return view('admin.news.create');
    }
    // 13で追記
    public function create(Request $request)
    {
        return redirect('admin/news/create');
    }
}
