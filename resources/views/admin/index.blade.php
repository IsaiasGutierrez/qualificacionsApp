@extends('layouts.master')

@section('content')


  <head>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Ubuntu:wght@300&display=swap');
      body{
        background-color: #ed9234;
        font-family: 'Montserrat', sans-serif;

      }
      button{
        background-color: #ed9234;
        border-color: #ed9234;
        padding-top:20px;
        padding-left:40px;
        padding-right:40px;   
        padding-bottom: 20px;  
        border-radius: 9px 9px 9px 9px;
        color: black;

      }
      
      button:active{
        background-color: #ed9234;
        border-color: #ed9234;
        padding-top:20px;
        padding-left:40px;
        padding-right:40px;   
        padding-bottom: 20px;  
        border-radius: 9px 9px 9px 9px;
        color: black;
      }
      h1{
        margin-bottom: 2%;
      }

      .css-button-sharp--yellow {
        min-width: 130px;
        height: 40px;
        color: rgb(0, 0, 0);
        padding: 5px 10px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        outline: none;
        border: 2px solid #ed9234;
        background: #ed9234;
      }

      .css-button-sharp--yellow:hover {
        background: #eb9c4e;
        color: #000000
      }
      
    </style>
  </head>

    <h1>SuperUsuari</h1>
    <div class="row cajagroga" style="margin-left:20%; margin-right:20%;">
      <div class="col-12 col-sm-12 col-md-6 col-lg-4" style="padding:10px;">
        <a href="{{route('modul')}}">
          <button class="css-button-sharp--yellow">Mòdul</button>
        </a>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-4 " style="padding:10px;">
        <a href="{{route('curs')}}">
          <button class="css-button-sharp--yellow">Curs</button>
        </a>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-4 " style="padding:10px;">
        <a href="{{route('user')}}">
          <button class="css-button-sharp--yellow">User</button>
        </a>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-4 " style="padding:10px;">
        <a href="{{route('alumne')}}">
          <button class="css-button-sharp--yellow">Alumne</button>
        </a>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-4 " style="padding:10px;">
        <a href="{{route('uf')}}">
          <button class="css-button-sharp--yellow">Uf</button>
        </a>
      </div>
    </div>
    
  </body>
</html>
@stop
