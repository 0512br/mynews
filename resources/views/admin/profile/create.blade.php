@extends('layouts.profile')

@section('title', 'プロフィール画面')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-md-2">{{ __('messages.Name')}}</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-2">{{ __('messages.gender') }}</label>
                        <div cass="col-md-10">
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="gender" value="male" checked>
                                <label class="form-check-label">{{ __('messages.male') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="female" >
                                <label class="form-check-label">{{ __('messages.female') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="others" >
                                <label class="form-check-label">{{ __('messages.others') }}</label>
                            </div>
                        </div>
                    </div>
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
                </form>
            </div>
        </div>
    </div>
@endsection