<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<style type="text/css">
  
  /* Customize the label (the container) */
.lcontainer {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.lcontainer input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom checkbox */
.lcheckmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.lcontainer:hover input ~ .lcheckmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.lcontainer input:checked ~ .lcheckmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.lcheckmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.lcontainer input:checked ~ .lcheckmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.lcontainer .lcheckmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<body class="skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</body>
</html>
<script src="{{ asset('js/gestioDepartamento.js') }}"></script>  
<script src="{{ asset('js/gestioEstado.js') }}"></script> 
<script src="{{ asset('js/gestionTRecomendacion.js') }}"></script> 
<script src="{{ asset('js/gestionTipoUsuarios.js') }}"></script>
<script src="{{ asset('js/gestionUsuario.js') }}"></script>
<script src="{{ asset('js/gestionAvance.js') }}"></script>
<script src="{{ asset('js/gestionTareas.js') }}"></script>
<script src="{{ asset('js/gestionActividad.js') }}"></script>
<script src="{{ asset('js/gestionRecomendacion.js') }}"></script>
<script src="{{ asset('js/gestionSubtema.js') }}"></script>
<script src="{{ asset('js/gestionInforme.js') }}"></script>
<script src="{{ asset('js/gestionRecomendacionDepartamento.js') }}"></script>
