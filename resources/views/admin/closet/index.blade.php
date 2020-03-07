@extends('layouts.admin')
@section('title', 'Tansu一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>タンスの中の服</h2>
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
                            <input type="text" class="form-control" name="cond_title" value="">
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
      @foreach($posts as $closet)
       <div class="card col-xs-12 col-sm-6 col-md-6 col-lg-4">
         <div class="mx-auto"> <!--mx-autoを入れたら小さい画面でも2カラムになったけどなんでかわからない。 -->
            <h5 class="card-item text-center">{{ $closet->item }}</h5>
          @if ($closet->image_path)
            <img src="{{ asset('storage/image/' . $closet->image_path) }}" class="img-fluid" alt="max-width:100%">
          @endif
            <div class="card-body text-center">
                <p class="card-category">{{ $closet->category }}</p>
                <p class="card-season">{{ $closet->season }}</p>
                <div class="text-right">
                    <a href="{{ action('Admin\ClosetController@edit',['id' => $closet->id]) }}">編集</a>
                </div>
                 <div class="text-right">
                    <a href="{{ action('Admin\ClosetController@delete',['id' => $closet->id]) }}">削除</a>
                </div>
            </div>
                            <!-- このforeach文によって今まで保存したデータを表示している
                            このデータを上のカードの部分に入れ込むにはどうすればよいのだろうか
                            ひとつづつにforeach文を入れ込むことがいいのか
                            けどforeach文は繰り返しのことだから意味がない希ガス -->
         </div>
       </div>
      @endforeach
      </div>
    </div>
@endsection
