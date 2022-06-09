<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

ini_set('max_execution_time', 680);
ini_set('upload_max_filesize', 5000);
ini_set('post_max_size', 5000);

class AdmMediaController extends Controller
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


    public function novo()
    {
        return view('AdmPortifoliosEdita');
    }


    public function imagem_salvar(Request $request)
    {

        $titulo = $request->titulo;
        $xref_id = $request->xref_id;
        $xref_nome = $request->xref_nome;

        $dados = [
            'ref_nome' => $xref_nome,
            'ref_id' => $xref_id,
            'titulo' => $titulo
        ];
        //dd($request->file('galeria_imagem'));
        //dd($request->file('galeria_imagem')->isValid());
        //dd($request->file('galeria_imagem')->getErrorMessage());

        
        if ($request->hasFile('galeria_imagem') && $request->file('galeria_imagem')->isValid()) {
            DB::beginTransaction();

            $imagem_id = DB::table('imagens')->insertGetId($dados);
            $titulo_slug = Str::slug($titulo);

            $imagem_nome = "{$_SESSION['site_id']}-{$xref_nome}-{$titulo_slug}-{$imagem_id}.webp";
            $resizeImage = Image::make($request->file('galeria_imagem')->getRealPath())->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $resizeImage->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/' . $imagem_nome));
            $dados['imagem'] = $imagem_nome;

            DB::table('imagens')
                ->where('id', $imagem_id)
                ->update($dados);

            DB::commit();

            return redirect()->back()->with('mensagem_sucesso', 'Imagem Incluida com Sucesso!');
            die();

        }else{
            $erro = $request->file('galeria_imagem')->getErrorMessage();
            return redirect()->back()->with('mensagem_error', 'Ocorreu um erro: ' . $erro  );
            die();
        }

        

        
    }

    public function imagem_favoritar($id)
    {

        $imagem = DB::table('imagens')
            ->where('id', $id)
            ->first();

        $dados['favorita'] = ( $imagem->favorita ) == 1 ? 0 : 1;

        DB::table('imagens')
        ->where('id', $id)
            ->update($dados);


        return redirect()->back()->with('mensagem_sucesso', 'Imagem alterada com Sucesso!');
        die();
    }

    public function imagem_tags($id)
    {

        $imagem = DB::table('imagens')
            ->where('id', $id)
            ->first();
        
        $aTags = array_filter(explode(',',$imagem->ref_tags));
        $favorita = in_array('favorita', $aTags);
        //dd($favorita);
        if( $favorita ){
            for ($i=0; $i < count($aTags) ; $i++) { 
                # code...
                if($aTags[$i] == 'favorita'){
                    unset($aTags[$i]);
                }
            }
        }  else{
            array_push($aTags, 'favorita');
        }  
        //dd($aTags);
        $dados['ref_tags'] = implode(',',$aTags);

        DB::table('imagens')
            ->where('id', $id)
            ->update($dados);


        return redirect()->back()->with('mensagem_sucesso', 'Imagem alterada com Sucesso!');
        die();
    }

    public function imagem_deletar($id)
    {

        $file = DB::table('imagens')
        ->where('id', $id)
            ->first();

        $name = $file->imagem;

        $res = DB::table('imagens')->where('id', $id)->delete();

        File::delete(storage_path('app/imagens/' . $name));


        return redirect()->back()->with('mensagem_sucesso', 'Imagem Excluida com Sucesso!');
        die();
    }
}
