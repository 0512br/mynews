<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//課題14
use App\Profile;

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
        $profile = new Profiles;
        $form = $request->all();
        unset($form['_token']);
        $profiles->fill($form);
        $profiles->$save;
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
    
}
