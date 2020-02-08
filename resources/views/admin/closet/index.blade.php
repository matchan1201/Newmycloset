@extends('layouts.admin')
@section('title', 'My Closetの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>所持している服一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ClosetController@add') }}" role="button" class="btn btn-primary">新規登録</a>
            </div>
            <div class="col-md-8">
                <form acrtion="{{ action('Admin\ClosetController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">アイテム名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="[[ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">アイテム名</th>
                                <th width="35%">カテゴリ</th>
                                <th width="35%">季節</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $closet)
                                <tr>
                                    <th>{{ $closet->id }}</th>
                                    <td>{{ \Str::limit($closet->item, 100) }}</tb>
                                    <td>{{ \Str::limit($closet->category,100) }}</td>
                                    <td>{{ \Str::limit($closet->season,50) }}</td>
                                </tr>
                            @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach    