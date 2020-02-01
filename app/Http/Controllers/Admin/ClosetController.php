<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClosetController extends Controller
{
    //以下を追記
    public function add()
    {
        return view('admin.closet.create');
    }
    
    public function create()
    {
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
