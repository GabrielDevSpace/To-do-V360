@extends('layout.app')
@section('title', 'Editar Item')
@section('content')
    <div class="card">
        <br>
        <h3 align="center">{{$todo}}</h3>
        <div class="card-body">
            <form action=" {{url('updateitem/'.$item->id.'/'.$todo_id.'/'.$todo)}} " method="post">
                @csrf
                <label for="">Item</label><br>
                <input type="text" name="item" class="form-control" value="{{$item->item}}"><br>

                <label for="">Prioridade</label><br>
                <select class="form-control" name="prioridade">
                    <option value="{{$item->prioridade}}">{{$item->prioridade}}</option>
                    <option value="Alta">Alta</option>
                    <option value="Média">Média</option>
                    <option value="Baixa">Baixa</option>
                </select><br>

                <input type="submit" value="Atualizar Item" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection