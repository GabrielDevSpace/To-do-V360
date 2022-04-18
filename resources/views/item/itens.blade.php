@extends('layout.app')
@section('title', 'Itens')
@section('content')

    <?php $todo_id = $id; ?> 

    <div class="card">
        <div class="card-body" align="right">
            <h4 class="texto-dark texto-shadow" align="center">{{$todo}}</h4>
            <a href="{{url('additem/'.$id.'/'.$todo)}}" class="btn btn-success btn-small" title="Adicionar Novo Item">
                <i class="fa fa-plus"></i> <b>Item</b>
            </a>         
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="texto-gold" align="center">BACKLOG</h4>
                    <!-- BACKLOG -->
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 45%">Item</th>
                                    <th>Prioridade</th>
                                    <th>Prazo</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($item as $item)
                                <tr class="table-slin">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                    <spam <?php if ($item->status == "REALIZADO"){
                                            $texto_taxado="style='text-decoration:line-through;color:#d4d4d4'";
                                            echo $texto_taxado;
                                        } else {
                                            $texto_taxado="";
                                        } ?>>
                                        {{$item->item}}
                                    </spam>   
                                    </td>
                                    <td>
                                        <spam <?php 
                                        if($item->status == "PENDENTE" AND $item->prioridade == 'Alta'){
                                            echo "style='color:#f44336;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else if ($item->status == "PENDENTE" AND $item->prioridade == 'Média'){
                                            echo "style='color:#ffc000;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else if ($item->status == "PENDENTE" AND $item->prioridade == 'Baixa'){
                                            echo "style='color:#6aa84f;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else {
                                            echo "style='color:#e0e0e0;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        }
                                        ?>><i class="fa fa-exclamation-triangle"></i></spam>    
                                    </td>
                                    <td><spam  <?php echo $texto_taxado; ?>>
                                        {{ date('d/m/Y', strtotime($item->prazo));}}
                                        </spam>
                                    </td>
                                    <td>
                                        <spam <?php 
                                        if($item->status == 'PENDENTE'){
                                            echo "style='background-color:#bcbcbc;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                        } else {
                                            echo "style='background-color:#80b16b;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                        }
                                        ?>>{{$item->status}}</spam> 
                                    </td>
                                    <td>
                                        <small>
                                            <a href="{{url('edititens/'.$item->id.'/'.$todo_id.'/'.$todo)}}" class="btn btn-primary btn-small"><i class="fa fa-edit"></i></a>
                                            <a href="{{url('deleteitem/'.$item->id.'/'.$todo_id.'/'.$todo)}}" class="btn btn-danger btn-small" onclick="if (confirm('Você realmente deseja EXCLUIR este Item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"><i class="fa fa-trash"></i></a>
                                        </small>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Fim BACKLOG -->
                </div>
    
                <div class="col-md-6">
                    <h4 class="texto-gold" align="center">DONE</h4>
                    <!-- DONE -->
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 45%">Item</th>
                                    <th>Prioridade</th>
                                    <th>Prazo</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($item_done as $items_done)
                                <tr class="table-slin">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                    <spam <?php if ($items_done->status == "REALIZADO"){
                                            $texto_taxado_items_done="style='text-decoration:line-through;color:#d4d4d4'";
                                            echo $texto_taxado_items_done;
                                        } else {
                                            $texto_taxado_items_done="";
                                        } ?>>
                                        {{$items_done->item}}
                                    </spam>   
                                    </td>
                                    <td>
                                        <spam <?php 
                                        if($items_done->status == "PENDENTE" AND $items_done->prioridade == 'Alta'){
                                            echo "style='color:#f44336;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else if ($items_done->status == "PENDENTE" AND $items_done->prioridade == 'Média'){
                                            echo "style='color:#ffc000;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else if ($items_done->status == "PENDENTE" AND $items_done->prioridade == 'Baixa'){
                                            echo "style='color:#6aa84f;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else {
                                            echo "style='color:#e0e0e0;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        }
                                        ?>><i class="fa fa-exclamation-triangle"></i></spam>    
                                    </td>
                                    <td><spam  <?php echo $texto_taxado_items_done; ?>>
                                        {{ date('d/m/Y', strtotime($items_done->prazo));}}
                                        </spam>
                                    </td>
                                    <td>
                                        <spam <?php 
                                        if($items_done->status == 'PENDENTE'){
                                            echo "style='background-color:#bcbcbc;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                        } else {
                                            echo "style='background-color:#80b16b;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                        }
                                        ?>>{{$items_done->status}}</spam> 
                                    </td>
                                    <td>
                                        <small>
                                            <a href="{{url('edititens/'.$items_done->id.'/'.$todo_id.'/'.$todo)}}" class="btn btn-primary btn-small"><i class="fa fa-edit"></i></a>
                                            <a href="{{url('deleteitem/'.$items_done->id.'/'.$todo_id.'/'.$todo)}}" class="btn btn-danger btn-small" onclick="if (confirm('Você realmente deseja EXCLUIR este Item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"><i class="fa fa-trash"></i></a>
                                        </small>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Fim DONE -->
                </div>
            </div>

        </div>
    </div>

@endsection