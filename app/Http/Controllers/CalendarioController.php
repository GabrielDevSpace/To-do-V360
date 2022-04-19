<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendario;

class CalendarioController extends Controller
{
    public function calendario()
    {
        return view('calendario.calendario');
    }
}
