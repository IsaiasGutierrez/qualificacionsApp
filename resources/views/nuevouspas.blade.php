@extends('layouts.masterlogin')

<body style="background-color: #ed9234;">

    <div class="row" id="primrow" style="margin-left: 0px;margin-right: 0px;">
        <div class="col-md-12 d-flex justify-content-center">
            <a href="{{route('login')}}" style="margin-top: 50px;"><img src="https://ci5.googleusercontent.com/proxy/xBXkThYtS6Yqb-Wwif2uNl-wp4JEKUICm3S-K3AWtLJnYPuWOxj5WB-bSi5u3bIunjzI-TR5co3rmzX4AIKln8Bv-9veouf5O8CNyZdRb94A7bb99Yl0okc6lBLAKfIC=s0-d-e1-ft#https://www.inscamidemar.cat/wp-content/uploads/2022/02/logo_calafell_web.png" ></a>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card" style="margin-top: 2%; margin-bottom:5%;border-color:#ed9234;">
            <div class="card-body shadow-lg" style="padding:30px;background-color: #ed9234;border: 1px solid #dd8227;">
                
                <form action="{{ route('Nuevapass',$usu->id) }}" method="GET">
                @csrf
                @method('GET')
                <p class="fw-lighter">Escriu una nova contrasenya</p>

                <div class="input-group mb-3">
                    <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">Nova contrasenya</span>
                    <input name="contra" id="contra" type="password" class="form-control border border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required autofocus>
                </div>        
                    
                <button type="submit" class="btn btn-secondary shadow-lg" >
                    <span>Envia</span>
                </button>
              
                    
        
                </form>
            </div>
            </div>
        </div>
    </div>
</body>