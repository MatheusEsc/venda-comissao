<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendix - Cadastro de Vendas</title>
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

    <!-- CSS Style-->
    <style>
        .container p {
            font-size: 23px;
            text-align:justify;
        }

        .image {
            display: flex;
            justify-content: center; 
        }
    </style>
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

            <h2>Sobre o Vendix </h2>

            <p>Este é um sistema desenvolvido em PHP utilizando o Framework Laravel 6</p>

            <p>O objetivo do sistema é manter as vendas, constando os dados do vendedor (nome e e-mail) e as vendas realizadas.
            O sistema faz o cálculo de comissão encima de 8,5% do valor da venda automaticamente.</p>

            <p>Também é possível pesquisar as vendas realizadas por um vendedor, basta pesquisar pelo e-mail através campo da tela inicial (Home). 
            Ao pesquisar, o total da comissão desse vendedor pode ser visualizado.</p>

            <div class="image">
                <img src="{{URL::asset('img/people.png')}}">
            </div>
            
        </div>
    </main>

    <!-- Footer da página -->

    <footer>
        <p>Developed by <a href="#">Escudeiro</a></p>
    </footer>

</body>
</html>