<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\EnviaEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;
use Illuminate\Support\Facades\Log;

class CarregaSiteController extends Controller
{
    public function index()
    {

        $url = $_SERVER['HTTP_HOST'];

        $site = DB::table('sites')
            ->where('id', $_SESSION['site_id'])
            ->first();
       
    }
    
    public function carrega_site($id)
    {

        $site = DB::table('sites')
            ->where('id',$id)
            ->first();



        if($site->ativo == 0){
            return view('_t/000/index', [
                'site' => $site
            ]);
        }

        $template = DB::table('templates')
        ->where('id', $site->template_id)
            ->first();


        

        if(!$site){
            die('<h1>Site Não Encontrado</h1>');
        }

        $portifolios = DB::table('portifolios')
            //->leftJoin('imagens', 'portifolios.id', '=', 'imagens.ref_id')
            //->where('imagens.ref_nome', 'portifolios')
            ->where('site_id', $site->id)
            ->get();

        $banner_principal = DB::table('banners_principais')
            ->where('site_id', $site->id)
            ->first();

        $quem_somos = DB::table('quem_somos')
            ->where('site_id', $site->id)
            ->first();

        $que_fazemos = DB::table('que_fazemos')
            ->where('site_id', $site->id)
            ->get();

        $depoimentos = DB::table('depoimentos')
            ->where('site_id', $site->id)
            ->get();

        return view('_t/'.$template->dir.'/index', [
            'site' => $site,
            'portifolios' => $portifolios,
            'quemSomos' => $quem_somos,
            'bannerPrincipal' => $banner_principal,
            'queFazemos' => $que_fazemos,
            'depoimentos' => $depoimentos
        ]);
    }    

    public function contato_envia(Request $request)
    {
        $to = 'procurarimoveisrj@gmail.com';
        $url = $_SERVER['HTTP_HOST'];
        $detalhes = [
            'site' => $url,
            'nome' => $request->nome,
            'email' => $request->email,
            'mensagem' => $request->mensagem,
            'empreendimento' => $request->empreendimento,
            'telefone' => $request->telefone
        ];
        //dd($detalhes);
        Mail::to($to)->send(new EnviaEmail($detalhes));
        return redirect('/#contato')->with('status', 'Contato Enviado com sucesso!');
    }
}
