<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendario;
use App\Models\Itens;
use Illuminate\Support\Facades\DB;

class CalendarioController extends Controller
{
    
    public function calendario()
    {   
        $data_calendario = date('Y-m-d');
        return redirect('/calendario/'.$data_calendario);
    }
    public function task($data_calendario)
    {
      
       // $calendar = Itens::where('prazo', '=', $data_calendario)->where('status', '=' , 'PENDENTE')->orderBy('prazo', 'ASC')->get();
                
        $calendar = DB::table('todoitens')
        ->join('todolist', 'todo_id', '=', 'todolist.id')
        ->select('todoitens.*', 'todolist.todo')
        ->where('prazo', '=' ,$data_calendario)
        ->get();
        
        return view('calendario.calendario', ['data_calendario'=> $data_calendario])->with('item_calendar', $calendar);
        
    }
}
