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

    var $node_propriedades = [
        "ativo"      => "Ativo",    // 'string' ou false
        "titulo"     => "Título",   // 'string' ou false
        "sub_titulo" => false,      // 'string' ou false
        "descricao"  => false,      // 'string' ou false
        'galeria'    => true,       // true ou false
        "node_capa"  => false,      // true ou false
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    function propriedades($node_capa, $propriedades){
        $this->node_propriedades['node_capa'] = $node_capa;
        $dados1 =  json_encode($this->node_propriedades);
        $dados2 =  json_decode($propriedades);
        $dados2 = json_encode( ($node_capa) ? $dados2->lista : (isset($dados2->node) ? $dados2->node : $dados2)) ;
        $dados  = array_merge(
            json_decode($dados1, true),
            json_decode($dados2, true)
        );
        $res = json_decode(json_encode($dados, JSON_FORCE_OBJECT));
        return $res;
    }


    public function index($tipo)
    {

        $site_id = auth()->user()->site()->first()->id;
        $tipo = DB::table('nodes_tipos')
        ->where('tipo_nome', $tipo)
        ->first();
        $tipo->tipo_labels = json_decode($tipo->tipo_labels);

        $nodes = DB::table('nodes')
            ->where('site_id', $site_id )
            ->where('tipo_id', $tipo->tipo_id)
            ->get();

        //if($tipo->tipo_lista == 0){
            if($nodes->count() == 0){
                return redirect('admin/nodes/novo/' . $tipo->tipo_nome);
            }else{
                return redirect('admin/nodes/' . $nodes{0}->node_id);
            }
        //}

        return view('AdmNodesLista', [
            'tipo' => $tipo,
            'itens' => $nodes
        ]);
    }

    public function novo($tipo)
    {
        $site_id = auth()->user()->site()->first()->id;

        $tipo = DB::table('nodes_tipos')
            ->where('tipo_nome', $tipo)
            ->first();

        $nodes = DB::table('nodes')
            ->where('site_id', $site_id)
            ->where('tipo_id', $tipo->tipo_id)
            ->first();
        $node_capa = (!isset($nodes->node_id));
        $node_id = (isset($nodes->node_id)) ? $nodes->node_id : 0;
        $tipo->tipo_labels = $this->propriedades($node_capa, $tipo->tipo_labels);

        return view('AdmNodesEdita', [
            'tipo' => $tipo,
            'node_pai' => $node_id
        ]);
    }

    public function edita($id)
    {

        $site_id = auth()->user()->site()->first()->id;

        $node = DB::table('nodes')
            ->where('node_id', $id)
            ->where('site_id', $site_id)
            ->first();

        $tipo = DB::table('nodes_tipos')
            ->where('tipo_id', $node->tipo_id)
            ->first();

        $nodes = DB::table('nodes')
            ->where('site_id', $site_id)
            ->where('tipo_id', $tipo->tipo_id)
            ->where('node_pai', $id)
            ->get();
        $node_capa = ($tipo->tipo_lista == '1' && $node->node_pai == '0');

        $tipo->tipo_labels = $this->propriedades($node_capa, $tipo->tipo_labels);
        
        $imagens = DB::table('imagens')
            ->where('ref_id', $id)
            ->where('ref_nome', 'nodes')
            ->orderBy('favorita', 'DESC')
            ->get();

        //dd($tipo->tipo_labels);

        return view('AdmNodesEdita', [
            'tipo' => $tipo,
            'item' => $node,
            'itens' => $nodes,
            'imagens' => $imagens,
            'node_pai' => $node->node_pai
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
            'node_link' => $request->link,
            'node_pai' => $request->pai
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