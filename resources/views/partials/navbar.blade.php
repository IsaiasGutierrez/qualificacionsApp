<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Ubuntu:wght@300&display=swap');
        body{
          background-color: #ed9234;
          font-family: 'Montserrat', sans-serif;
          text-align: center;
            
        }
        .cajagroga{
            background-color: #f2c645;
            border-radius: 5px 5px 5px 5px;
            margin-bottom: 2%;
                }
        .logo{
            margin-top: 2%;
        }
        nav{
            background-color: #e96f23;
        }
        .butbarr{
            text-decoration: none;
            color: black;
        }
        .butbarr:hover{
            color: black;
            text-decoration: none;
        }
        
        .row {
            margin: 0px;
        }
        
        #navbarSupportedContent {
            margin-right: 40px;
        }

        .nav-link {
            color: black;
        }

        #dropdownMenuButton2{
            background-color: #e96f23;
        }

        #logout{
            border: 0px;
            background-color: #e96f2300;
        }

        .navbar-toggler {
            background-color: #ed9234;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            @if(auth()->user()->role_id == 0)
                <a class="navbar-brand" href="{{route('admin.admin.index')}}"><img src="https://ci5.googleusercontent.com/proxy/xBXkThYtS6Yqb-Wwif2uNl-wp4JEKUICm3S-K3AWtLJnYPuWOxj5WB-bSi5u3bIunjzI-TR5co3rmzX4AIKln8Bv-9veouf5O8CNyZdRb94A7bb99Yl0okc6lBLAKfIC=s0-d-e1-ft#https://www.inscamidemar.cat/wp-content/uploads/2022/02/logo_calafell_web.png" ></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="margin-right: 40px;" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('modul')}}">Mòdul</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('curs')}}">Curs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user')}}">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('alumne')}}">Alumne</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('uf')}}">Uf</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle border border-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-capitalize">{{auth()->user()->name}}</span> 
                                </button>
                                <ul class="dropdown-menu " style="background-color: #e96f23;margin-left: 20%;margin-right: 20%;" aria-labelledby="dropdownMenuButton2">
                                    <li class="text-center">
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"><button id="logout" type="submit">Taanca la sessió</button></a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            @endif

            @if(auth()->user()->role_id == 1)
                <a class="navbar-brand" href="{{route('user.user.index')}}"><img src="https://ci5.googleusercontent.com/proxy/xBXkThYtS6Yqb-Wwif2uNl-wp4JEKUICm3S-K3AWtLJnYPuWOxj5WB-bSi5u3bIunjzI-TR5co3rmzX4AIKln8Bv-9veouf5O8CNyZdRb94A7bb99Yl0okc6lBLAKfIC=s0-d-e1-ft#https://www.inscamidemar.cat/wp-content/uploads/2022/02/logo_calafell_web.png" ></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="margin-right: 40px;" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle border border-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-capitalize">{{auth()->user()->name}}</span> 
                                </button>
                                <ul class="dropdown-menu " style="background-color: #e96f23;" aria-labelledby="dropdownMenuButton2">
                                    <li class="">
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"><button id="logout" type="submit">Taanca la sessió</button></a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </nav>
    
    <div class="cajagroga" style="margin-left:20%; margin-right:20%;">

    </div>
</body>