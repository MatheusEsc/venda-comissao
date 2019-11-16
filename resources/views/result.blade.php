<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendix - Resultado da pesquisa</title>
    <link rel="icon" type="image/icon-x" href="{{URL::asset('img/logo.png')}}">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">

    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script type="text/javascript" src="{{URL::asset('js/money_format.js')}}" ></script>
</head>
<body>

    <!-- Menu -->

    <nav class="navbar navbar-expand-md bg-primary navbar-dark">
        <a class="navbar-brand" href="{{url('/sale')}}">Vendix</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/sale')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/about')}}">Sobre</a>
                </li>  
            </ul>
        </div>  
    </nav>

    <aside></aside>

    <main>
        <div class="container">
    
            <!-- Dados de vendas do email pesquisado -->

            <h3>Resultado da pesquisa - E-mail: {{ $email }}</h3>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Venda</th>
                    <th>Comissão</th>
                    <th>Data/Hora</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                    <tr>
                        <td>{{$sale->name}}</td>
                        <td>{{$sale->email}}</td>
                        <td>R$ {{number_format($sale->value, 2,',','.')}}</td>
                        <td>R$ {{number_format($sale->commission, 2,',','.')}}</td>
                        <td>{{date('d/m/Y H:i:s', strtotime($sale->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <h5>Total de comissão: R$ {{number_format($sumCommission, 2,',','.')}}</h5>
        </div>  
    </main> 

    <!-- Footer da página -->

    <footer>
        <p>Developed by <a href="#">Escudeiro</a></p>
    </footer>

</body>
</html>