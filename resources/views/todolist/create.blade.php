@extends('layout.app')
@section('title', 'Criar To Do')
@section('content')

    <div class="row p-2">
        <div class="col-md">
        </div>
        <div class="col-md-8">
            <form action="{{url('store')}}" method="POST" >
                @csrf
                <div class="form-row">

                    <div class="col-md-12">
                        <label for="">To Do</label><br>
                        <input type="text" name="todo" class="form-control" autocomplete="off"><br>
                    </div>

                    <div class="col-md-4">
                        <label for="">Responsavel</label><br>
                        <input type="text" name="responsavel" class="form-control" autocomplete="off"><br>
                    </div>

                    <div class="col-md-4">
                        <label for="">Criticidade</label><br>
                        <select class="form-control" name="criticidade" autocomplete="off">
                            <option value="Alta">Alta</option>
                            <option value="Média">Média</option>
                            <option value="Baixa">Baixa</option>
                        </select><br>  
                    </div>

                    <div class="col-md-4">
                        <label for="">Status</label><br>
                        <select readonly class="form-control" name="status" autocomplete="off">
                            <option value="PENDENTE">PENDENTE</option>
                        </select><br>   
                    </div>

                    <div class="col-md-4">
                        <input type="submit" value="Adicionar Todo" class="btn btn-success"><br>
                    </div>

                </div>
            </form>
        </div>
        <div class="col-md">
        </div>
    </div>
@endsection
