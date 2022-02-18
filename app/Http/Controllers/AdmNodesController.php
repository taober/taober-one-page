<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AdmNodesController extends Controller
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
        $nodes = DB::table('nodes')
        ->where('site_id', $_SESSION['site_id'] )
        ->get();

        return view('AdmNodesLista', [
            'itens' => $nodes
        ]);
    }

    public function novo()
    {
        return view('AdmNodesEdita');
    }

    public function edita($id)
    {
        $node = DB::table('nodes')
        ->where('id', $id)
        ->where('site_id', $_SESSION['site_id'])
        ->first();

        $imagens = DB::table('imagens')
        ->where('ref_id', $id)
        ->where('ref_nome', 'nodes')
        ->orderBy('favorita', 'DESC')
        ->get();

        return view('AdmNodesEdita', [
            'item' => $node,
            'imagens' => $imagens
        ]);
    }

    public function salvar(Request $request){
        
        $id = $request->id;


        $dados = [
            'ativo' => $request->ativo,
            'titulo' => $request->titulo,
            'empresa' => $request->empresa,
            'descricao' => $request->descricao,
            'link' => $request->link
        ];

        if(!$request->id){
            $portifolio_id = DB::table('portifolios')->insertGetId([
                'site_id' => $_SESSION['site_id']
            ]);
        }else{
            $portifolio_id = $request->id;
        }

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagem_nome = "{$id}_capa.webp";
            $resizeImage = Image::make($request->file('imagem')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/portifolios/' . $imagem_nome));
            $dados['imagem'] = $imagem_nome;
        }

        if ($request->remover_foto == 'S') {
            $dados['imagem'] = "";
        }


        DB::table('portifolios')
        ->where('id', $portifolio_id)
        ->where('site_id', $_SESSION['site_id'])
        ->update($dados);

        return redirect('admin/portifolios/' . $portifolio_id)->with('mensagem_sucesso', 'Depoimento Atualizado com Sucesso!');
        die();

    }

    public function deletar($id)
    {
        DB::table('portifolios')
        ->where('id', $id)
        ->where('site_id', $_SESSION['site_id'])
        ->delete();

        return redirect('admin/portifolios/')->with('mensagem_sucesso', 'Depoimento Excluido com Sucesso!');
        die();
    }

    public function imagem_salvar(Request $request)
    {

        $portifolio_id = $request->portifolio_id;

        $dados = [
            'ref_nome' => 'portifolios',
            'ref_id' => $portifolio_id,
            'titulo' => $request->titulo
        ];

        $imagem_id = DB::table('imagens')->insertGetId($dados);

        if ($request->hasFile('portifolio_imagem') && $request->file('portifolio_imagem')->isValid()) {
            $imagem_nome = "{$imagem_id}_img.webp";
            $resizeImage = Image::make($request->file('portifolio_imagem')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/portifolios/' . $imagem_nome));
            $dados['imagem'] = $imagem_nome;
        }


        DB::table('imagens')
            ->where('id', $imagem_id)
            ->update($dados);

        return redirect('admin/portifolios/' . $portifolio_id)->with('mensagem_sucesso', 'Imagem Incluida com Sucesso!');
        die();
    }

    public function imagem_deletar($id)
    {

        $file = DB::table('imagens')
            ->where('id', $id)
            ->first();

        $name = $file->imagem;
        $portifolio_id = $file->ref_id;

        $res = DB::table('imagens')->where('id', $id)->delete();

        File::delete(storage_path('app/imagens/portifolios/' . $name));
                

        return redirect('admin/portifolios/'. $portifolio_id)->with('mensagem_sucesso', 'Imagem Excluida com Sucesso!');
        die();
    }


}