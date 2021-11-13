<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
         // 以下を追記
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $news = new Profile;
      $form = $request->all();
      
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      
      // データベースに保存する
      $news->fill($form);
      $news->save();
        
        
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        // News Modelからデータを取得する
      $news = Profile::find($request->id);
      if (empty($news)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['news_form' => $news]);
  
    }

    public function update()
    {
        return redirect('admin/profile/update');
    }
}