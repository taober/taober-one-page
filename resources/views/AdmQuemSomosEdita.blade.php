@extends('adminlte::page')

@section('title', 'Imóveis')

@section('content_header')
    <h1> Quem Somos</h1>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/css/taober.css">
@stop

@section('content')

    <section class="content">
        <form action="/admin/quem-somos/salvar" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="id" value="{{ $quemSomos->id ?? '' }}">
            @csrf  
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edite seus dados</h3>
                                <div class="card-tools">
                                    @if(isset($quemSomos->id))
                                        <a href="/admin/site/preview/{{ $quemSomos->site_id}}" target="_blank">
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
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Titulo</label>
                                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{ $quemSomos->titulo ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sub-titulo</label>
                                                    <input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Sub-titulo" value="{{ $quemSomos->subtitulo ?? ''  }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Ativo</label>
                                                    <select class="form-control" name="ativo">
                                                        <option value="1">SIM</option>
                                                        <option value="0" {{ isset($quemSomos->ativo ) && $quemSomos->ativo == '0' ? 'selected' : '' }}>NÂO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="logo">Imagem</label>
                                                    @if(!empty($quemSomos->imagem))
                                                        <div class="adm-img box-img">
                                                            <img src="/imagens/{{ $quemSomos->imagem }}" alt="" width="auto" height="100%">
                                                        </div>
                                                    @endif
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="imagem" name="imagem">
                                                            <label class="custom-file-label" for="logo">Escolha a Imagem</label>
                                                        </div>
                                                    </div>
                                                    <input type="checkbox" name="remover_imagem" value="S"> Remover Imagem
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@stop