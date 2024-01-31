<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("todo", [
            'todos' => Todo::all()
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->validate([
            'todo' => ['required', 'min:3']
        ]);

        Todo::create($formData);

        return redirect("/");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todo_item', [
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $todo = Todo::find($request->id);

        $formData = $request->validate([
            'todo' => ['required', 'min:3']
        ]);

        $todo->update($formData);

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_all()
    {
        Todo::truncate();

        return redirect("/");
    }
}
