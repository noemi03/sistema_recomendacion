
@extends('adminlte::layouts.app')
@section('main-content')  <h1>
       
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
                    <div class="col-md-11 ">
                        <div class="panel " >
                        <legend class="text-center header">
                            <span class=" text-center"><i class="fa fa-list-alt"></i></span>
                            <span> Informe</span> 
                        </legend>
                            <div class="panel-body"> 

                                   @if(isset($edit))  
                                    @include('GestionInforme.InformeModificar')
                                @else
                                    @include('GestionInforme.InformeCrear')
                                @endif
                                
                            </div>
                            
                        </div>
                    </div>
            </div>




        <div class="row">
                    <div class="col-md-12">
                        <div class="panel " >
                        <legend class="text-center header">
                            <span class=" text-center"><i class="fa fa-list-alt"></i></span>
                            <span>  Tabla Informe </span> 
                        </legend>
                            <div class="panel-body"> 
                               @if(isset($edit))
                                @else
                                @include('GestionInforme.InformeMostrar')
                                @endif
                            </div>
                         
                        </div>
                    </div>
            </div>
        <div class="container">
            
            
    </div>
   
  </div>
   @include('GestionInforme.modalInforme')
   @include('GestionInforme.ModalSubtema')
   @include('GestionSubtema.modalSubtema')

   
   

  
  </div>
@endsection



  

