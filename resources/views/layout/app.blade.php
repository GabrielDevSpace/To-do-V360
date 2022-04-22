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
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="navbar-brand" href="/">To Do List</a>
              </li>
              <li class="nav-item pr-2">
                <a href="{{url('/')}}" class="btn btn-primary" title="Adicionar Novo Item">
                    <span><i class="fa fa-home" aria-hidden="true"></i></span>
                </a>
              </li>
              <li class="nav-item dropdown pr-2">
                <a href="{{url('calendario')}}" class="btn btn-primary" title="Adicionar Novo To Do Lists">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <a href="{{ url('/logout') }}" class="btn btn-primary"> <i class="fa fa-door-open"></i></a>
            </form>
          </div>
      </nav>

    @yield('content')
    <br>
    <div align="center">
       
    </div>
   

</body>
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