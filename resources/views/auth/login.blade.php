@extends('layouts.masterlogin')

<body style="background-color: #ed9234;">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    
    <div class="row" id="primrow" style="margin-left: 0px;margin-right: 0px;">
        <div class="col-md-12 d-flex justify-content-center">
            <a style="margin-top: 50px;"><img src="https://ci5.googleusercontent.com/proxy/xBXkThYtS6Yqb-Wwif2uNl-wp4JEKUICm3S-K3AWtLJnYPuWOxj5WB-bSi5u3bIunjzI-TR5co3rmzX4AIKln8Bv-9veouf5O8CNyZdRb94A7bb99Yl0okc6lBLAKfIC=s0-d-e1-ft#https://www.inscamidemar.cat/wp-content/uploads/2022/02/logo_calafell_web.png" ></a>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card" style="margin-top: 2%; margin-bottom:5%;border-color:#ed9234;">
            <div class="card-body shadow-lg" style="padding:30px;background-color: #ed9234;border: 1px solid #dd8227;">
                
                <form action="{{route('login')}}" id="form" method="POST">
                @csrf
        
                <div class="input-group mb-3">
                    <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">E-mail</span>
                    <input name="email" id="email" type="email" class="form-control border border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required autofocus>
                </div>
        
                <div class="input-group mb-3">
                    <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">Contrasenya</span>
                    <input name="password" id="password" type="password" class="form-control border border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required autofocus>
                </div>
                {{-- <div   class="g-recaptcha" data-sitekey="6LdrVhEgAAAAAHA-QysBrLY0S0EGPMHg1QIwMtDe" ></div>
                <br/>             --}}

                <div class="row form-group text-center" style="display: flex">
                    <div class="col-md-6">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Has oblidat la contrasenya?') }}
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-secondary shadow-lg" >
                            <span>Inicia sessió</span>
                        </button>
                    </div>
                    {{-- <script type="text/javascript">
                        $("#form").validate({
                            submitHandler: function(form) {
                                if (grecaptcha.getResponse()) {
                                console.log('Captcha Confirmed!');
                                form.submit();
                                } 
                                else {
                                    alert('Valida el Captcha!');
                                }
                            }    
                        });          
                    </script> --}}
                    
        
                </div>
        
                </form>
            </div>
            </div>
        </div>
    </div>
</body>





