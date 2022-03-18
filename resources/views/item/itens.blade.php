@extends('layout.app')
@section('title', 'Itens')
@section('content')


    <?php $todo_id = $id; ?> 

    <div class="card">
        <div class="card-body" align="right">
            <h3 align="center" >{{$todo}}</h3>
            <a href="{{url('additem/'.$id.'/'.$todo)}}" class="btn btn-success" title="Adicionar Novo Item">
                <b>+ Adicionar Item</b>
            </a>         
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Prioridade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($item as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->item}}</td>
                            <td>
                                <spam <?php 
                                if($item->prioridade == 'Alta'){
                                    echo "style='color:#f44336;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                } else if ($item->prioridade == 'Média'){
                                    echo "style='color:#ffc000;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                } else {
                                    echo "style='color:#6aa84f;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                }
                                ?>><i class="fa fa-exclamation-triangle"></i></spam>    
                            </td>
                            <td>
                                <a href="{{url('edititens/'.$item->id.'/'.$todo_id.'/'.$todo)}}" class="btn btn-primary"><b>Editar</b></a>
                                <a href="{{url('deleteitem/'.$item->id.'/'.$todo_id.'/'.$todo)}}" class="btn btn-danger"><b>Excluir</b></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection