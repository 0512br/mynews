@extends('layouts.admin')
@section('title', 'ニュースの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース編集</h2>
                <form action="{{ action('Admin\NewsController@update') }}" method="post" enctype="multipart/form-data">
                   @if (count($errors) > 0)
                       <ul>
                          @foreach($errors->all() as $e)
                              <li>{{ $e }}</li>
                          @endforeach
                       </ul>
                   @endif
                    <div class="form-group row">
                        <label for="title" class="col-md-2">{ __('messages.title') }}</label>
                        <div class="col-md-10">
                            <input type="text" name="title" class="form-control" value="{{ $news_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="body" class="col-md-2">{{ __('messages.body') }}</label>
                        <div class="col-md-10">
                            <textarea name="body" class="form-control" rows="20">{{ $news_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-2">{{ __('messages.image') }}</label>
                        <div class="col-md-10">
                            <input type="file" name="image" class="form-control-file">
                            <div class="form-text text-info">
                                設定中: {{ $news_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $news_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection