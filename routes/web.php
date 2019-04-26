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

use Illuminate\Support\Facades\Route;

putenv('LC_ALL=zh_CN.UTF-8');

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::get( '/search', function ( \Illuminate\Http\Request $request ) {
    $key = $request->get( 'key', '绿茵峥嵘' );

    $str = shell_exec( sprintf( '%s %s search %s', env( 'PYTHON_PATH' ), env( 'SHELL_PATH' ), $key ) );

    $search = json_decode( $str, true );

    return view( 'search', [ 'search' => $search ] );
} );

Route::get( '/chapters', function ( \Illuminate\Http\Request $request ) {
    $url = $request->get( 'url', 'http://www.b5200.net/61_61760/' );

    $str = shell_exec( sprintf( '%s %s chapters %s', env( 'PYTHON_PATH' ), env( 'SHELL_PATH' ), $url ) );

    $chapters = json_decode( $str, true );

    return view( 'chapters', [ 'chapters' => $chapters ] );
} );

Route::get( '/chapter', function ( \Illuminate\Http\Request $request ) {
    $url = $request->get( 'url', 'http://www.b5200.net/52_52542/20800949.html' );

    $str = shell_exec( sprintf( '%s %s chapter %s', env( 'PYTHON_PATH' ), env( 'SHELL_PATH' ), $url ) );

    $chapter = json_decode( $str, true );

    return view( 'chapter', [ 'chapter' => $chapter ] );
} );
