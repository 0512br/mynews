@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#92464d">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-10">
                                <div class="date">
                                    {{ $post->updated_at->format('Y-m-d') }}
                                </div>
                                <div class="name">
                                    {{ str_limit($post->name, 150) }}
                                </div>
                                <div class="gender">
                                    {{ $genders[$post->gender] }}
                                </div>
                                <div class="hobby">
                                    {{ str_limit($post->hobby, 150) }}
                                </div>
                                <div class="introduce mt-3">
                                    {{ str_limit($post->introduce, 150) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#92464d">
                @endforeach
            </div>
        </div>
    </div>
@endsection