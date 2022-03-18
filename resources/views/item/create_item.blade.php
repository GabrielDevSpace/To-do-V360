@extends('layout.app')
@section('title', 'Criar Item')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 align="center">{{$todo}}</h3>
            <form action="{{url('storeitem/'.$id.'/'.$todo)}}" method="POST">
                @csrf
                <!-- <label for="">ToDo ID</label><br> -->
                <input hidden type="text" name="todo_id" class="form-control" value='{{$id}}'><br>
                <label for="">Item</label><br>
                <input type="text" name="item" class="form-control"><br>

                <label for="">Criticidade</label><br>
                <select class="form-control" name="prioridade">
                    <option value="Alta">Alta</option>
                    <option value="Média">Média</option>
                    <option value="Baixa">Baixa</option>
                </select><br>   

                <label for="">Status</label><br>
                <select readonly class="form-control" name="status">
                    <option value="PENDENTE">PENDENTE</option>
                </select><br>   

                <input type="submit" value="Adicionar Item" class="btn btn-success"><br>
            </form>
        </div>
    </div>
@endsection
