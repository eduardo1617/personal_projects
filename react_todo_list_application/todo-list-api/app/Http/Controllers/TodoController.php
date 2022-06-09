<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function index()
    {
//        return TodoResource::collection(Todo::all());

        $todos = Todo::query()->with('user')->orderBy('created_at')->get();
        return new TodoCollection($todos);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => ['required'],
            'user_id' => ['required']
        ]);

        $todo = Todo::create($data)->fresh();
        $todo->load('user');
        return TodoResource::make($todo);

//        $data = $request->validate(
//            [
//                'description' => ['required'],
//            ]
//        );
//
//        return Todo::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
//        return new TodoResource(Todo::findOrFail($todo->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    public function update(Request $request, Todo $todo)
    {

        $data = $request->validate([
            'user_id' => ['sometimes', 'required'],
            'completed' => ['sometimes', 'required', 'bool'],
            'description' => ['sometimes', 'required'],
        ]);

        $todo->update($data);
        $todo->load('user');

        return TodoResource::make($todo);

//        $todo->update([
//            'completed' => $request['completed'],
//        ]);
//
//        return $todo;
    }

    public function destroy(Todo $todo)
    {

        $todo->delete();

        return response('', Response::HTTP_NO_CONTENT);

//        return $todo->delete();
    }
}
