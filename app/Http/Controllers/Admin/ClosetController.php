<?php

namespace mycloset\Http\Controllers\Admin;
use Illuminate\Http\Request;
use mycloset\Http\Controllers\Controller;
use mycloset\Closet;
use mycloset\History;
use mycloset\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;//これによって認証済みユーザーへ簡単にアクセスできる。

class ClosetController extends Controller
{
    //以下を追記
    public function add()
    {
        return view('admin.closet.create');
    }
    public function create(Request $request)
    {

        //以下を追記
        //Varidationを行う
        $this->validate($request, Closet::$rules);

        $closet = new Closet;
        $form = $request->all();

        // フォームから画像が送られてきたら、保存して$closet->image_pathに画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $closet->image_path = basename($path);
        } else {
            $closet->image_path = null;
        }

        //フォームから送られてきた_tokenを削除する
        unset($form['_token']);
        //フォームから送信されてきたimageを削除する
        unset($form['image']);

        //データベースに保存する
        $closet->fill($form);
        //ユーザーと紐づける。その保存したデータにユーザーIDを取得する
        $closet->user_id = Auth::id();//$closetからuser_idを取り出してAuth::idに代入する
        $closet->save();

        return redirect('admin/closet/create');
    }

    // 2/9日から追記
    public function edit(Request $request)
    {
        // Closet Modelからデータを取得する
        $closet = Closet::find($request->id);
        if (empty($closet)) {
            abort(404);
        }
        return view('admin.closet.edit', ['closet_form' => $closet]);
    }

    public function update(Request $request)
    {
        // Validateをかける
        $this->validate($request, Closet::$rules);
        // Closet Modelからデータを取得する
        $closet = Closet::find($request->id);
        //送信されてきたフォームデータを格納する
        $closet_form = $request->all();
        if ($request->remove == 'true') {
            $closet_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $closet_form['image_path'] = basename($path);
        } else {
            $closet_form['image_path'] = $closet->image_path;
        }

        unset($closet_form['_token']);
        unset($closet_form['image']);
        unset($closet_form['remove']);
        $closet->fill($closet_form)->save();

        $history = new History;
        $history->closet_id = $closet->id;
        $history->edited_at = Carbon::now('Asia/Tokyo');
        $history->save();

        return redirect('admin/closet');
    }

    //以下を追記
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $user = Auth::user();//userの情報を$userに代入する
            $posts = Closet::where('user_id',$user->id)//Closetモデルから登録された服を取り出してuser_idと紐付ける
               ->where(function ($query) use ($cond_title ) {//query関数を使うことで選択した範囲の情報を出力する。
                                                             //useを使い変数$cond_titleを扱えるようにする
                   $query
                       ->where('item','LIKE', "%{$cond_title}%");//itemを検索する
               })
               ->get();
        } else {
            //ユーザー情報を取得した。ここから紐づけたユーザーの登録した服を表示するには
            $posts = Auth::user()//=は代入演算子で$postsにユーザが登録した服情報を代入した。
                ->closets;//ここが複数形なのはClosetモデルを取得するため
                //->を使って$postsからClosetモデルを取り出している
        }
        return view('admin.closet.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    // 以下を追記
    public function delete(Request $request)
    {
        // 該当するCloset Modelを取得
        $closet = Closet::find($request->id);
        //　削除する
        $closet->delete();
        return redirect('admin/closet/');
    }

}
