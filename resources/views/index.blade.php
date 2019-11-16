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
</head>
<body>

    <!-- Menu -->

    <nav class="navbar navbar-expand-md bg-primary navbar-dark">
        <a class="navbar-brand" href="{{url('/sale')}}">Vendix</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav navbar-nav">
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
            <h2>
                Vendas
                <button type="button" 
                        class="btn btn-primary" 
                        data-toggle="modal" 
                        data-target="#register">
                    Cadastrar
                </button>
            </h2>

            <!-- Alerta caso seja cadastrado -->

            @if (session('message'))
            <div id="success" 
                 class="alert alert-success alert-dismissible">
                 <button type="button" 
                         class="close" 
                         data-dismiss="alert">
                    &times;
                </button>
                {{ session('message') }}
            </div>
            @endif

            <!-- Alerta se campos não estão preenchidos -->

            @if (session('warning'))
            <div id="warning" 
                 class="alert alert-warning alert-dismissible">
                <button type="button" 
                        class="close" 
                        data-dismiss="alert">
                    &times;
                </button>
                <strong>{{ session('warning') }}</strong>
            </div>
            @endif

            <!-- Pesquisa de vendedor por e-mail -->

            <form action="{{ url('search') }}"
                  method="post">

                {{ csrf_field() }}

                <input class="form-control" 
                       id="search"
                       name="email" 
                       type="text" 
                       placeholder="Digite um email para a busca"> 

                <button type="submit" 
                        class="btn btn-primary" 
                        style="margin-top: -5px"> 
                    <i class="fas fa-search"></i> 
                </button>
            </form>

            <!-- Lista de vendas já cadastradas -->

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Venda</th>
                    <th>Comissão</th>
                    <th>Data/Hora</th>
                </tr>
                </thead>
                <tbody id="data">
                @foreach($sales as $sale)
                    <tr>
                        <td>{{$sale->id}}</td>
                        <td>{{$sale->name}}</td>
                        <td>{{$sale->email}}</td>
                        <td>R$ {{number_format($sale->value, 2,',','.')}}</td>
                        <td>R$ {{number_format($sale->commission, 2,',','.')}}</td>
                        <td>{{date('d/m/Y H:i:s', strtotime($sale->created_at))}}</td>
                    </tr>
                @endforeach
                </tbody>
                {{$sales->links()}}
            </table>
        </div>  
    </main> 

    <!-- Modal de cadastro de Venda -->

    <div class="modal fade" id="register">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
            <h4 class="modal-title">Cadastro de Venda</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">

                <!-- Formulário do cadastro de venda -->

                <form action="{{ route('sale.store') }}" 
                      method="post">
                    
                    {{ csrf_field() }}
                
                    <div class="field">
                        <label>Nome do vendedor</label>
                        <input class="form-control" 
                                type="text" 
                                name="name">
                    </div>

                    <div class="field">
                        <label>E-mail</label>
                        <input class="form-control" 
                                type="text" 
                                name="email">
                    </div>

                    <div class="field">
                        <label>Valor</label>
                        <input class="form-control" 
                                type="text" 
                                name="value" 
                                onKeyPress="return(moeda(this,'.',',',event))">
                    </div>

                    <button type="submit" 
                            class="btn btn-primary">
                            Cadastrar Venda
                    </button>
                </form>

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            
        </div>
        </div>
    </div>

    <!-- Modal do resultado da pesquisa -->

    <div class="modal fade" id="result">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body">
                
                </div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Footer da página -->

    <footer>
        <p>Developed by <a href="#">Escudeiro</a></p>
    </footer>

</body>
</html>