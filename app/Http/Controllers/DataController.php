<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Level;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $data = Data::with('levels')
            ->where("name", "like", "%" . $keyword . "%")
            ->orWhere("email", "like", "%" . $keyword . "%")
            ->orWhere("phone", "like", "%" . $keyword . "%")
            ->orWhereHas("levels", function ($query) use ($keyword) {
                $query->where("name", "like", "%" . $keyword . "%");
            })
            ->paginate(3);
        return view("pages.user", compact("data"));
    }

    public function create()
    {
        $level = Level::select('id', 'name')->get();
        return view('action.user.user-add', compact('level'));
    }

    public function store(Request $request)
    {
        

        $validated = $request->validate([
            "name" => "required",
            "email" => "required|unique:data,email," . $id,
            "phone" => "required|unique:data,phone," . $id,
            "levels_id" => "required",
        ]);

        $data = Data::create($request->all());
        return redirect()->route('user');
    }

    public function edit($id)
    {
        $data = Data::with('levels')->findOrFail($id);
        $level = Level::where('id', '!=', $data->levels->id)->get(['name', 'id']);
        return view('action.user.user-edit', compact('data', 'level'));
    }

    public function update(Request $request, $id)
    {


        $validated = $request->validate([
            "name" => "required",
            "email" => "unique:data|required",
            "phone" => "unique:data|required",
            "levels_id" => "required",
        ]);

        $data = Data::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('user');
    }

    public function delete($id)
    {
        $data = Data::findOrFail($id);
        return view('action.user.user-delete', compact('data'));
    }

    public function destroy(Request $request, $id)
    {
        $data = Data::findOrFail($id);
        $data->delete();
        return redirect()->route('user');
    }
}
