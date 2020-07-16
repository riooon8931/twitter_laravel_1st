<?php

use App\tweet;
use Illuminate\Http\Request;

/**
* 本のダッシュボード表示(books.blade.php)
*/
Route::get('/', function () {
    $tweets = Tweet::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->get();
    // $tweety = Auth::user()->tweets;
    return view('tweets', [
        'tweets' => $tweets
    ]);
});

/**
* 新「本」を追加 
*/
Route::post('/tweets', function (Request $request) {
    //
        //バリデーション
    $validator = Validator::make($request->all(), [
        'tweet' => 'required|max:255',
    ]);

    //バリデーション:エラー 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    //以下に登録処理を記述（Eloquentモデル）
    // Eloquent モデル
    $tweets = new Tweet;
    $tweets->tweet = $request->tweet;
    $tweets->user_id = $request->user_id;
    $tweets->save(); 
    return redirect('/');
});

/**
* 本を削除 
*/
Route::delete('/tweet/{tweet}', function (tweet $tweet) {
    //
    $tweet->delete();       //追加
    return redirect('/');  //追加
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', function () {
    return redirect('/');
});


Route::post('/update', function(Request $request){
    $validator = Validator::make($request->all(), [
        'id' => 'required',
        'name' => 'required',
        ]);
    //バリデーション:エラー
    if ($validator->fails()) { return redirect('/')
    ->withInput() ->withErrors($validator);
    }
    $users = App\User::find($request->id);
    $users->name = $request->name;
    return redirect('/');
});