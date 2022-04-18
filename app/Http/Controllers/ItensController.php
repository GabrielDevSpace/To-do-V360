<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itens;


class ItensController extends Controller
{
    public function itens($id, $todo)
    {
        $itens = Itens::where('todo_id', '=', $id)->orderBy('status', 'ASC')->orderBy('prazo', 'ASC')->get();
        return view('item.itens', ['id'=> $id, 'todo'=> $todo])->with('item', $itens);
    }

    public function add($id, $todo)
    {
        return view('item.create_item', ['id' => $id, 'todo' => $todo]);
    }

    public function store(Request $request, $id, $todo)
    {
        $input=$request->all();
        Itens::create($input);
        return redirect('/itens/'.$id.'/'.$todo);
    }

    public function edit($id, $todo_id, $todo)
    {

        $data=Itens::find($id);
        return view('item.edit_item',['todo_id' => $todo_id, 'todo' => $todo])->with('item', $data);
    }

    public function update(Request $request, $id, $todo_id, $todo)
    {
        $item=Itens::find($id);
        $input=$request->all();
        $item->update($input);
        return redirect('/itens/'.$todo_id.'/'.$todo);
    }

    public function destroy($id, $todo_id, $todo)
    {
        Itens::destroy($id);
        return redirect('/itens/'.$todo_id.'/'.$todo);
    }

   
}
