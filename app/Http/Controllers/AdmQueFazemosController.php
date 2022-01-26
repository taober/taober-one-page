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

    public function novo()
    {
        return view('AdmQueFazemosEdita');
    }

    public function edita($id)
    {
        $queFazemos = DB::table('que_fazemos')
        ->where('id', $id)
        ->where('site_id', $_SESSION['site_id'])
        ->first();

        return view('AdmQueFazemosEdita', [
            'item' => $queFazemos
        ]);
    }

    public function salvar(Request $request){
        
        $id = $request->id;


        $dados = [
            'ativo' => $request->ativo,
            'titulo' => $request->titulo,
            'link' => $request->link,
            'descricao' => $request->descricao,
        ];

        if(!$request->id){
            $queFazemos_id = DB::table('que_fazemos')->insertGetId([
                'site_id' => $_SESSION['site_id']
,            ]);
        }else{
            $queFazemos_id = $request->id;
        }


        DB::table('que_fazemos')
        ->where('id', $queFazemos_id)
        ->where('site_id', $_SESSION['site_id'])
        ->update($dados);

        return redirect('admin/o-que-fazemos/')->with('mensagem_sucesso', 'Item Atualizado com Sucesso!');
        die();

    }

    public function deletar($id)
    {
        DB::table('que_fazemos')
        ->where('id', $id)
        ->where('site_id', $_SESSION['site_id'])
        ->delete();

        return redirect('admin/o-que-fazemos/')->with('mensagem_sucesso', 'Item Excluido com Sucesso!');
        die();
    }

}