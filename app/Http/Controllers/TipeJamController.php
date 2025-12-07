<?php

namespace App\Http\Controllers;

use App\Models\TipeJam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipeJamController extends Controller
{
    public function index()
    {
        $tipeJams = TipeJam::with('user')->get();
        return view('tipe-jams.index', compact('tipeJams'));
    }

    public function create()
    {
        return view('tipe-jams.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'note' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();
        TipeJam::create($validated);

        return redirect()->route('tipe-jam.index')->with('success', 'Tipe Jam berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(TipeJam $tipeJam)
    {
        return view('tipe-jams.form', compact('tipeJam'));
    }

    public function update(Request $request, TipeJam $tipeJam)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'note' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();

        $tipeJam->update($validated);
        return redirect()->route('tipe-jam.index')->with('success', 'Tipe Jam berhasil diupdate.');
    }

    public function destroy(TipeJam $tipeJam)
    {
        $tipeJam->delete();
        return redirect()->route('tipe-jam.index')->with('success', 'Tipe Jam berhasil dihapus.');
    }
}
