{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title','my closet')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>あなたの持っている服</h2>
                <form action="{{ action('Admin\ClosetController@create') }}"method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach    
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">アイテム名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="item" value="{{ old('item') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">カテゴリ</label>
                        <div class="col-md-10">
                            <label class="radio-inline">
                                <input type="radio" class="form-control" name="category" value="{{ old('category') }}">アクセサリー
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="form-control" name="category" value="{{ old('category') }}">アウター
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="form-control" name="category" value="{{ old('category') }}">トップス
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="form-control" name="category" value="{{ old('category') }}">ボトムス
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="form-control" name="category" value="{{ old('category') }}">ソックス
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="form-control" name="category" value="{{ old('category') }}">シューズ
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">季節</label>
                        <div class="col-md-10">
                            <label class="radio-inline">
                                <input type="radio" class="form-control" name="season" value="{{ old('season') }}">春
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="form-control" name="season" value="{{ old('season') }}">夏
                            </label>
                            <label class="radio-inline">
                        　　　　<input type="radio" class="form-control" name="season" value="{{ old('season') }}">秋
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="form-control" name="season" value="{{ old('season') }}">冬
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="新規登録">
                </form>
            </div>
        </div>
    </div>
@endsection    
