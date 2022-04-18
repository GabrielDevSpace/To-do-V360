<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use Illuminate\Support\Facades\DB;
use App\Models\Itens;

class TodolistController extends Controller
{
    public function index()
    {
        $todolists = Todolist::where('status', '=', 'PENDENTE')->orderBy('id', 'DESC')->get();
        return view('todolist.index')->with('todolist', $todolists);
    }

    public function create()
    {
        return view('todolist.create');
    }

    public function store(Request $request)
    {
        $input=$request->all();
        Todolist::create($input);
        return redirect('/');
    }

    public function edit($id)
    {

        $data=Todolist::find($id);
        return view('todolist.edit')->with('todolist', $data);
    }

    public function update(Request $request, $id)
    {
        $todolist=Todolist::find($id);
        $input=$request->all();
        $todolist->update($input);
        return redirect('/');
    }

    public function destroy($id)
    {
        Todolist::destroy($id);
        return redirect('/');
    }

    

}
