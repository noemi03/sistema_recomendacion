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
</div>