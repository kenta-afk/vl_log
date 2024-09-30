<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        // PandaScore APIへのリクエスト
        $response = Http::get('https://api.pandascore.co/valorant/matches/upcoming', [
            'token' => '',  // ここに自分のAPIキーを設定
        ]);

        // APIから返された試合結果
        $matches = $response->json();

        // ビューに試合結果を渡す
        return view('dashboard', ['matches' => $matches]);
    }
}
