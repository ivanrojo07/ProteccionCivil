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
// Terminar sesión
Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::middleware(['guest'])->group(function () {

//Api Login
Route::post('/apiLogin', 'Auth\LoginController@handleProviderCallback')->name('login_submit');
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('/',function(){return view('auth.login');});


});

Route::group(['middleware'=>['auth']],function(){
	// Creando nueva landing page con datos para las barras de progreso
	Route::get('/','SistemaController@inicio')->name('inicio');
	Route::get('/planfamiliar','SistemaController@planfamiliar')->name('planfamiliar');
	Route::get('/planactua','SistemaController@planactua')->name('planactua');

	// CONTROLADOR PARA BOTIQUIN
	Route::name('botiquin.')->prefix('botiquin')->namespace('Botiquin')->group(function () {
	    Route::post('store','BotiquinController@store')->name('store');
	    Route::get('pdf_snappy','BotiquinController@showSnappyPDF')->name('showSnappyPDF');
	    Route::get('pdf_snappy_empty','BotiquinController@showSnappyEmptyPDF')->name('showSnappyEmptyPDF');
	});
	// CONTROLADOR PARA MALETA
	Route::name('maleta.')->prefix('maleta')->namespace('Maleta')->group(function () {
	    Route::post('store','MaletaController@store')->name('store');
	    Route::get('pdf_snappy','MaletaController@showSnappyPDF')->name('showSnappyPDF');
	    Route::get('pdf_snappy_empty','MaletaController@showSnappyEmptyPDF')->name('showSnappyEmptyPDF');
	});

	//Dashboard
	Route::get('/dashboard','Dashboard\DashboardController@dashboard')->name('dashboard');

	//Submit formato inicial
	Route::get('/datos_generales','DatoGeneral\DatoGeneralController@registroform')->name('dato_general.form');
	Route::post('/registro','DatoGeneral\DatoGeneralController@registroInicial')->name('submit_registro');
	Route::post('/datos_generales','DatoGeneral\DatoGeneralController@create')->name('dato_general.create');
	Route::get('/datos_generales/editar','DatoGeneral\DatoGeneralController@edit')->name('dato_general.edit');
	Route::put('/datos_generales','DatoGeneral\DatoGeneralController@update')->name('dato_general.update');

	//FAMILIAS
	Route::resource('familias','Familia\FamiliaController')->except(['show','index']);
    Route::get('familias/pdf_snappy','Familia\FamiliaController@showSnappyPDF')->name('familias.showSnappyPDF');
    Route::get('familias/pdf_download','Familia\FamiliaController@downloadSnappyPDF')->name('familias.downloadSnappyPDF');

    //MASCOTAS
    Route::resource('mascotas','Mascota\MascotaController')->except(['show']);
    Route::get('mascotas/pdf_snappy','Mascota\MascotaController@showSnappyPDF')->name('mascotas.showSnappyPDF');
    Route::get('mascotas/pdf_download','Mascota\MascotaController@downloadSnappyPDF')->name('mascotas.downloadSnappyPDF');

    // PLANOS INTERNO Y EXTERNO
    Route::prefix('planos')->name('planos.')->group(function(){
    	Route::post('interno','Plano\PlanoController@storeInterno')->name('submit_plano_interno');
    	Route::post('externo','Plano\PlanoController@storeExterno')->name('submit_plano_externo');
    	// PDF PLANOS CON SNAPPY
    	Route::get('pdf_snappy_plano_interno_vacio','Plano\PlanoController@showSnappyInternoEmptyPDF')->name('showSnappyInternoEmptyPDF');
    	Route::get('pdf_snappy_plano_interno','Plano\PlanoController@showSnappyInternoPDF')->name('showSnappyInternoPDF');
    	Route::get('pdf_snappy_plano_externo_vacio','Plano\PlanoController@showSnappyExternoEmptyPDF')->name('showSnappyExternoEmptyPDF');
    	Route::get('pdf_snappy_plano_externo','Plano\PlanoController@showSnappyExternoPDF')->name('showSnappyExternoPDF');
    });

    // Conexión con los grupos de la api claroauth360
    Route::prefix('grupos')->name('grupos.')->group(function(){
    	Route::get('/','API\GrupoController@index')->name('index');
    	Route::get('no_user/create','API\GrupoController@create')->name('no_users.create');
    	Route::post('no_user/create','API\GrupoController@store')->name('no_users.store');
    	Route::get('no_user/{token_id}/edit','API\GrupoController@edit')->name('no_users.edit');
    	Route::put('no_user/{id}','API\GrupoController@update')->name('no_users.update');
    	Route::delete('no_user/{token_id}','API\GrupoController@destroy')->name('no_users.destroy');
    	Route::get('pdf/','API\GrupoController@pdfShow')->name('pdfShow');
    	Route::get('pdf/download','API\GrupoController@pdfDownload')->name('pdfDownload');
    });
});