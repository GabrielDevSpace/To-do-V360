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
                            <th>Status</th>
                            <!--<th><i class="fa fa-calendar-check-o" style="color:green"></i></th> -->
                            <th><i class="fa fa-calendar-times-o" style="color:rgb(46, 46, 46)"></i></th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($todolist as $item)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <spam <?php if ($item->status == "REALIZADO"){
                                    echo "style='text-decoration:line-through;color:gray'";
                                } ?>>
                                {{$item->todo}}
                                </spam> 
                            </td>
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
                                <spam <?php 
                                if($item->status == 'PENDENTE'){
                                    echo "style='background-color:#bcbcbc;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                } else {
                                    echo "style='background-color:#80b16b;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                                }
                                ?>>{{$item->status}}</spam> 
                            </td>
                            <!-- <td>
                                {{
                                $count = DB::table("todoitens")
                                ->select("id")
                                ->where("status", 'REALIZADO')
                                ->where("todo_id", $item->id)
                                ->count();
                                }}
                            </td> -->
                            <td>
                                <b style="color:rgb(150, 150, 150)">
                                {{
                                $count = DB::table("todoitens")
                                ->select("id")
                                ->where("status", 'PENDENTE')
                                ->where("todo_id", $item->id)
                                ->count();
                                }}
                                </b>
                            </td>
                            <td>
                                <a href="{{url('itens/'.$item->id.'/'.$item->todo)}}" class="btn btn-success"><b>Adicionar Item</b></a>
                                <a href="{{url('edit/'.$item->id)}}" class="btn btn-primary"><b>Editar</b></a>
                                <a href="{{url('delete/'.$item->id)}}" class="btn btn-danger" onclick="if (confirm('Você realmente deseja EXCLUIR essa lista e seus itens?')){return true;}else{event.stopPropagation(); event.preventDefault();};"><b>Excluir</b></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection