@extends('layout.app')
@section('title', 'Criar To Do')
@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{url('store')}}" method="POST">
                @csrf
                <label for="">To Do</label><br>
                <input type="text" name="todo" class="form-control"><br>

                <label for="">Responsavel</label><br>
                <input type="text" name="responsavel" class="form-control"><br>

                <label for="">Criticidade</label><br>
                <select class="form-control" name="criticidade">
                    <option value="Alta">Alta</option>
                    <option value="Média">Média</option>
                    <option value="Baixa">Baixa</option>
                </select><br>   

                <input type="submit" value="Adicionar Todo" class="btn btn-success"><br>
            </form>
        </div>
    </div>
@endsection
