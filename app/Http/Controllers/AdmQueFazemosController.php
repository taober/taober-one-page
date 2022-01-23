<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

ini_set('max_execution_time', 680);

class AdmQueFazemosController extends Controller
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
        $queFazemos = DB::table('que_fazemos')
        ->where('site_id', $_SESSION['site_id'] )
        ->get();

        return view('AdmQueFazemosLista',[
            'itens' => $queFazemos
        ]);
    }

    public function salvar(Request $request){
        
        $id = $request->site_id;


        $dados = [
            'ativo' => $request->ativo,
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
        ];

        if(!$request->id){
            $quemSomos_id = DB::table('quem_somos')->insertGetId([
                'site_id' => $_SESSION['site_id']
,            ]);
        }else{
            $quemSomos_id = $request->id;
        }

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $extension = $request->imagem->extension();
            $imagem_banner = "{$quemSomos_id}_quem_somos.webp";
            $resizeImage = Image::make($request->file('imagem')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/' . $imagem_banner));
            $dados['imagem'] = $imagem_banner;
        }

        if ($request->remover_banner == 'S'){
            $dados['imagem'] = "";
        }

        DB::table('quem_somos')
        ->where('id', $quemSomos_id)
        ->update($dados);

        return redirect('admin/quem-somos/')->with('mensagem_sucesso', 'Quem Somos Atualizado com Sucesso!');
        die();


    }

}