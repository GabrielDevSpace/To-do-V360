@extends('layout.app')
@section('title', 'Editar To Do')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action=" {{url('update/'.$todolist->id)}} " method="post">
                @csrf
                <label for="">To Do</label><br>
                <input type="text" name="todo" class="form-control" value="{{$todolist->todo}}" autocomplete="off"><br>

                <label for="">Responsavel</label><br>
                <input type="text" name="responsavel" class="form-control" value="{{$todolist->responsavel}}" autocomplete="off"><br>

                <label for="">Criticidade</label><br>
                <select class="form-control" name="criticidade" autocomplete="off">
                    <option value="{{$todolist->criticidade}}">{{$todolist->criticidade}}</option>
                    <option value="Alta">Alta</option>
                    <option value="Média">Média</option>
                    <option value="Baixa">Baixa</option>
                </select><br>

                <label for="">Status</label><br>
                <select class="form-control" name="status" autocomplete="off">
                    <option value="{{$todolist->status}}">{{$todolist->status}}</option>
                    <option value="PENDENTE">PENDENTE</option>
                    <option value="REALIZADO">REALIZADO</option>
                </select><br>
                <input type="submit" value="Atualizar Todo" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection