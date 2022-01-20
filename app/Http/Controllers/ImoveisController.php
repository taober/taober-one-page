<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

ini_set('max_execution_time', 680);

class ImoveisController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $emp = DB::table('empreendimentos')->get();
        return view('imoveisLista',[
            'imoveis' => $emp
        ]);
    }

    public function ver($id)
    {
        $emp = DB::table('empreendimentos')
        ->where('empreendimentos.id',$id)
        ->first();

        $imagens = DB::table('imagens')
        ->where('imagens.empreendimento_id',$id)
        ->get();

        $plantas = DB::table('plantas')
        ->where('plantas.empreendimento_id',$id)
        ->get();

        return view('imoveisVer',[
            'imovel' => $emp,
            'imagens' => $imagens,
            'plantas' => $plantas
        ]);
    }

    public function novo()
    {


        $imovel = [
            'ativo' => 1,
            'nome' => '',
            'subtitulo' => '',
            'dominio' => '',
            'youtubelink' => '',
            'descricao_site' => '',
            'google_analytcs' => '',
            'google_search' => '',
            'google_maps' => '',
            'tituloimagens' => '',
            'textoimagens' => '',
            'tituloplantas' => '',
            'textoplantas' => '',
            'detalhe_ativo' => 1,
            'detalhe_titulo' => '',
            'detalhe_texto' => '',
            'detalhe_titulo_2' => '',
            'detalhe_texto_2' => ''
        ];

        return view('imoveisVer',[
            'imovel' => [],
            'imagens' => [],
            'plantas' => []
        ]);
    }

    public function salvar(Request $request){
        
        $id = $request->empreendimento_id;

        if($id == ''){
            $id = DB::table('empreendimentos')->insertGetId([
                'nome' => $request->nome
            ]);
        }

        $dados = [
            'ativo' => $request->ativo,
            'nome' => $request->nome,
            'subtitulo' => $request->subtitulo,
            'dominio' => $request->dominio,
            'youtubelink' => $request->youtubelink,
            'descricao_site' => $request->descricao_site,
            'google_analytcs' => $request->google_analytcs,
            'google_search' => $request->google_search,
            'google_maps' => $request->google_maps,
            'tituloimagens' => $request->tituloimagens,
            'textoimagens' => $request->textoimagens,
            'tituloplantas' => $request->tituloplantas,
            'textoplantas' => $request->textoplantas,
            'descricao_titulo' => $request->descricao_titulo,
            'descricao_texto' => $request->descricao_texto,
            'descricao_titulo_2' => $request->descricao_titulo_2,
            'descricao_texto_2' => $request->descricao_texto_2,
            'detalhe_ativo' => $request->detalhe_ativo,
            'detalhe_titulo' => $request->detalhe_titulo,
            'detalhe_texto' => $request->detalhe_texto,
            'detalhe_titulo_2' => $request->detalhe_titulo_2,
            'detalhe_texto_2' => $request->detalhe_texto_2
        ];


        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $extension = $request->logo->extension();
            $imagem_logo = "{$id}_logo.webp";
            $resizeImage = Image::make($request->file('logo')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/empreendimentos/' . $imagem_logo));
            $dados['logo'] = $imagem_logo;
        }
        if ($request->hasFile('fundo') && $request->file('fundo')->isValid()) {
            $extension = $request->fundo->extension();
            $imagem_fundo = "{$id}_fundo.webp";
            $resizeImage = Image::make($request->file('fundo')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/empreendimentos/' . $imagem_fundo));
            $dados['fundo'] = $imagem_fundo;
        }
        if ($request->hasFile('detalhe_fundo') && $request->file('detalhe_fundo')->isValid()) {
            $extension = $request->detalhe_fundo->extension();
            $imagem_detalhe_fundo = "{$id}_fundo.webp";
            $resizeImage = Image::make($request->file('detalhe_fundo')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/detalhes/' . $imagem_detalhe_fundo));
            $dados['detalhe_fundo'] = $imagem_detalhe_fundo;
        }
        if ($request->hasFile('descricao_fundo') && $request->file('descricao_fundo')->isValid()) {
            $extension = $request->descricao_fundo->extension();
            $imagem_descricao_fundo = "{$id}_fundo.webp";
            $resizeImage = Image::make($request->file('descricao_fundo')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/oempreendimento/' . $imagem_descricao_fundo));
            $dados['descricao_fundo'] = $imagem_descricao_fundo;
        }

        if ($request->remover_logo == 'S'){
            $dados['logo'] = "";
        }
        //dd($request,$dados);

        DB::table('empreendimentos')
        ->where('id', $id)
        ->update($dados);

        return redirect('admin/imoveis/'.$id)->with('mensagem_imovel', 'Imóvel Atualizado com sucesso!');
        die();


    }

    public function upload(Request $request){
        $imagem_nome = null;
        $id = $request->empreendimento_id;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $imagem_nome = "{$name}.{$extension}";

            $tabela = ($request->tipo == 'planta') ? 'plantas' : 'imagens';
            $dirCache = ($request->tipo == 'planta') ? 'plantas/' : 'imagens/';
            
            $resizeImage = Image::make($request->file('image')->getRealPath())->encode('webp', 70)->resize(395, 286);
            $resizeImage->save(storage_path('app/imagens/'.$dirCache.'cache/395x286_'. $name. '.webp'));

            $resizeImage = Image::make($request->file('image')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/' . $dirCache . $name . '.webp'));

            $imagem_id = DB::table($tabela)->insertGetId([
                'empreendimento_id' => $id,
                'titulo' => $request->titulo,
                'imagem' => $name . '.webp'
            ]);
    
            //$upload = $request->image->storeAs('imagens'. $dirStore, $imagem_nome);

            // if ( !$upload )
            //     return redirect()
            //                 ->back()
            //                 ->with('error', 'Falha ao fazer upload')
            //                 ->withInput();

            return redirect('admin/imoveis/'  .$id);
    
        }


    }
    
    
    public function apagarImagem(Request $request){
        $imagem_nome = null;
        $id = $request->id;
        
        $tabela = ($request->tipo == 'planta') ? 'plantas' : 'imagens';
        $dirCache = ($request->tipo == 'planta') ? 'plantas/' : 'imagens/';
        
        $file = DB::table($tabela)
                ->where('id',$id)
                ->first();
                
        $name = $file->imagem;
        $empreendimento = $file->empreendimento_id;

        $res = DB::table($tabela)->where('id',$id)->delete();
        //dd(storage_path('app/imagens/' . $dirCache . $name));
        
        File::delete(storage_path('app/imagens/' . $dirCache . $name));
        File::delete(storage_path('app/imagens/'.$dirCache.'cache/395x286_'. $name));
                
        
        return redirect('admin/imoveis/' . $empreendimento);


    }

    public function re_cache_image(){


        // emprendimentos = fundo e logo
        // detalhes = fundo
        // oempreendimento = fundo

        //refaz todas as imagens 

        $imoveis = DB::table('empreendimentos')
            ->get();
        foreach ($imoveis as $imovel) {
            // $aImagem = explode('.', $imovel->descricao_fundo);
            // if (!empty($imovel->descricao_fundo) && !file_exists(storage_path('app/imagens/oempreendimento/' . $aImagem[0] . '.webp')) && file_exists(storage_path('app/imagens/oempreendimento/' . $imovel->descricao_fundo))) {
            //     $resizeImage = Image::make(storage_path('app/imagens/oempreendimento/' . $imovel->descricao_fundo))->encode('webp', 100);
            //     $resizeImage->save(storage_path('app/imagens/oempreendimento/' . $aImagem[0] . '.webp'));
            // }

            // $aImagem = explode('.', $imovel->detalhe_fundo);
            // if (!empty($imovel->detalhe_fundo) && !file_exists(storage_path('app/imagens/detalhes/' . $aImagem[0] . '.webp')) && file_exists(storage_path('app/imagens/detalhes/' . $imovel->detalhe_fundo))) {
            //     $resizeImage = Image::make(storage_path('app/imagens/detalhes/' . $imovel->detalhe_fundo))->encode('webp', 100);
            //     $resizeImage->save(storage_path('app/imagens/detalhes/' . $aImagem[0] . '.webp'));
            // }
            // $aImagem = explode('.', $imovel->fundo);
            // if (!empty($imovel->fundo) && !file_exists(storage_path('app/imagens/empreendimentos/' . $aImagem[0] . '.webp')) && file_exists(storage_path('app/imagens/empreendimentos/' . $imovel->fundo))) {
            //     $resizeImage = Image::make(storage_path('app/imagens/empreendimentos/' . $imovel->fundo))->encode('webp', 100);
            //     $resizeImage->save(storage_path('app/imagens/empreendimentos/' . $aImagem[0] . '.webp'));
            // }
            // $aImagem = explode('.', $imovel->logo);
            // if (!empty($imovel->logo) && !file_exists(storage_path('app/imagens/empreendimentos/' . $aImagem[0] . '.webp')) && file_exists(storage_path('app/imagens/empreendimentos/' . $imovel->logo))) {
            //     $resizeImage = Image::make(storage_path('app/imagens/empreendimentos/' . $imovel->logo))->encode('webp', 100);
            //     $resizeImage->save(storage_path('app/imagens/empreendimentos/' . $aImagem[0] . '.webp'));
            // }

        }


        $imagens = DB::table('imagens')
        ->whereNotNull('imagem')
        ->get();
        // foreach ($imagens as $img) {
        //     $aImagem = explode('.', $img->imagem);
        //     //echo $img->imagem . "{$img->imagem}<hr>";
        //     if(!file_exists(storage_path('app/imagens/cache/395x286_' .$aImagem[0] . '.webp')) && file_exists(storage_path('app/imagens/' . $img->imagem))){
        //         $resizeImage = Image::make(storage_path('app/imagens/' . $img->imagem) )->encode('webp', 70)->resize(395, 286);
        //         $resizeImage->save(storage_path('app/imagens/cache/395x286_'. $aImagem[0] . '.webp'));
        //     }
        //     if (!file_exists(storage_path('app/imagens/' . $aImagem[0] . '.webp')) && file_exists(storage_path('app/imagens/' . $img->imagem))) {
        //         $resizeImage = Image::make(storage_path('app/imagens/' . $img->imagem))->encode('webp', 100);
        //         $resizeImage->save(storage_path('app/imagens/' . $aImagem[0] . '.webp'));
        //     }
        // }


        $imagens = DB::table('plantas')
        ->whereNotNull('imagem')
        ->get();
        foreach ($imagens as $img) {
            $aImagem = explode('.', $img->imagem);
            // if (!file_exists(storage_path('app/imagens/plantas/cache/395x286_' .$aImagem[0] . '.webp')) && file_exists(storage_path('app/imagens/plantas/' . $img->imagem))) {
            //     echo ' | cache ';
            //     $resizeImage = Image::make(storage_path('app/imagens/plantas/' . $img->imagem))->encode('webp', 70)->resize(395, 286);
            //     $resizeImage->save(storage_path('app/imagens/plantas/cache/395x286_' .$aImagem[0] . '.webp'));
            // }
            // if (!file_exists(storage_path('app/imagens/plantas/' . $aImagem[0] . '.webp')) && file_exists(storage_path('app/imagens/plantas/' . $img->imagem))) {
            //     $resizeImage = Image::make(storage_path('app/imagens/plantas/' . $img->imagem))->encode('webp', 100);
            //     $resizeImage->save(storage_path('app/imagens/plantas/' . $aImagem[0] . '.webp'));
            // }
        }

    }


}