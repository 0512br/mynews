@extends('layouts.profile')
@section('title', 'プロフィール画面')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post">
                    <!--課題14-->
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-md-2">{{ __('messages.name')}}</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-2">{{ __('messages.gender') }}</label>
                        <div class="col-md-10 row">
                            @foreach ($genders as $key => $gender)
                            <div class='col-md-2'>
                                {{Form::radio('gender', $key, false, ['class'=>'form-control', 'id'=>'gender-' . $key])}}
                                <label for="gender-{{$key}}">{{$gender}}</label>
                            </div> 
                            @endforeach
                        </div>
                    </div>
                    <!--生年月日の入力フォームをプルダウンで作成する(20-12-05)-->
                    <div class="form-group row">
                        <label for="birthday" class="col-md-2">{{ __('messages.birthday') }}</label>
                        <div class="col-md-10 row">
                            <div class="col-md-4">
                                {{Form::selectRange('year', 1920, 2020, 1996, ['class'=>'year'])}}
                                <label>{{ __('messages.year') }}</label>
                            </div>
                            <div class="col-md-4">
                                {{Form::selectMonth('month', 1, ['class'=>'month'])}}
                                <label>{{ __('messages.month') }}</label>
                            </div>
                            <div class="col-md-4">
                                {{Form::selectRange('day' , 1, 31, 1, ['class'=>'day'])}}
                                <label>{{ __('messages.day') }}</label>
                            </div>
                        </div>
                    </div>
                    <!--ここまで生年月日-->
                    <div class="form-group row">
                        <label for="hobby" class="col-md-2">{{ __('messages.hobby') }}</label>
                        <div class="col-md-10">
                            <input type="text" name="hobby" class="form-control" value="" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="introduction" class="col-md-2">{{ __('messages.introduction')}}</label>
                        <div class="col-md-10">
                            <textarea type="text" name="introduction" class="form-control" value="" rows="10"></textarea>
                        </div>
                    </div>
                    <input type="submit" class="button-secondary" value="更新">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection