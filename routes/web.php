<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/probando', function () {
    return view('probando');
});

Route::resource('/dispositivos','DispositivosController');


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


/////////////////////////////////////////////////////////////////////////////////////////

Route::resource('/Actividad', 'Actividades');
Route::get('/Actividad', 'Actividades@index');
Route::get('/preparactualizarActividad/{id}','Actividades@preparactualizar');
Route::get('/ActividadMostrar','Actividades@listarActividad');

////////////////////////////////////////////////////////////////////////////////////////////

/*RUTA PARA HACER USO DE LOS CONTROLADORES DE TAREAS*/
Route::resource('/Tarea','Tareas');
Route::get('/Tarea','Tareas@index');
Route::get('/preparactualizartareas/{id}','Tareas@preparactualizar');
Route::GET('/TareasMostrar','Tareas@listarTarea');

//////////////////////////////////////////////////////////////////////////////////////////
//Ruta de tipo recomendaciones
//////////////////////////////////////////////////////////////////////////////////////////
Route::resource('/Recomendacion','Recomendaciones');
Route::get('/Recomendacion','Recomendaciones@index');
Route::get('/prepararactualizarrecomendaciones/{id}','Recomendaciones@preparactualizar');
Route::GET('/RecomendacionesMostrar','Recomendaciones@listarRecomendaciones');

/////////////////////////////////////////////////////////////////////////////////////////
//esta ruta esta fusionada con la ruta usuario
Route::resource('/RecomendacionUsuario', 'RecomendacionesUsuarios');
Route::get('/RecomendacionUsuario', 'RecomendacionesUsuarios@index');
Route::get('/RecomendacionesUsuariosMostrar/{id}','RecomendacionesUsuarios@listarRecomendacionesUsuarios');
Route::get('/CargarUsuarios', 'RecomendacionesUsuarios@cargarUsuarioRecomendacione');

///////////////////////////////////////////////////////////////////////////////////////////
//Ruta de tipo recomendaciones
Route::resource('/TipoInforme','TipoInformes');
Route::get('/TipoInforme', 'TipoInformes@index');
Route::get('/TipoInformeCargar','TipoInformes@cargarTInforme');
///////////////////////////////////////////////////////////////////////////////////////////
Route::resource('/TipoUsuario','TipoUsuarios');
Route::get('/TipoUsuario', 'TipoUsuarios@index');
Route::get('/TipoUsuarioCargar', 'TipoUsuarios@cargarTipoUsuario');
//////////////////////////////////////////;
//Ruta de Usuarios
Route::resource('/Usuario', 'Usuarios');
Route::get('/Usuario', 'Usuarios@index');
Route::get('/UsuarioMostrar','Usuarios@listausuario');
Route::get('/eliminarusuario/{id?}','Usuarios@eliminarusuario');
Route::get('/preparactualizarUsuario/{id}','Usuarios@preparactualizarusuario');
//Route::get('/UsuarioCargar','Usuarios@cargarUsuario');
Route::get('/general','Usuarios@vergeneral');


///////////////////////////////////////////////////////////////////////////////////////////
Route::resource('/recomendaciones', 'Recomendaciones');
Route::get('/recomendaciones', 'Recomendaciones@index');
Route::get('/cargarUsuario', 'Usuarios@cargarUsuario');
//Route::get('/RecomendacionesCargar','Recomendaciones@listarRecomendaciones');
Route::get('/buscarrecomendaciones/{descripcion?}','Recomendaciones@buscar_Recomendacion');

//Ruta de tipo recomendaciones
Route::resource('/Cargo','Cargos');
Route::get('/Cargo', 'Cargos@index');
Route::get('/CargosCargar','Cargos@cargarCargos');
////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
//esta ruta esta fusionada con la ruta usuario
Route::resource('/CargoUsuario', 'CargosUsuarios');
Route::get('/CargoUsuario', 'CargosUsuarios@index');
Route::get('/CargosUsuariosMostrar/{id}','CargosUsuarios@listarCargosUsuarios');
//Route::get('/prepararCargosUsuarios/{id}','CargosUsuarios@ActualizarCargosUsuarios');
/////////////////////////////////////////////////////////////////////////////////////////

//Ruta de departamento
Route::resource('/Departamento', 'Departamentos');
Route::get('/Departamento', 'Departamentos@index');
Route::get('/DepartamentoCargar', 'Departamentos@cargarDepartamento');


///////////////////////////////////////////////////////////////////////////////////////////

Route::resource('/CargoDepartamento', 'CargosDepartamentos');
Route::get('/CargoDepartamento', 'CargosDepartamentos@index');
Route::get('/CargosDepartamentosMostrar/{id}','CargosDepartamentos@listarCargosDepartamentos');
///////////////////////////////////////////////////////////////////////////////////////////

