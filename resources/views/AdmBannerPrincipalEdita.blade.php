@extends('adminlte::page')

@section('title', 'Imóveis')

@section('content_header')
    <h1> Banner Principal</h1>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/css/taober.css">
@stop

@section('content')

    <section class="content">
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="/admin/banner-principal/salvar" method="post" enctype="multipart/form-data"> 
                        <input type="hidden" name="id" value="{{ $banner->id ?? '' }}">
                        @csrf  
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edite os dados principais do seu site</h3>
                                <div class="card-tools">
                                    @if(isset($banner->id))
                                        <a href="/admin/site/preview/{{ $banner->site_id}}" target="_blank">
                                        <button type="button" class="btn btn-default ">
                                            <i class="fas fa-eye"></i> Preview
                                        </button>
                                        </a>
                                    @endif
                                    <button type="submit" class="btn btn-primary ">
                                        <i class="fas fa-save"></i> Salvar
                                    </button>    
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if(session('mensagem_sucesso'))
                                    <div class="alert alert-success">
                                        <p>{{session('mensagem_sucesso')}}</p>
                                    </div>
                                @endif                   
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titulo</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{ $banner->titulo ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sub-titulo</label>
                                            <input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Sub-titulo" value="{{ $banner->subtitulo ?? ''  }}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Ativo</label>
                                            <select class="form-control" name="ativo">
                                                <option value="1">SIM</option>
                                                <option value="0" {{ isset($banner->ativo ) && $banner->ativo == '0' ? 'selected' : '' }}>NÂO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Link</label>
                                            <input type="text" class="form-control" id="link" name="link" placeholder="Domínio" value="{{ $banner->link ?? ''  }}">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </form>
                </div>
                @if(isset($banner->id))
                    <!-- /resources/views/components/adm-galeria-imagens.blade.php -->
                    <x-adm-galeria-imagens titulo="Galeria de Imagens" :xrefid="$banner->id" xrefnome="banner-principal" :imagens="$imagens"/>
                @endif 
            </div>
        </div>
    
    </section>
@stop