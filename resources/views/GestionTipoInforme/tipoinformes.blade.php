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

          
    <div class="container">
            <div class="row">
                    <div class="col-md-11">
                        <div class="panel " >
                        <legend class="text-center header">
                            <span class=" text-center"><i class="fa fa-file-o"></i></span>
                            <span> TIPO INFORME</span> 
                        </legend>
                            <div class="panel-body"> 

                                 
                                @if(isset($edit))  
                                    @include('GestionTipoInforme.TipoInformesModificar')
                                @else
                                    @include('GestionTipoInforme.TipoInformesCrear')
                                @endif
                                
                             
                            </div>
                            
                        </div>
                    </div>
            </div>




        <div class="row">
                    <div class="col-md-11">
                        <div class="panel " >
                        <legend class="text-center header">
                            <span class=" text-center"><i class="fa fa-file-o "></i></span>
                            <span> TABLA TIPO INFORME </span> 
                        </legend>
                            <div class="panel-body">
                             @if(isset($edit))
                               @else 
                               @include('GestionTipoInforme.TipoInformesMostrar')
                               @endif
                            </div>
                            
                        </div>
                    </div>
            </div>
        <div class="container">
            
            
    </div>
   
  </div>
</div>
@endsection






