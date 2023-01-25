<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoardGameRequest;
use App\Models\BoardGame;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BoardGamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('boardgames.index', ['boardgames' => BoardGame::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boardgames.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoardGameRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('cover')) {
            $validated['cover_path'] = $request->file('cover')->store('covers');
        }

        $boardGame = BoardGame::create($validated);

        $request->session()->flash('status', 'Добавлена новая игра: ' . $boardGame->name);

        return redirect()->route('boardgames.show', ['boardgame' => $boardGame->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boardgame = BoardGame::findOrFail($id);
        return view('boardgames.show', ['boardgame' => $boardgame]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('boardgames.edit', ['boardgame' => BoardGame::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBoardGameRequest $request, $id)
    {
        $boardgame = BoardGame::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('cover')) {
            if ($boardgame->cover_path) {
                Storage::delete($boardgame->cover_path);
            }

            $validated['cover_path'] = $request->file('cover')->store('covers');
        }

        $boardgame->fill($validated);
        $boardgame->save();

        $request->session()->flash('status', 'Игра ' . $boardgame->name . ' была обновлена');

        return redirect()->route('boardgames.show', ['boardgame' => $boardgame->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boardgame = BoardGame::findOrFail($id);

        if ($boardgame->cover_path) {
            Storage::delete($boardgame->cover_path);
        }

        $boardgame->delete();

        return redirect()->route('boardgames.index');
    }
}
