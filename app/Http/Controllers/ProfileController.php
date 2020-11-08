<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 下の文調べる
use Illuminate\Support\Facades\HTML;

use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');
        // if (count($posts) > 0) {
        //     $headline = $posts->shift();
        // } else {
        //     $headline = null;
        // }
        $genders = config('app.genders');
        return view('profile.index', ['posts' => $posts, 'genders' => $genders]);
    }
}
