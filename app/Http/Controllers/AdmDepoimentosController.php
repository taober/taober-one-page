<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

ini_set('max_execution_time', 680);

class AdmDepoimentosController extends Controller
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
        $queFazemos = DB::table('depoimentos')
        ->where('site_id', $_SESSION['site_id'] )
        ->get();

        return view('AdmDepoimentosLista',[
            'itens' => $queFazemos
        ]);
    }

    public function novo()
    {
        return view('AdmDepoimentosEdita');
    }

    public function edita($id)
    {
        $depoimento = DB::table('depoimentos')
        ->where('id', $id)
        ->where('site_id', $_SESSION['site_id'])
        ->first();

        return view('AdmDepoimentosEdita', [
            'item' => $depoimento
        ]);
    }

    public function salvar(Request $request){
        
        $id = $request->id;


        $dados = [
            'ativo' => $request->ativo,
            'nome' => $request->nome,
            'empresa' => $request->empresa,
            'descricao' => $request->descricao,
            'cargo' => $request->cargo
        ];

        if(!$request->id){
            $depoimento_id = DB::table('depoimentos')->insertGetId([
                'site_id' => $_SESSION['site_id']
,            ]);
        }else{
            $depoimento_id = $request->id;
        }

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $imagem_foto = "{$id}_foto.webp";
            $resizeImage = Image::make($request->file('foto')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/depoimentos/' . $imagem_foto));
            $dados['foto'] = $imagem_foto;
        }

        if ($request->remover_foto == 'S') {
            $dados['foto'] = "";
        }


        DB::table('depoimentos')
        ->where('id', $depoimento_id)
        ->where('site_id', $_SESSION['site_id'])
        ->update($dados);

        return redirect('admin/depoimentos/')->with('mensagem_sucesso', 'Depoimento Atualizado com Sucesso!');
        die();

    }

    public function deletar($id)
    {
        DB::table('depoimentos')
        ->where('id', $id)
        ->where('site_id', $_SESSION['site_id'])
        ->delete();

        return redirect('admin/depoimentos/')->with('mensagem_sucesso', 'Depoimento Excluido com Sucesso!');
        die();
    }

}