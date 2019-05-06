<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

putenv( 'LC_ALL=zh_CN.UTF-8' );

Route::get( '/search', function ( \Illuminate\Http\Request $request ) {
    $keywords = $request->get( 'keywords', '绿茵峥嵘' );

    $str = shell_exec( sprintf( '%s %s search %s', env( 'PYTHON_PATH' ), env( 'SHELL_PATH' ), $keywords ) );

    $search = json_decode( $str, true );

    return response()->json( $search );

} );

Route::get( '/catalog', function ( \Illuminate\Http\Request $request ) {
    $path = $request->get( 'path', '97_97046' );

    $str = shell_exec( sprintf( '%s %s catalog %s', env( 'PYTHON_PATH' ), env( 'SHELL_PATH' ), $path ) );

    $chapters = json_decode( $str, true );

    return response()->json( $chapters );

} );

Route::get( '/chapter', function ( \Illuminate\Http\Request $request ) {
    $path = $request->get( 'path', '52_52542/20800949.html' );

    $str = shell_exec( sprintf( '%s %s chapter %s', env( 'PYTHON_PATH' ), env( 'SHELL_PATH' ), $path ) );

    $chapter = json_decode( $str, true );

    return response()->json( $chapter );
} );
