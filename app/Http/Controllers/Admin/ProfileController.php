<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//課題14
use App\Profile;
use App\ProfileHistory;

use Carbon\Carbon;

class ProfileController extends Controller

{
    private $genders = [
        'female' => '女性',
        'male' => '男性',
        'other' => 'その他',
        'none' => '未回答',
        ];
        
    //課題14-5
    public function add()
    {
        $arr = [
            'genders' => $this->genders,
        ];
        return view('admin.profile.create', $arr);
    }

    public function create(Request $request)
    {
        //課題14
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        //課題16
        unset($form['_token']);
        $profile->fill($form)->save();
        return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
        $arr = [
            'genders' => $this->genders,
            ];//ここにいれる？
        
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile], $arr);//$arrの位置
        // return view('admin.profile.edit', $arr);
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save();
        
        $history = new ProfileHistory;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile/');
    }
    
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != ''){
            $post = Profile::where('name', $cond_name)->get();
        } else {
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }
    
    public function delete(Request $request)
    {
        $profile = Profile::find($request->id);
        $profile->delete();
        return redirect('admin/profile/');
    }
}
