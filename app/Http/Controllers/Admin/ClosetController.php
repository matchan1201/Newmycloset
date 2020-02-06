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
}
