<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::with('user')->latest()->get();
        return view('records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
    // バリデーション
    $request->validate([
        'opponent' => 'required|max:255',
        'record' => 'required|max:255',
        'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:204800', // 動画は任意で最大200MB
    ]);

    // 動画ファイルのアップロード処理
    $videoPath = null;
    if ($request->hasFile('video')) {
        $video = $request->file('video');

        // 動画の長さが1時間以内かを確認する（FFmpegなどの外部ライブラリが必要）
        $duration = shell_exec("ffmpeg -i " . $video->getPathname() . " 2>&1 | grep 'Duration' | awk '{print $2}' | tr -d ,");
        $durationInSeconds = strtotime($duration) - strtotime('TODAY');
        
        if ($durationInSeconds > 3600) {
            return back()->withErrors(['video' => '動画の長さは1時間以内にしてください。']);
        }

        // ファイル名を生成して保存
        $videoName = time() . '_' . $video->getClientOriginalName();
        $videoPath = $video->storeAs('uploads', $videoName, 'public');
    }

    // レコードを作成
    $record = $request->user()->records()->create([
        'opponent' => $request->input('opponent'),
        'record' => $request->input('record'),
        'video' => $videoPath, // 動画パスを保存
    ]);

    return redirect()->route('records.index')->with('success', '振り返りが保存されました！');
    }


    public function Commentstore(Request $request, Record $record)
    {
            
        $validated = $request->validate([
            'comment' => 'required|max:255',
        ]);

        // コメントを保存
        $record->users()->attach(auth()->id(), [
            'comment' => $validated['comment'],
        ]);

        
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        //Recordに関連するUserと、その中間テーブルのcommentの取得
        $usersWithComments = $record->users()->get();

        return view('records.show', compact('record', 'usersWithComments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $request->validate([
            'record' => 'required|max:255',
        ]);

        $record->update($request->only('record'));

        return redirect()->route('records.show', $record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('records.index');
        
    }

    public function search(Request $request)
    {
        $query = Record::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where('opponent', 'like', '%' . $keyword . '%');
        }

        $records = $query
            ->latest()
            ->paginate(10);

        
        return view('records.search', compact('records'));
    }

    
}
