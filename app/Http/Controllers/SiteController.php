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

class SiteController extends Controller
{
    public function index()
    {

        $url = $_SERVER['HTTP_HOST'];

        //->where('dominio',$id)

        $id = 70; //70;//402;//404;
        $emp = DB::table('empreendimentos')
            ->where('dominio', 'like', '%' . $url . '%')
            ->where('ativo',1)
            ->first();

        if(!$emp){
            die('<h1>Imóvel Não Encontrado</h1>');
        }

        $imagens = DB::table('imagens')
            ->where('imagens.empreendimento_id', $emp->id)
            ->get();

        $plantas = DB::table('plantas')
            ->where('plantas.empreendimento_id', $emp->id)
            ->get();
        //Log::info('e viu o site.');
        return view('site', [
            'emp' => $emp,
            'imagens' => $imagens,
            'plantas' => $plantas
        ]);
    }
    
    public function preview($id)
    {

        $emp = DB::table('empreendimentos')
            ->where('id',$id)
            ->first();

        if(!$emp){
            die('<h1>Imóvel Não Encontrado</h1>');
        }

        $imagens = DB::table('imagens')
            ->where('imagens.empreendimento_id', $emp->id)
            ->get();

        $plantas = DB::table('plantas')
            ->where('plantas.empreendimento_id', $emp->id)
            ->get();
        //Log::info('e viu o site.');
        return view('site', [
            'emp' => $emp,
            'imagens' => $imagens,
            'plantas' => $plantas
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
