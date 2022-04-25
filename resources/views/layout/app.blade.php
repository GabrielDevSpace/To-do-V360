<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap css --}}
    <link rel="icon" href="https://www.developerspace.com.br/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/style.css")}}">
    
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="navbar-brand" href="/">To Do List</a>
              </li>
              <li class="nav-item pr-2 pb-1">
                <a href="{{url('/')}}" class="btn btn-primary" title="Adicionar Novo Item">
                    <span><i class="fa fa-home" aria-hidden="true"></i> Pagina Inicial</span>
                </a>
              </li>
              <li class="nav-item pr-2 pb-1">
                <a href="{{url('calendario')}}" class="btn btn-primary" title="Adicionar Novo To Do Lists">
                    <i class="fa fa-calendar" aria-hidden="true"></i> Calendario
                </a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <a href="{{ url('/logout') }}" class="btn btn-primary"> <i class="fa fa-door-open"></i> Logout</a>
            </form>
          </div>
      </nav>

    @yield('content')
    <br>
    <div align="center">
       
    </div>
   

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/6adde2d540.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    var btn = document.getElementById('btn-div');
    var container = document.getElementById('see-hidden');
    btn.addEventListener('click', function() {
        
    if(container.style.display === 'block') {
        container.style.display = 'none';
    } else {
        container.style.display = 'block';
    }
    });
</script>
</html>