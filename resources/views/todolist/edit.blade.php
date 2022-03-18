@extends('layout.app')
@section('title', 'Editar To Do')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action=" {{url('update/'.$todolist->id)}} " method="post">
                @csrf
                <label for="">To Do</label><br>
                <input type="text" name="todo" class="form-control" value="{{$todolist->todo}}"><br>

                <label for="">Responsavel</label><br>
                <input type="text" name="responsavel" class="form-control" value="{{$todolist->responsavel}}"><br>

                <label for="">Criticidade</label><br>
                <select class="form-control" name="criticidade">
                    <option value="{{$todolist->criticidade}}">{{$todolist->criticidade}}</option>
                    <option value="Alta">Alta</option>
                    <option value="Média">Média</option>
                    <option value="Baixa">Baixa</option>
                </select><br>

                <input type="submit" value="Atualizar Todo" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection