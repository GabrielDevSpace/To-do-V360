@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
   
    <h4 class="texto-dark pt-4" align="center">Listagem de To-Do's</h4>
    <div class="pr-4 p-2" align="right">
        <button id="btn-div" class="btn btn-primary texto-small"><i class="fa-solid fa-eye"></i> <span id="verEsconder">Novo To Do</span></button>
    </div>
    <div id="see-hidden">
        <div class="row m-3">
            <div class="col-md-8">
                <form action="{{url('store')}}" method="POST" >
                    @csrf
                    <div class="form-row">
    
                        <div class="col-md-12 pb-2">
                            <label for="">To Do</label>
                            <input type="text" name="todo" class="form-control" autocomplete="off">
                        </div>
    
                        <div class="col-md-4 pb-2">
                            <label for="">Responsavel</label>
                            <input type="text" name="responsavel" class="form-control" autocomplete="off">
                        </div>
    
                        <div class="col-md-4 pb-2">
                            <label for="">Criticidade</label>
                            <select class="form-control" name="criticidade" autocomplete="off">
                                <option value="Alta">Alta</option>
                                <option value="Média">Média</option>
                                <option value="Baixa">Baixa</option>
                            </select>
                        </div>
    
                        <div class="col-md-4 pb-2">
                            <label for="">Status</label>
                            <select readonly class="form-control" name="status" autocomplete="off">
                                <option value="PENDENTE">PENDENTE</option>
                            </select>  
                        </div>
    
                        <div class="col-md-12">
                            <input type="submit" value="Adicionar" class="btn btn-success">
                        </div>
    
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                DashBoard
            </div>
        </div>
    </div>

        <div class="line pt-3 pb-3"></div>

        <div class="p-3">
            <div class="row p-1">
                <!-- 
                <div class="col-md-12" align="right">
                    <div class="p-2">
                        <a href="{{url('create')}}" class="btn btn-success" title="Adicionar Novo To Do Lists">
                            <i class="fa fa-plus"></i><b> To Do</b>
                        </a>
                        <a href="{{url('calendario')}}" class="btn btn-primary" title="Adicionar Novo To Do Lists">
                            <i class="fa fa-calendar"></i><b> Calendario</b>
                        </a>
                    </div>
                </div> 
                -->
                
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