@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post">
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
                            <input type="text" name="name" class="form-control" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-2">{{ __('messages.gender')}}</label>
                        <div class="col-md-10 row">
                            @foreach ($genders as $key => $gender)
                            <div class='col-md-2'>
                                <!--trueをつくりたい-->
                                @if ($key == $profile_form->gender)
                                {{Form::radio('gender', $key, true, ['class'=>'form-control', 'id'=>'gender-' . $key])}}
                                <label for="gender-{{$key}}">{{$gender}}</label>
                                @else
                                {{Form::radio('gender', $key, false, ['class'=>'form-control', 'id'=>'gender-' . $key])}}
                                <label for="gender-{{$key}}">{{$gender}}</label>
                                @endif
                            </div> 
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hobby" class="col-md-2">{{ __('messages.hobby')}}</label>
                        <div class="col-md-10">
                            <input type="text" name="hobby" class="form-control" value="{{ $profile_form->hobby }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="introduction" class="col-md-2">{{ __('messages.introduction')}}</label>
                        <div class="col-md-10">
                            <textarea name="introduction" class="form-control" rows="10">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class='list-group'>
                            @if ($profile_form->histories != NULL)
                                @foreach ($profile_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection