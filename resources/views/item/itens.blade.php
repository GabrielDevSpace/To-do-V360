@extends('layout.app')
@section('title', 'Itens')
@section('content')

    <?php $todo_id = $id; ?> 
    <h4 class="texto-dark pt-4" align="center">{{$todo}}</h4>
    <div class="pr-4 p-2" align="right">
        <button id="btn-div" class="btn btn-primary texto-small"><i class="fa-solid fa-eye"></i> <span id="verEsconder">Novo Item</span></button>
    </div>
    <div id="see-hidden">
        <div class="row m-2">
            <div class="col-md-8">
                <form action="{{url('storeitem/'.$id.'/'.$todo)}}" method="POST">
                    @csrf
                    <div class="form-row">

                        <div class="col-md-12 pb-2">
                            <input hidden type="text" name="todo_id" class="form-control" value='{{$id}}' >
                            <label for="">Item</label>
                            <input type="text" name="item" class="form-control" autocomplete="off" required>
                        </div>

                        <div class="col-md-12 pb-2">
                            <label for="">Historico</label>
                            <textarea type="textarea" name="historico" class="form-control" autocomplete="off"></textarea>
                        </div>

                        <div class="col-md-4 pb-2">
                        <label for="">Criticidade</label>
                            <select class="form-control" name="prioridade" autocomplete="off">
                                <option value="Alta">Alta</option>
                                <option value="Média">Média</option>
                                <option value="Baixa">Baixa</option>
                            </select>
                        </div>

                        <div class="col-md-4 pb-2">
                        <label for="">Data Prazo:</label>
                            <input type="date" class="form-control" name="prazo" required>
                        </div>

                        <div class="col-md-4 pb-2">
                        <label for="">Status</label>
                            <select readonly class="form-control" name="status" autocomplete="off">
                            <option value="PENDENTE">PENDENTE</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" value="Adicionar Item" class="btn btn-success">
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="row">
                    Dashboard
                    <div class="col-md">
                       
                    </div>
                    <div class="col-md">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
    <div class="card">
        <div class="card-body" align="right">
        <!--
            <h4 class="text-primary texto-shadow" align="center">{{$todo}}</h4>
            <a href="{{url('additem/'.$id.'/'.$todo)}}" class="btn btn-success" title="Adicionar Novo Item">
                <i class="fa fa-plus"></i> <b>Item</b>
            </a>
            <a href="{{url('calendario')}}" class="btn btn-primary" title="Adicionar Novo To Do Lists">
                <i class="fa fa-calendar"></i><b> Calendario</b>
            </a>         
        -->
            <div class="row">
                <div class="col-md-6">
                    <h5 class="texto-gold" align="center">TO DO</h5>
                    <!-- BACKLOG -->
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 40%">Item</th>
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
                                    <span <?php if ($item->status == "REALIZADO"){
                                            $texto_taxado="style='text-decoration:line-through;color:#d4d4d4'";
                                            echo $texto_taxado;
                                        } else {
                                            $texto_taxado="";
                                        } ?>>
                                        {{$item->item}}
                                    </span>   
                                    </td>
                                    <td>
                                        <span <?php 
                                        if($item->status == "PENDENTE" AND $item->prioridade == 'Alta'){
                                            echo "style='color:#f44336;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else if ($item->status == "PENDENTE" AND $item->prioridade == 'Média'){
                                            echo "style='color:#ffc000;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else if ($item->status == "PENDENTE" AND $item->prioridade == 'Baixa'){
                                            echo "style='color:#6aa84f;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else {
                                            echo "style='color:#e0e0e0;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        }
                                        ?>><i class="fa fa-exclamation-triangle"></i></span>    
                                    </td>
                                    <td><span  <?php echo $texto_taxado; ?>>
                                        {{ date('d/m/Y', strtotime($item->prazo));}}
                                        </span>
                                    </td>
                                    <td>
                                        <span <?php 
                                        if($item->status == 'PENDENTE'){
                                            echo "style='background-color:#bcbcbc;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                        } else {
                                            echo "style='background-color:#80b16b;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                        }
                                        ?>>{{$item->status}}</span> 
                                    </td>
                                    <td>
                                        <small>
                                            <a href="{{url('edititens/'.$item->id.'/'.$todo_id.'/'.$todo)}}" class="btn btn-primary btn-small"><i class="fa-solid fa-square-pen"></i></a>
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
                    <h5 class="texto-gold" align="center">DONE</h5>
                    <!-- DONE -->
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 40%">Item</th>
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
                                    <span <?php if ($items_done->status == "REALIZADO"){
                                            $texto_taxado_items_done="style='text-decoration:line-through;color:#acacac'";
                                            echo $texto_taxado_items_done;
                                        } else {
                                            $texto_taxado_items_done="";
                                        } ?>>
                                        {{$items_done->item}}
                                    </span>   
                                    </td>
                                    <td>
                                        <span <?php 
                                        if($items_done->status == "PENDENTE" AND $items_done->prioridade == 'Alta'){
                                            echo "style='color:#f44336;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else if ($items_done->status == "PENDENTE" AND $items_done->prioridade == 'Média'){
                                            echo "style='color:#ffc000;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else if ($items_done->status == "PENDENTE" AND $items_done->prioridade == 'Baixa'){
                                            echo "style='color:#6aa84f;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        } else {
                                            echo "style='color:#e0e0e0;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                                        }
                                        ?>><i class="fa fa-exclamation-triangle"></i></span>    
                                    </td>
                                    <td><span  <?php echo $texto_taxado_items_done; ?>>
                                        {{ date('d/m/Y', strtotime($items_done->prazo));}}
                                        </span>
                                    </td>
                                    <td>
                                        <span <?php 
                                        if($items_done->status == 'PENDENTE'){
                                            echo "style='background-color:#bcbcbc;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                        } else {
                                            echo "style='background-color:#afd59f;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                        }
                                        ?>>{{$items_done->status}}</span> 
                                    </td>
                                    <td>
                                        <small>
                                            <a href="{{url('edititens/'.$items_done->id.'/'.$todo_id.'/'.$todo)}}" class="btn btn-primary btn-small"><i class="fa-solid fa-square-pen"></i></a>
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