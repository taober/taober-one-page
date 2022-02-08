<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\EnviaEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;
use Illuminate\Support\Facades\Log;
use App\Models\Portifolios;

class CarregaSiteController extends Controller
{
    public function index()
    {
        $url = explode(':',str_ireplace('www.', '', $_SERVER['HTTP_HOST']))[0]; 

        $site = DB::table('sites')
            ->where('dominio', $url)
            ->first();

        if (!$site) {
            die('<h1>Site Não Encontrado</h1>');
        }

        if ($site->ativo == 0) {
            return view('_t/000/index', [
                'site' => $site
            ]);
        }

        $template = DB::table('templates')
        ->where('id', $site->template_id)
            ->first();


        // BANNER PRINCIPAL
        $banner_principal = DB::table('banners_principais')
        ->where('site_id', $site->id)
            ->first();
        $banner_principal->imagens = DB::table('imagens')
        ->where('ref_id', $banner_principal->id)
            ->where('ref_nome', 'banner-principal')
            ->orderBy('favorita', 'desc')
            ->limit(1)
            ->get();



        // PORTIFOLIOS
        $portifolios = Portifolios::where('site_id', $site->id)->get();
        foreach ($portifolios as &$item) {
            $item->imagens = $item->imagens()->orderBy('favorita', 'desc')->get();
        }


        $quem_somos = DB::table('quem_somos')
            ->where('site_id', $site->id)
            ->first();
        $quem_somos->imagens = DB::table('imagens')
            ->where('ref_id', $quem_somos->id)
            ->where('ref_nome', 'quem-somos')
            ->limit(2)
            ->get();

        $que_fazemos = DB::table('que_fazemos')
            ->where('site_id', $site->id)
            ->get();

        $depoimentos = DB::table('depoimentos')
            ->where('site_id', $site->id)
            ->get();

        return view('_t/' . $template->dir . '/index', [
            'site' => $site,
            'portifolios' => $portifolios,
            'quemSomos' => $quem_somos,
            'bannerPrincipal' => $banner_principal,
            'queFazemos' => $que_fazemos,
            'depoimentos' => $depoimentos
        ]);

    }

    public function preview_site($id)
    {
        $site = DB::table('sites')
            ->where('id', $id)
            ->first();

        if (!$site) {
            die('<h1>Site Não Encontrado</h1>');
        }

        $template = DB::table('templates')
            ->where('id', $site->template_id)
            ->first();


        // BANNER PRINCIPAL
        $banner_principal = DB::table('banners_principais')
            ->where('site_id', $site->id)
            ->first();
        $banner_principal->imagens = DB::table('imagens')
            ->where('ref_id', $banner_principal->id)
            ->where('ref_nome', 'banner-principal')
            ->orderBy('favorita','desc')
            ->limit(1)
            ->get();



        // PORTIFOLIOS
        $portifolios = Portifolios::where('site_id', $site->id)->get();
        foreach ($portifolios as &$item) {
            $item->imagens = $item->imagens()->orderBy('favorita', 'desc')->get();
        }


        $quem_somos = DB::table('quem_somos')
            ->where('site_id', $site->id)
            ->first();
        $quem_somos->imagens = DB::table('imagens')
            ->where('ref_id', $quem_somos->id)
            ->where('ref_nome', 'quem-somos')
            ->limit(2)
            ->get();

        $que_fazemos = DB::table('que_fazemos')
            ->where('site_id', $site->id)
            ->get();

        $depoimentos = DB::table('depoimentos')
            ->where('site_id', $site->id)
            ->get();

        return view('_t/' . $template->dir . '/index', [
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

        $url = parse_url($_SERVER['HTTP_HOST'])['host'];

        $site = DB::table('sites')
            ->join('users', 'users.id', '=', 'sites.usuario_id')
            ->where('dominio', $url)
            ->first();

        if (!$site) {
            return redirect('/#contato')->with('status', 'Ocorreu um erro! Tente novamente mais tarde!');
        }

        $to = $site->email;
        $detalhes = [
            'usuario' => $site->name,
            'nome' => $request->nome,
            'email' => $request->email,
            'assunto' => $request->assunto,
            'telefone' => $request->telefone,
            'mensagem' => $request->mensagem
        ];
        //dd($detalhes);
        Mail::to($to)->send(new EnviaEmail($detalhes));
        return redirect('/#contato')->with('status', 'Contato Enviado com sucesso!');
    }
}
