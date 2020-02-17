@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ asset('storage/image/'.$headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="item p-2"></div>
                                    <h1>{{ str_limit($headline->item, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="category mx-auto">{{ str_limit($headline->category, 650) }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->season, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>    
        @endif
        <hr color="#c0c0c0c">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="item">
                                    {{ str_limit($post->item, 150) }}
                                </div>
                                <div class="category mt-3">
                                    {{ str_limit($post->category, 1500) }}
                                </div>
                                <div class="season mt-3">
                                    {{ str_limit($post->season, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/'.$post->image_path) }}">
                                @endif    
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach    
            </div>
        </div>
    </div>
    </div>
@endsection    