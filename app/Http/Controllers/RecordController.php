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
        $request->validate([
            'opponent' => 'required|max:255',
            'record' => 'required|max:255',
        ]);

        $request->user()->records()->create($request->only('opponent', 'record'));

        return redirect()->route('records.index');
    }

    public function Commentstore(Request $request, Record $record)
    {
            // バリデーション
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
}
