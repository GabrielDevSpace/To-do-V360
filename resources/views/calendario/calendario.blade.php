@extends('layout.app')
@section('title', 'Itens')
@section('content')

      <div class="card">
        <div class="card-body">
    <div class="row" >
    <div class="col-md-6" align="center">
      <!-- TAREFAS DO DIA SELECIONADO-->
      <h4 class="texto-gold" align="center">TO DO</h4>
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
            @foreach ($item_calendar as $calendario)
                <tr class="table-slin">
                    <td>{{$loop->iteration}}</td>
                    <td>
                    <span <?php if ($calendario->status == "REALIZADO"){
                            $texto_taxado="style='text-decoration:line-through;color:#d4d4d4'";
                            echo $texto_taxado;
                        } else {
                            $texto_taxado="";
                        } ?>>
                        {{$calendario->item}}
                    </span>   
                    </td>
                    <td>
                        <span <?php 
                        if($calendario->status == "PENDENTE" AND $calendario->prioridade == 'Alta'){
                            echo "style='color:#f44336;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                        } else if ($calendario->status == "PENDENTE" AND $calendario->prioridade == 'Média'){
                            echo "style='color:#ffc000;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                        } else if ($calendario->status == "PENDENTE" AND $calendario->prioridade == 'Baixa'){
                            echo "style='color:#6aa84f;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                        } else {
                            echo "style='color:#e0e0e0;border-radius:10px; padding: 1px 5px 1px 5px;font-size:22px'";
                        }
                        ?>><i class="fa fa-exclamation-triangle"></i></span>    
                    </td>
                    <td><span  <?php echo $texto_taxado; ?>>
                        {{ date('d/m/Y', strtotime($calendario->prazo));}}
                        </span>
                    </td>
                    <td>
                        <span <?php 
                        if($calendario->status == 'PENDENTE'){
                            echo "style='background-color:#bcbcbc;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                        } else {
                            echo "style='background-color:#80b16b;color:#fff;border-radius:10px; padding: 1px 5px 1px 5px;font-size:13px'";
                        }
                        ?>>{{$calendario->status}}</span> 
                    </td>
                    <td>
                        <small>
                            <a href="{{url('edititens/'.$calendario->id.'/'.$calendario->todo_id.'/'.$calendario->todo)}}" class="btn btn-primary btn-small"><i class="fa-solid fa-square-pen"></i></a>
                            <a href="{{url('deleteitem/'.$calendario->id.'/'.$calendario->todo_id.'/'.$calendario->todo)}}" class="btn btn-danger btn-small" onclick="if (confirm('Você realmente deseja EXCLUIR este Item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"><i class="fa fa-trash"></i></a>
                        </small>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
      <!-- FIM DAS TAREFAS -->
    </div>
    <div class="col-md-6" align="center">
    
    
  <?php
   
 
    montar_calendario(01, 2022);
    // função que permite montar o calendário
    function montar_calendario($mes, $ano){
      // um vetor para guardar os meses
      $meses = array(1 => 'Janeiro', 2 => 'Fevereiro', 
        3 => 'Março', 4 => 'Abril', 5 => 'Maio', 
        6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 
        9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro',
        12 => 'Dezembro');
     
      // um vetor com os dias da semana
      $dias_semana = array('Domingo', 'Segunda', 'Terça', 'Quarta',
        'Quinta', 'Sexta', 'Sábado');
     
      // vamos obter o primeiro dia do calendário
      $primeiro_dia = mktime(0, 0, 0, $mes, 1, $ano);
      // obtém a quantidade de dias no mês  
      $dias_mes = date('t', $primeiro_dia);  
      // dia da semana que o calendário inicia (começa em 0)
      $dia_inicio = date('w', $primeiro_dia);
       
      // cria a tabela HTML para o calendário
  ?>
   
  <table width="100%" height="600px" cellspacing="0" cellpadding="4" border="1" bordercolor="#f2f2f2">
  <tr >
  <th  colspan="7" style='text-align:center'><?php echo $meses[$mes]." - ".$ano; ?>
  </th>
  </tr>
  
  <tr>
  <td align="center" width="14.285%" style="color:#fff; background-color:#ea9999">
  <?php
  echo implode('</td ><td align="center" width="14.285%" style="color:#fff; background-color:#2986cc" >', $dias_semana);?>
  </td>
  </tr>
  <?php
      // precisamos de células vazias até encontrarmos
      // o dia inicial da semana
      if($dia_inicio > 0){ 
        for($i = 0; $i < $dia_inicio; $i++){ 
          echo '<td class="dayoff">&nbsp;</td>'; 
        }
      }
     
      // agora já podemos começar a preencher o
      // calendário
      for($dia = 01; $dia <= $dias_mes; $dia++ ){
        if($dia_inicio == 0){
          // vamos colorir o domingo de vermelho
          $estilo = 'red';
        } 
        else{
          
          $estilo = '#6e6d6d';
        }     
   
        // vamos colocar a data de hoje sublinhada
        if(($dia == date("j")) && ($mes == date("n")) && 
         ($ano == date("Y"))){
          ?>
         <td <?php echo $estilo;?> align="left"> 
            <div align="center" class='col-md-12' style='margin:0px;padding:5px;width:30px;height:30px;border-radius:50%;background-color:#23998a' >
              <b style='color:#fff;'><?php echo $dia ?></b>
            </div>
            <div align='center' class='col-md-12'>
              <p></p>
             
  
  <?php 
  if ($dia=='1'){
    $dia="01";
  } else if ($dia=='2'){
    $dia="02";
  } else if ($dia=='3'){
    $dia="03";
  } else if ($dia=='4'){
    $dia="04";
  } else if ($dia=='5'){
    $dia="05";
  } else if ($dia=='6'){
    $dia="06";
  } else if ($dia=='7'){
    $dia="07";
  } else if ($dia=='8'){
    $dia="08";
  } else if ($dia=='9'){
    $dia="09";
  }

  if ($mes=='1'){
    $mes="01";
  } else if ($mes=='2'){
    $mes="02";
  } else if ($mes=='3'){
    $mes="03";
  } else if ($mes=='4'){
    $mes="04";
  } else if ($mes=='5'){
    $mes="05";
  } else if ($mes=='6'){
    $mes="06";
  } else if ($mes=='7'){
    $mes="07";
  } else if ($mes=='8'){
    $mes="08";
  } else if ($mes=='9'){
    $mes="09";
  }
  
  $data_soma=$ano.'-'.$mes.'-'.$dia;
 
  {{  $count = DB::table("todoitens")
      ->select("id")
      ->where("status", 'PENDENTE')
      ->where("prazo", $data_soma)
      ->count();
    }}
  ?>
  
  <div align='center'>
  @if(empty($count))
    <b style='color:#f0f0f0'><i>0</i> Tasks</b>
  @else
  <a href="{{url('/calendario/'.$data_soma)}}" class="btn btn-success btn-small" title="Adicionar Novo Item">{{$count}}</a>
  @endif
  </div>
  
          </div>
          </td>
          <?php
        }
        else {
          ?>
         <td align="left"> 
         <div align="center" class='col-md-12' style='margin:0px;padding:5px;width:30px;height:30px;border-radius:50%;background-color:#a8dfd8' >
              <b style='color:#fff;'><?php echo $dia ?></b>
            </div>
            <div align='center' class='col-md-12'>
              <p></p>
    <!-- LISTAGEM DE TAREFAS BD -->
    
  
  <?php 
  if ($dia=='1'){
    $dia="01";
  } else if ($dia=='2'){
    $dia="02";
  } else if ($dia=='3'){
    $dia="03";
  } else if ($dia=='4'){
    $dia="04";
  } else if ($dia=='5'){
    $dia="05";
  } else if ($dia=='6'){
    $dia="06";
  } else if ($dia=='7'){
    $dia="07";
  } else if  ($dia=='8'){
    $dia="08";
  } else if ($dia=='9'){
    $dia="09";
  }

  if ($mes=='1'){
    $mes="01";
  } else if ($mes=='2'){
    $mes="02";
  } else if ($mes=='3'){
    $mes="03";
  } else if ($mes=='4'){
    $mes="04";
  } else if ($mes=='5'){
    $mes="05";
  } else if ($mes=='6'){
    $mes="06";
  } else if ($mes=='7'){
    $mes="07";
  } else if ($mes=='8'){
    $mes="08";
  } else if ($mes=='9'){
    $mes="09";
  }
  
  $data_soma=$ano.'-'.$mes.'-'.$dia;
  
  {{  $count = DB::table("todoitens")
      ->select("id")
      ->where("status", 'PENDENTE')
      ->where("prazo", $data_soma)
      ->count();
    }}

  ?>
  
  <div align='center'>
    @if(empty($count))
      <b style='color:#f0f0f0'><i>0</i> Tasks</b>
    @else
    <a href="{{url('/calendario/'.$data_soma)}}" class="btn btn-success btn-small" title="Adicionar Novo Item">{{$count}}</a>
    @endif
    </div>
  
    <!-- LISTAGEM DE TAREFAS BD -->
            </div>
          </td>
          <?php
        }
        
        // vamos incrementar o dia de referência 
        $dia_inicio++;
        
        // já precisamos adicionar uma nova linha na tabela?
        if($dia_inicio == 7){
          $dia_inicio = 0;
          echo "</tr>";
   
          if($dia < $dias_mes){
            echo '<tr>';
          }
        }
      } // fim do laço for
      
      // agora preenchemos as células restantes
      if($dia_inicio > 0){
        for($i = $dia_inicio; $i < 7; $i++){
          echo '<td>&nbsp;</td>';
        }
      
        echo '</tr>';
      }
    
      echo '</table>';
    }
    
    // vamos montar o mês de março de 2021
   
  ?>
 
  </div>
</div>
</div>

@endsection
