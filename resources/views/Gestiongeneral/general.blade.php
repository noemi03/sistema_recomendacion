@extends('adminlte::layouts.app')
@section('main-content') 
 <h1>
       
        <small>@yield('contentheader_description')</small>
    </h1>
 <div class="container-fluid spark-screen">
    <div class="row">
                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

<<<<<<< HEAD
       
=======
          
          <input type="hidden" id="iduser" value="{{Auth::user()->id}}">
>>>>>>> 2ea8ed51b1fb1f31325a637bc0c939aa0bf62687
    <div class="container">

        <div class="row">
                    <div class="col-md-10">
                        <div class="panel " >
                        <legend class="text-center header">
                            <span class=" text-center"><i class="fa fa-cogs"></i></span>
                            <span>  GENERAL </span> 
                              
            <input type="hidden" id="iduser" value="{{Auth::user()->id}}"> 
                        </legend>
                            <div class="panel-body"> 

                                 @include('Gestiongeneral.Mostralgeneral')
                            </div>
                            
                        </div>
                    </div>
            </div>
        <div class="container">
            
            
    </div>
   
  </div>
</div>

<script src="{{ asset('js/gestionMostrar.js') }}" defer></script>

@endsection

           <script>
              $(function () {
                  $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' // optional
                  });
              });
          </script>
