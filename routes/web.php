<?php

use App\Http\Controllers\MoedaController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
//https://github.com/jeroennoten/Laravel-AdminLTE/wiki
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

$_SESSION['site_id'] = 1;
Route::get('/phpconfig', function () {
    phpinfo();
});

Route::get('/', [CarregaSiteController::class,'index']);
Route::post('/contato-envia', [App\Http\Controllers\CarregaSiteController::class, 'contato_envia'])->name('contato_envia');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');

    

    Route::get('/admin/site/', [App\Http\Controllers\AdmSiteController::class, 'index'])->name('index');
    Route::post('/admin/site/salvar', [App\Http\Controllers\AdmSiteController::class, 'salvar'])->name('salvar');

    Route::get('/admin/banner-principal/', [App\Http\Controllers\AdmBannerPrincipalController::class, 'index'])->name('index');
    Route::post('/admin/banner-principal/salvar', [App\Http\Controllers\AdmBannerPrincipalController::class, 'salvar'])->name('salvar');

    Route::get('/admin/quem-somos/', [App\Http\Controllers\AdmQuemSomosController::class, 'index'])->name('index');
    Route::post('/admin/quem-somos/salvar', [App\Http\Controllers\AdmQuemSomosController::class, 'salvar'])->name('salvar');

    Route::get('/admin/o-que-fazemos/', [App\Http\Controllers\AdmQueFazemosController::class, 'index'])->name('index');
    Route::post('/admin/o-que-fazemos/edita', [App\Http\Controllers\AdmQueFazemosController::class, 'salvar'])->name('salvar');
    Route::post('/admin/o-que-fazemos/salvar', [App\Http\Controllers\AdmQueFazemosController::class, 'salvar'])->name('salvar');

Route::get('/admin/re-cache', [App\Http\Controllers\ImoveisController::class, 're_cache_image'])->name('re_cache_image');
Route::get('/admin/imoveis', [App\Http\Controllers\ImoveisController::class, 'index'])->name('index');
Route::get('/admin/imoveis/{id}', [App\Http\Controllers\ImoveisController::class, 'ver'])->name('ver');
Route::get('/admin/imoveis/novo', [App\Http\Controllers\ImoveisController::class, 'novo'])->name('novo');
Route::get('/admin/imoveis/preview/{id}', [App\Http\Controllers\SiteController::class, 'preview'])->name('preview');
Route::post('/admin/imoveis/upload', [App\Http\Controllers\ImoveisController::class, 'upload'])->name('upload');
Route::post('/admin/imoveis/apagar-imagem', [App\Http\Controllers\ImoveisController::class, 'apagarImagem'])->name('apagarImagem');
Route::post('/admin/imoveis/salvar', [App\Http\Controllers\ImoveisController::class, 'salvar'])->name('salvar');





/*
ACERTOS BANCO
*********************************************************************************

UPDATE detalhes d INNER JOIN empreendimentos e ON e.id = d.empreendimento_id
SET
e.detalhe_titulo = d.titulo, 
e.detalhe_texto = d.texto, 
e.detalhe_titulo_2 = d.titulo2, 
e.detalhe_texto_2 = d.texto2, 
e.detalhe_fundo = d.fundo, 
e.detalhe_ativo = d.ativo ;
WHERE e.id = 130;

UPDATE descricoes d INNER JOIN empreendimentos e ON e.id = d.empreendimento_id
SET
e.descricao_titulo = d.titulo, 
e.descricao_texto = d.texto, 
e.descricao_titulo_2 = d.titulo2, 
e.descricao_texto_2 = d.texto2, 
e.descricao_fundo = d.fundo;
WHERE e.id = 130;

update plantas set imagem =  replace(imagem, '/img/plantas/','') ;
update imagens set imagem =  replace(imagem, '/img/imagens/','') ;


LARAVEL
************
composer update
php artisan storage:link

*/