Route::resource('/subtema', 'Subtemas');
Route::get('/subtema', 'Subtemas@index');
Route::get('/SubtemaMostrar','Subtemas@listasubtema');
Route::get('/preparactualizarSubtema/{id}','Subtemas@preparactualizarsubtema');
Route::get('/buscarSubtema/{descripcion?}','Subtemas@buscar_Subtema');
Route::post('/Modificar_EstadoSubtema/{datos?}','Subtemas@modificarSubtemaEstado');



////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////////////////


//mis departamentos

Route::get('/MisDepartamentos/{id?}','Usuarios@MisDepartamentos');


///////////////////////////////////////////////////////////////////////////////////////////
//Ruta de tipo recomendaciones
Route::resource('/TipoRecomendacion','TipoRecomendaciones');
Route::get('/TipoRecomendacion', 'TipoRecomendaciones@index');
Route::get('/TipoRecomendacionCargar','TipoRecomendaciones@cargarTRecomendacion');

//Ruta de estado
Route::resource('/Estado', 'Estados');
Route::get('/Estado','Estados@index');
Route::get('/EstadoCargar','Estados@cargarEstado');

///////////////////////////////////////////////////////////////////////////////////////////
/*RUTA PARA HACER USO DE LOS CONTROLADORES DE Avance*/
Route::resource('/Avance', 'Avances');
Route::get('/Avance', 'Avances@index');
Route::get('/buscarAvance/{busqueda?}','Avances@buscar_Avances');
/*PARA PREPARAR ACTUALIZACIÓN DATOS DEL Avance*/
Route::get('/preparactualizar1/{id}','Avances@preparactualizar');
/*PARA EXTRAER TODOS LOS USUARIOS*/
Route::get('/AvanceMostrar','Avances@listadeAvances');

///////////////////////////////////////////////////////////////////////////////////////////

Route::resource('/Actividad', 'Actividades');
//Route::get('/Actividad', 'Actividades@index');
Route::get('/buscarActividad/{descripcion?}/{fecha?}', 'Actividades@buscar_Actividad');
Route::get('/buscarActividad2/{fecha?}', 'Actividades@buscar_Actividad2');
/*PARA PREPARAR ACTUALIZACIÓN DATOS DEL Avance*/
Route::get('/preparactualizarActividad/{id}','Actividades@preparactualizar');
/*PARA EXTRAER TODOS LOS USUARIOS*/
Route::get('/ActividadMostrar','Actividades@listarActividad');



///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
Route::resource('/Informe', 'Informes');
Route::get('/Informe', 'Informes@index');
Route::get('/InformeMostrar','Informes@listarInforme');
Route::get('/prepararInforme/{id}','Informes@actualizarInforme');
Route::get('/buscarInforme/{tema?}/{fecha?}','Informes@buscar_Informe');
Route::get('/buscarInformev2/{fecha?}', 'Informes@buscar_Informev2');
Route::post('/ModificarEstado/{datos?}', 'Informes@modificarInforme');

////////////////////////////////////////////////////////////////////////////////////////////

/*RUTA PARA HACER USO DE LOS CONTROLADORES DE TAREAS*/
Route::resource('/Tarea','Tareas');
Route::get('/Tarea','Tareas@index');
Route::get('/buscarTarea/{busqueda?}','Tareas@buscar_Tarea');
/*PARA PREPARAR ACTUALIZACIÓN DATOS DEL TAREAS*/
Route::get('/preparactualizartareas/{id}','Tareas@preparactualizar');
/*PARA EXTRAER TODOS LOS USUARIOS*/
Route::GET('/TareasMostrar','Tareas@listarTarea');




////////////////////////////////////////////////////////////////////////////////////////////
Route::resource('/RecomendacionesDepartamento', 'RecomendacionesDepartamentos');
Route::get('/RecomendacionesDepartamento', 'RecomendacionesDepartamentos@index');
/*PARA PREPARAR ACTUALIZACIÓN DATOS DEL RECOMENDACION DEPARTAMENTO*/
Route::get('/preparactualizarRecomendacioD/{id}','RecomendacionesDepartamentos@preparactualizarrecomendacioD');
/*PARA EXTRAER TODOS LOS USUARIOS*/
Route::get('/RecomendacioDMostrar/{id}','RecomendacionesDepartamentos@listarecomendacionD');
// Route::get('/MostraDRgeneral','RecomendacionesDepartamentos@listageneral');
// Route::get('/general','RecomendacionesDepartamentos@vergeneral');
////////////////////////////////////////////////////////////////////////////////////////////
Route::resource('/Departamentouser', 'Departamentousers');
Route::get('/Departamentouser', 'Departamentousers@index');
Route::get('/preparactualizar/{id}','Departamentousers@preparactualizarDepartamentoUsuario');
Route::get('/DepartamentouserMostrar/{id}','Departamentousers@listarDepartamentoUsuario');
 

//hola prueba

//Route::get('/Mostrausuariogeneral','Usuarios@consultageneral');


