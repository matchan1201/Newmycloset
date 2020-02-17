@extends('layouts.admin')
@section('title','アイテム編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>アイテム編集</h2>
                <form action="{{ action('Admin\ClosetController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach    
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="item">アイテム名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="item" value="{{ $closet_form->item }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="category">カテゴリ</label>
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
                        <label class="col-md-2" for="category">季節</label>
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
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $closet_form->image_path }}
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
                            <input type="hidden" name="id" value="{{ $closet_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                {{-- 以下を追記 --}}
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($closet_form->histories != NULL)
                                @foreach ($closet_form->histories as $history)
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