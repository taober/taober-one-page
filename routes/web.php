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

Route::get('/', [App\Http\Controllers\CarregaSiteController::class,'index']);
Route::get('/preview-site/{id}', [App\Http\Controllers\CarregaSiteController::class, 'preview_site']);
Route::post('/contato-envia', [App\Http\Controllers\CarregaSiteController::class, 'contato_envia'])->name('contato_envia');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');

    Route::post('/admin/media/imagem-salvar', [App\Http\Controllers\AdmMediaController::class, 'imagem_salvar'])->name('media-imagem-salvar');
    Route::get('/admin/media/imagem-favoritar/{id}', [App\Http\Controllers\AdmMediaController::class, 'imagem_favoritar'])->name('media-imagem-favoritar');
    Route::get('/admin/media/imagem-deletar/{id}', [App\Http\Controllers\AdmMediaController::class, 'imagem_deletar'])->name('media-imagem-favoritar');

    Route::get('/admin/taober/backup_database', [App\Http\Controllers\AdmTaoberController::class, 'backup_database'])->name('index');

    Route::get('/admin/sites/', [App\Http\Controllers\AdmSitesController::class, 'index'])->name('index');
    Route::get('/admin/sites/novo', [App\Http\Controllers\AdmSitesController::class, 'novo'])->name('novo');
    Route::get('/admin/sites/{id}', [App\Http\Controllers\AdmSitesController::class, 'edita'])->name('edita');
    Route::get('/admin/sites/deletar/{id}', [App\Http\Controllers\AdmSitesController::class, 'deletar'])->name('deletar');
    Route::post('/admin/sites/salvar', [App\Http\Controllers\AdmSitesController::class, 'salvar'])->name('salvar');

    Route::get('/admin/site/', [App\Http\Controllers\AdmSiteController::class, 'index'])->name('index');
    Route::post('/admin/site/salvar', [App\Http\Controllers\AdmSiteController::class, 'salvar'])->name('salvar');

    Route::get('/admin/nodes/{tipo}', [App\Http\Controllers\AdmNodesController::class, 'index'])->name('index');
    Route::get('/admin/nodes/novo', [App\Http\Controllers\AdmNodesController::class, 'novo'])->name('novo');
    Route::get('/admin/nodes/{id}', [App\Http\Controllers\AdmNodesController::class, 'edita'])->name('edita');
    Route::get('/admin/nodes/deletar/{id}', [App\Http\Controllers\AdmNodesController::class, 'deletar'])->name('deletar');
    Route::post('/admin/nodes/salvar', [App\Http\Controllers\AdmNodesController::class, 'salvar'])->name('salvar');
    Route::post('/admin/nodes/imagem-salvar', [App\Http\Controllers\AdmNodesController::class, 'imagem_salvar'])->name('salvar');
    Route::get('/admin/nodes/imagem-deletar/{id}', [App\Http\Controllers\AdmNodesController::class, 'imagem_deletar'])->name('salvar');

    Route::get('/admin/banner-principal/', [App\Http\Controllers\AdmBannerPrincipalController::class, 'index'])->name('index');
    Route::post('/admin/banner-principal/salvar', [App\Http\Controllers\AdmBannerPrincipalController::class, 'salvar'])->name('salvar');

    Route::get('/admin/quem-somos/', [App\Http\Controllers\AdmQuemSomosController::class, 'index'])->name('index');
    Route::post('/admin/quem-somos/salvar', [App\Http\Controllers\AdmQuemSomosController::class, 'salvar'])->name('salvar');

    Route::get('/admin/o-que-fazemos/', [App\Http\Controllers\AdmQueFazemosController::class, 'index'])->name('index');
    Route::get('/admin/o-que-fazemos/novo', [App\Http\Controllers\AdmQueFazemosController::class, 'novo'])->name('novo');
    Route::get('/admin/o-que-fazemos/{id}', [App\Http\Controllers\AdmQueFazemosController::class, 'edita'])->name('edita');
    Route::get('/admin/o-que-fazemos/deletar/{id}', [App\Http\Controllers\AdmQueFazemosController::class, 'deletar'])->name('deletar');
    Route::post('/admin/o-que-fazemos/salvar', [App\Http\Controllers\AdmQueFazemosController::class, 'salvar'])->name('salvar');

    Route::get('/admin/depoimentos/', [App\Http\Controllers\AdmDepoimentosController::class, 'index'])->name('index');
    Route::get('/admin/depoimentos/novo', [App\Http\Controllers\AdmDepoimentosController::class, 'novo'])->name('novo');
    Route::get('/admin/depoimentos/{id}', [App\Http\Controllers\AdmDepoimentosController::class, 'edita'])->name('edita');
    Route::get('/admin/depoimentos/deletar/{id}', [App\Http\Controllers\AdmDepoimentosController::class, 'deletar'])->name('deletar');
    Route::post('/admin/depoimentos/salvar', [App\Http\Controllers\AdmDepoimentosController::class, 'salvar'])->name('salvar');

    Route::get('/admin/portifolios/', [App\Http\Controllers\AdmPortifoliosController::class, 'index'])->name('index');
    Route::get('/admin/portifolios/novo', [App\Http\Controllers\AdmPortifoliosController::class, 'novo'])->name('novo');
    Route::get('/admin/portifolios/{id}', [App\Http\Controllers\AdmPortifoliosController::class, 'edita'])->name('edita');
    Route::get('/admin/portifolios/deletar/{id}', [App\Http\Controllers\AdmPortifoliosController::class, 'deletar'])->name('deletar');
    Route::post('/admin/portifolios/salvar', [App\Http\Controllers\AdmPortifoliosController::class, 'salvar'])->name('salvar');
    Route::post('/admin/portifolios/imagem-salvar', [App\Http\Controllers\AdmPortifoliosController::class, 'imagem_salvar'])->name('salvar');
    Route::get('/admin/portifolios/imagem-deletar/{id}', [App\Http\Controllers\AdmPortifoliosController::class, 'imagem_deletar'])->name('salvar');

Route::get('/admin/re-cache', [App\Http\Controllers\ImoveisController::class, 're_cache_image'])->name('re_cache_image');
Route::get('/admin/imoveis', [App\Http\Controllers\ImoveisController::class, 'index'])->name('index');
Route::get('/admin/imoveis/{id}', [App\Http\Controllers\ImoveisController::class, 'ver'])->name('ver');
Route::get('/admin/imoveis/novo', [App\Http\Controllers\ImoveisController::class, 'novo'])->name('novo');
Route::get('/admin/imoveis/preview/{id}', [App\Http\Controllers\SiteController::class, 'preview'])->name('preview');
Route::post('/admin/imoveis/upload', [App\Http\Controllers\ImoveisController::class, 'upload'])->name('upload');
Route::post('/admin/imoveis/apagar-imagem', [App\Http\Controllers\ImoveisController::class, 'apagarImagem'])->name('apagarImagem');
Route::post('/admin/imoveis/salvar', [App\Http\Controllers\ImoveisController::class, 'salvar'])->name('salvar');