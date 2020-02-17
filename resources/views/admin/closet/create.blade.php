{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title','服登録画面')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
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
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="item" value="{{ old('item') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">カテゴリ</label>
                        <div class="form-check form-check-inline">
                            <label>    
                                <input class="form-check-input" type="checkbox" name="category" value="アクセサリー">アクセサリー
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>    
                                <input class="form-check-input" type="checkbox" name="category" value="アウター">アウター
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>    
                                <input class="form-check-input" type="checkbox" name="category" value="トップス">トップス
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>    
                                <input class="form-check-input" type="checkbox" name="category" value="ボトムス">ボトムス
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>    
                                <input class="form-check-input" type="checkbox" name="category" value="ソックス">ソックス
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>    
                                <input class="form-check-input" type="checkbox" name="category" value="シューズ">シューズ
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">季節</label>
                        <div class="form-check form-check-inline">
                            <label>
                                <input class="form-check-input" type="checkbox" name="season" value="春">春
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>
                                <input class="form-check-input" type="checkbox" name="season" value="夏">夏
                            </label>
                        </div> 
                        <div class="form-check form-check-inline">
                            <label>
                                <input class="form-check-input" type="checkbox" name="season" value="秋">秋
                            </label>
                        </div> 
                        <div class="form-check form-check-inline">
                            <label>
                                <input class="form-check-input" type="checkbox" name="season" value="冬">冬
                            </label>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <br>
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
