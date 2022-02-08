<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

ini_set('max_execution_time', 680);

class AdmBannerPrincipalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $banner = DB::table('banners_principais')
        ->where('site_id', $_SESSION['site_id'] )
        ->first();

        $imagens = DB::table('imagens')
            ->where('ref_id', $banner->id)
            ->where('ref_nome', 'banner-principal')
            ->orderBy('favorita', 'DESC')
            ->get();

        return view('AdmBannerPrincipalEdita',[
            'banner' => $banner,
            'imagens' => $imagens
        ]);
    }

    public function salvar(Request $request){
        
        $id = $request->site_id;


        $dados = [
            'ativo' => $request->ativo,
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'link' => $request->link
        ];

        if(!$request->id){
            $banner_id = DB::table('banners_principais')->insertGetId([
                'site_id' => $_SESSION['site_id']
,            ]);
        }else{
            $banner_id = $request->id;
        }

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $extension = $request->imagem->extension();
            $imagem_banner = "{$banner_id}_banner_principal.webp";
            $resizeImage = Image::make($request->file('imagem')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/' . $imagem_banner));
            $dados['imagem'] = $imagem_banner;
        }

        if ($request->remover_banner == 'S'){
            $dados['imagem'] = "";
        }

        DB::table('banners_principais')
        ->where('id', $banner_id)
        ->update($dados);

        return redirect('admin/banner-principal/')->with('mensagem_sucesso', 'Banner Atualizado com Sucesso!');
        die();


    }

}