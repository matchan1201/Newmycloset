<?php

namespace mycloset\Http\Controllers\Admin;
use Illuminate\Http\Request;
use mycloset\Http\Controllers\Controller;
use mycloset\Closet;
use mycloset\History;
use Carbon\Carbon;

class ClosetController extends Controller
{
    //以下を追記
    public function add()
    {
        return view('admin.closet.create');
    }
    public function accessories (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.accessories', ['posts' => $posts, 'cond_title' => $cond_title]);
        //検索をしたらこの最初の画面に戻るってことか
    }
    
    public function outer (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.outer', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function tops (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.tops', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function bottoms (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.bottoms', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function socks (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.socks', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function shoes (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.shoes', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function spring (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.spring', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function summer (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.summer', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function autumn (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.autumn', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function winter (Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
        }
        return view('admin.closet.winter', ['posts' => $posts, 'cond_title' => $cond_title]);
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
            $posts = Closet::where('item','LIKE', "%{$cond_title}%")->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Closet::all();
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
