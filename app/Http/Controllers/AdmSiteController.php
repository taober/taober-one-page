<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

ini_set('max_execution_time', 680);

class AdmSiteController extends Controller
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
        $site = auth()->user()->site()->first();
        //dd($site);
        return view('AdmSiteEdita',[
            'site' => $site
        ]);
    }

    public function salvar(Request $request){
        
        $id = $request->site_id;

        $dados = [
            'ativo' => $request->ativo,
            'titulo' => $request->titulo,
            'dominio' => $request->dominio,
            'google_analytcs' => $request->google_analytcs,
            'google_search' => $request->google_search,
            'google_maps' => $request->google_maps,
            'social_facebook_pixel' => $request->facebook_pixel,
            'social_facebook' => $request->facebook,
            'social_instagram' => $request->instagram,
            'social_linkedin' => $request->linkedin,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'css' => $request->css,
            'js' => $request->js,
        ];


        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $extension = $request->logo->extension();
            $imagem_logo = "{$id}_logo.webp";
            $resizeImage = Image::make($request->file('logo')->getRealPath())->encode('webp', 100);
            $resizeImage->save(storage_path('app/imagens/' . $imagem_logo));
            $dados['logo'] = $imagem_logo;
        }

        if ($request->remover_logo == 'S'){
            $dados['logo'] = "";
        }
        //dd($request,$dados);

        DB::table('sites')
        ->where('id', $id)
        ->update($dados);

        return redirect('admin/site/')->with('mensagem_sucesso', 'Site Atualizado com Sucesso!');
        die();


    }

}