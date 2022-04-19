
<html>
    <head>
      <title>Calendario de Tarefas</title>
      <meta content="">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <style>
      body{
        font-family: 'Exo', sans-serif;
      }
      .header-col{
        background: #E3E9E5;
        color:#536170;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
      }
      .header-calendar{
        background: #EE192D;color:white;
      }
      .box-day{
        border:1px solid #E3E9E5;
        height:150px;
      }
      .dayoff{
          background-color: #ccd1ce;
      }
      </style>
  
    </head>
    <body>
    <div class="row" style='margin:0px'>
    <div class="col-md-5"   align="center" style='border:1px solid black'>
  
  TESTE
    </div>
    <div class="col-md-7" align="center" style='border:1px solid red'>
  <?php
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
      for($dia = 1; $dia <= $dias_mes; $dia++ ){
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
  } else if  ($dia=='8'){
    $dia="08";
  } else if ($dia=='9'){
    $dia="09";
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
  <?php
  if(empty($count)){
    echo "<b style='color:#f0f0f0'><i>0</i> Tasks</b>";
  } else {
  echo "<b style='padding:0px 5px 0px 5px;background-color:#0092ec; border-radius:15px;color:#fff'>"?>
  <a href="{{url('/calendario/'.$data_calendario)}}" class="btn btn-success btn-small" title="Adicionar Novo Item">
    {{$count}}
</a><?php"</b> Tasks";
  }
  ?>
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
  $data_soma=$ano.'-'.$mes.'-'.$dia;
  
  {{  $count = DB::table("todoitens")
      ->select("id")
      ->where("status", 'PENDENTE')
      ->where("prazo", $data_soma)
      ->count();
    }}

  ?>
  
  <div align='center'>
  <?php
  if(empty($count)){
    echo "<b style='color:#f0f0f0'><i>0</i> Tasks</b>";
  } else {
  echo "<b style='padding:0px 5px 0px 5px;background-color:#14a7f0; border-radius:15px;color:#fff'>".$count."</b> Tasks";
  }
  ?>
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
    montar_calendario(04, 2022);
  ?>
  
  </div>
  
  <footer  class="page-footer font-small blue pt-4" style='position:absolute;bottom:0;width:100%;height:60px;background:#e1e1e1;'>
    <!-- Copyright -->
    <div align="center">Developed by <a href="http://developerspace.com.br">Dev Space</a>
    </div>
  </footer>
  </body>
  </html>
  