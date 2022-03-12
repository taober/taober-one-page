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

    public function index($tipo)
    {

        $site_id = auth()->user()->site()->first()->id;
        //dd($site->id);
        $tipo = DB::table('nodes_tipos')
            ->where('tipo_nome', $tipo)
            ->first();
    
        $nodes = DB::table('nodes')
            ->where('site_id', $site_id )
            ->where('tipo_id', $tipo->tipo_id)
            ->get();

        if($tipo->tipo_lista == 0){
            if($nodes->count() == 0){
                return redirect('admin/nodes/novo/' . $tipo->tipo_nome);
            }else{
                return redirect('admin/nodes/' . $nodes{0}->node_id);
            }
        }

        return view('AdmNodesLista', [
            'tipo' => $tipo,
            'itens' => $nodes
        ]);
    }

    public function novo($tipo)
    {

        $tipo = DB::table('nodes_tipos')
        ->where('tipo_nome', $tipo)
            ->first();

        return view('AdmNodesEdita', [
            'tipo' => $tipo
        ]);
    }

    public function edita($id)
    {

        $site_id = auth()->user()->site()->first()->id;
        //dd($site_id);
        $node = DB::table('nodes')
        ->where('node_id', $id)
        ->where('site_id', $site_id)
        ->first();

        $tipo = DB::table('nodes_tipos')
        ->where('tipo_id', $node->tipo_id)
        ->first();

        $imagens = DB::table('imagens')
        ->where('ref_id', $id)
        ->where('ref_nome', 'nodes')
        ->orderBy('favorita', 'DESC')
        ->get();

        return view('AdmNodesEdita', [
            'tipo' => $tipo,
            'item' => $node,
            'imagens' => $imagens
        ]);
    }

    public function salvar(Request $request){
        
        $id = $request->id;
        $site_id = auth()->user()->site()->first()->id;


        $dados = [
            'node_ativo' => $request->ativo,
            'node_titulo' => $request->titulo,
            'node_subtitulo' => $request->subtitulo,
            'node_conteudo' => $request->conteudo,
            'node_link' => $request->link
        ];

        $node_id = $request->id;

        if(!$request->id){
            $dados['tipo_id'] = $request->tipo;
            $dados['site_id'] = $site_id;
            $node_id = DB::table('nodes')->insertGetId($dados);
        }else{
            DB::table('nodes')
            ->where('node_id', $node_id)
            ->where('site_id', $site_id)
            ->update($dados);
        }

        return redirect('admin/nodes/' . $node_id)->with('mensagem_sucesso', 'Node Atualizado com Sucesso!');
        die();

    }

    public function deletar($id)
    {

        $site_id = auth()->user()->site()->first()->id;
        DB::table('portifolios')
        ->where('id', $id)
        ->where('site_id', $site_id)
        ->delete();

        return redirect('admin/portifolios/')->with('mensagem_sucesso', 'Depoimento Excluido com Sucesso!');
        die();
    }

    

    


}