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

 
 Route::resource('categorias','categoriaController');
 Route::resource('productos','ProductoController',['only'=>['index','show']]);
 Route::resource('categorias.productos','categoriaProductoController',['except'=>['show']]);

 Route::resource('clientescreditos','clientesCreditoController');
 Route::resource('vendedores','vendedorController');
 Route::resource('tipoventas','tipoVentaController');
 
 Route::resource('facturas','facturaController',['only'=>['index','show']]);
 Route::resource('clientescreditos.facturas','clientesCreditoFacturaController',['except'=>['show']]);
 Route::resource('vendedores.facturas','vendedorFacturaController',['except'=>['show']]);
 Route::resource('tipoventas.facturas','tipoVentaFacturaController',['except'=>['show']]);

 Route::resource('detalleventas','detalleVentaController',['only'=>['index','show']]);
 Route::resource('categorias.productos.detalleventas','categoriaProductoDetalleVentaController',['except'=>['show']]);
 Route::resource('clientescreditos.facturas.detalleventas','creditoFacturaDetalleVentaController',['except'=>['show']]);
 Route::resource('vendedores.facturas.detalleventas','vendedorFacturaDetalleVentaController',['except'=>['show']]);
 Route::resource('tipoventas.facturas.detalleventas','tipoVentaFacturaDetalleVentaController',['except'=>['show']]);

  Route::resource('accesos','accesoController');


