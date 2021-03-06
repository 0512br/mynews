<!--layouts/admin.blade.phpを読み込む-->
@extends('layouts.admin')

<!--{{--admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む--}}-->
@section('title', 'ニュースの新規作成')
    
<!--{{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}-->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成</h2>
                {{--<!--<form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">-->--}}
                {{ Form::open(['action' => 'Admin\NewsController@create', 'files' => true]) }}
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        {{ Form::label('title', __('messages.title'), ['class' => 'col-md-2']) }}
                        {{--<!--<label class="col-md-2">{{ __('messages.title') }}</label>-->--}}
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{  old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">{{ __('messages.body') }}</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image", class="col-md-2">{{ __('messages.image') }}</label>
                        <div class="col-md-10">
                            {{ Form::file('image', ['class' => 'form-control custom-file-input', 'id' => 'fileImage']) }}
                            {{ Form::label('fileImage', '写真を選択', ['class' => 'custom-file-label']) }}
                            <!--<input type="file" class="form-control-file" name="image">-->
                        </div>
                    </div>
                    {{  csrf_field() }}
                    <input type="submit" class="button-primary" value="更新">
                <!--</form>-->
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
