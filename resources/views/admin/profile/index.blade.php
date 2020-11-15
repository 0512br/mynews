@extends('layouts.profile')
@section('title', '登録済みプロフィールの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-secondary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ProfileController@index') }}" method="get">
                    <div class="form-group row">
                        <label for="name" class="col-md-2">{{ __('messages.name') }}</label>
                        <div class="col-md-8">
                            <input type="text" name="cond_name" class="form-control" value="{{ $cond_name }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" name="" class="btn btn-secondary" value="{{ __('messages.search') }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-profile col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead >
                            <tr>
                                <th width="5%">ID</th>
                                <th width="10%">{{ __('messages.name') }}</th>
                                <th width="5%">{{ __('messages.gender') }}</th>
                                <th width="20%">{{ __('messages.hobby') }}</th>
                                <th width="40%">{{ __('messages.introduction') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profile)
                            <tr>
                                <th>{{ $profile->id }}</th>
                                <td>{{ \Str::limit($profile->name, 100) }}</td>
                                <td>{{ \Str::limit($profile->gender, 5) }}</td>
                                <td>{{ \Str::limit($profile->hobby, 100) }}</td>
                                <td>{{ \Str::limit($profile->introduction, 250) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ action('Admin\ProfileController@delete', ['id' => $profile->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
