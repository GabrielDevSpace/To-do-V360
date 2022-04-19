<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendario;
use App\Models\Itens;

class CalendarioController extends Controller
{
    public function calendario()
    {
        return view('calendario.calendario');
    }
    public function task($data_calendario)
    {
        
        $calendar = Itens::where('prazo', '=', $data_calendario)->where('status', '=' , 'PENDENTE')->orderBy('prazo', 'ASC')->get();
        
        return view('calendario.task_calendario', ['data_calendario'=> $data_calendario])->with('item_calendar', $calendar);
    }
}
