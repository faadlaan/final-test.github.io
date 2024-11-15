<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $level = Level::where("name", "like", "%" . $keyword . "%")
            ->paginate(3);

        return view("pages.level-user", compact("level"));
    }

    public function create()
    {
        Level::all();
        return view("action.level.level-add");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "unique:levels|required",
        ]);

        Level::create($request->all());
        return redirect()->route('level');
    }

    public function edit($id)
    {
        $level = Level::findOrFail($id);
        return view('action.level.level-edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "unique:levels|required",
        ]);

        Level::findOrFail($id)->update($request->all());
        return redirect()->route('level');
    }

    public function delete($id)
    {
        $level = Level::findOrFail($id);
        return view('action.level.level-delete', compact('level'));
    }

    public function destroy(Request $request, $id)
    {
        Level::findOrFail($id)->delete();
    }
}
