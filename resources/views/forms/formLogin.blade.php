<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIATED</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,body{
            height: 100%;
        }

        body{
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5
        }

        .form-signin{
            width: 100%;
            min-height: 100%;
            max-width: 400px;
            padding: 15px;
            margin: auto;
            
        }

        .form-signin .checked {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 5px;
        }        

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"]{
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"]{
            margin-bottom: 10px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }   

        img {
            max-width: 100%;        
            margin-bottom: 30px;
        }     

    </style>
</head>
<body>
    <div class="container">    
        <form class="form-signin" action="{{ route('head.login.do') }}" method="post">
            @csrf
            <img src="" alt="">

            @if($errors->all())
                @foreach ($errors->all() as $item)
                <div class="alert alert-danger" role="alert">
                    {{ $item }}
                  </div>                
                @endforeach
            @endif

            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Seu email" 
            {{-- value="{{ old('email') }}"  --}}
            value="helioas@hotmail.com" required>

            <label for="password" class="sr-only">Senha</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" 
            value="12345678" required>        

            <button class="btn btn-lg btn-dark btn-block" type="submit">Login</button>
        </form>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    --}}
</body>
</html>
