@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
   
    <div class="card">
        <br>
        <h3 align="center">To Do List - V360</h3>
        <div class="card-body" align="right">
            <a href="{{url('create')}}" class="btn btn-success" title="Adicionar Novo To Do Lists">
                <b>+ Adicionar To Do</b>
            </a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>To Do</th>
                            <th>Responsavel</th>
                            <th>Criticidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($todolist as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->todo}}</td>
                            <td>{{$item->responsavel}}</td>
                            <td>
                                <spam <?php 
                                if($item->criticidade == 'Alta'){
                                    echo "style='color:#f44336;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                } else if ($item->criticidade == 'Média'){
                                    echo "style='color:#ffc000;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                } else {
                                    echo "style='color:#6aa84f;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                }
                                ?>><i class="fa fa-exclamation-triangle"></i></spam>  
                            </td>
                            <td>
                                <a href="{{url('itens/'.$item->id.'/'.$item->todo)}}" class="btn btn-success"><b>Adicionar Item</b></a>
                                <a href="{{url('edit/'.$item->id)}}" class="btn btn-primary"><b>Editar</b></a>
                                <a href="{{url('delete/'.$item->id)}}" class="btn btn-danger"><b>Excluir</b></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection