<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

ini_set('max_execution_time', 680);

class AdmQuemSomosController extends Controller
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
        $quemSomos = DB::table('quem_somos')
        ->where('site_id', $_SESSION['site_id'] )
        ->first();

        $imagens = DB::table('imagens')
            ->where('ref_id', $quemSomos->id)
            ->where('ref_nome', 'quem-somos')
            ->get();

        return view('AdmQuemSomosEdita',[
            'quemSomos' => $quemSomos,
            'imagens' => $imagens
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


        DB::table('quem_somos')
        ->where('id', $quemSomos_id)
        ->update($dados);

        return redirect('admin/quem-somos/')->with('mensagem_sucesso', 'Quem Somos Atualizado com Sucesso!');
        die();


    }

}