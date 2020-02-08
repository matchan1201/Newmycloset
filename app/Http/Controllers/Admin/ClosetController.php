<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Closet;
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
        $closet->save();
        
        return redirect('admin/closet/create');
    }
    
    public function edit()
    {
        return view('admin.closet.edit');
    }
    
    public function update()
    {
        return redirect('admin/closet/edit');
    }
    
    //以下を追記
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('title', $cond_title)->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
