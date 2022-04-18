@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
   
 
        <br>
        <h4 class="texto-dark" align="center">To Do List</h4>
        <div class="p-3">
            <div class="row p-1">
                <div class="col-md-12" align="right">
                    <div class="p-2">
                        <a href="{{url('create')}}" class="btn btn-success" title="Adicionar Novo To Do Lists">
                            <i class="fa fa-plus"></i><b> To Do</b>
                        </a>
                    </div>
                </div> 
                
                @foreach ($todolist as $item)

                <div class="col-md-3 p-2 ">
                    <div class="px-2 card-shadow">
                        <div class="pendentes">
                            <i class="fa fa-calendar-times-o text-danger"></i>
                            <b style="color:rgb(150, 150, 150)">
                                {{
                                $count = DB::table("todoitens")
                                    ->select("id")
                                    ->where("status", 'PENDENTE')
                                    ->where("todo_id", $item->id)
                                    ->count();
                                }}
                            </b> 
                            <!-- &nbsp
                            <i class="fa fa-calendar-check-o text-success"></i>
                            <b style="color:rgb(150, 150, 150)">
                                {{
                                    $count = DB::table("todoitens")
                                    ->select("id")
                                    ->where("status", 'REALIZADO')
                                    ->where("todo_id", $item->id)
                                    ->count();
                                }}
                            </b> -->
                        </div>
                            
                        <div class="row px-2">                  
                            <div class="col-sm-12 texto-small card-todo-header">
                                <span
                                <?php if ($item->status == "REALIZADO"){
                                    echo "style='text-decoration:line-through;color:#d0d0d0'";
                                } ?>>
                                {{$item->todo}}
                                </span>
                            </div>
                    
                
                            <div class="col-sm-12 texto-micro">
                                <span>
                                    <b>Respo:</b> {{$item->responsavel}}
                                </span>
                            </div>
                            <div class="line"></div>
                            <div class="col-sm-12 pb-2" align="right">
                                <a href="{{url('itens/'.$item->id.'/'.$item->todo)}}" class="btn btn-success btn-icons"><i class="fa fa-eye" title="Ver Itens"></i></a>
                                <a href="{{url('edit/'.$item->id)}}" class="btn btn-primary btn-icons"><i class="fa fa-pencil-square" title="Editar To Do"></i></a>
                                <a href="{{url('delete/'.$item->id)}}" class="btn btn-danger btn-icons" onclick="if (confirm('Você realmente deseja EXCLUIR essa lista e seus itens?')){return true;}else{event.stopPropagation(); event.preventDefault();};" title="Excluir To Do"><i class="fa fa-trash"></i></a>
                            </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>


@endsection