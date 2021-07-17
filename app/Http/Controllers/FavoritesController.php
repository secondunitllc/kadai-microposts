<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // 追加

class FavoritesController extends Controller
{
     public function store($id)
    {
        if (\Auth::check()) {
        // 認証済みユーザ（閲覧者）が、 お気に入りする
        \Auth::user()->favorite($id);
        }
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy($id)
    {
        if (\Auth::check()) {
        // 認証済みユーザ（閲覧者）が、 お気に入りを外す
        \Auth::user()->unfavorite($id);
        }
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    /**
     * このユーザに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount(['microposts', 'favorites']);
    }
}
