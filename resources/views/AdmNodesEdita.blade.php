@extends('adminlte::page')

@section('title', 'Taober One Page')

@section('css')
    <link rel="stylesheet" href="/vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/css/taober.css">
@stop

@section('content_header')
    <h1> {{ $tipo->tipo_titulo }}</h1>
@stop

@section('content')

    <section class="content">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="/admin/nodes/salvar" method="post" enctype="multipart/form-data"> 
                        <input type="hidden" name="tipo" value="{{ $tipo->tipo_id }}">
                        <input type="hidden" name="id" value="{{ $item->node_id ?? '' }}">
                        @csrf  
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                @if(isset($item->node_id))
                                    <h3 class="card-title">Editar</h3>
                                    @else
                                    <h3 class="card-title">Novo</h3>
                                @endif
                                <div class="card-tools">
                                    @if(isset($item->node_id))
                                        <a href="/admin/site/preview/{{ $item->node_id}}" target="_blank">
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
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Ativo</label>
                                                    <select class="form-control" name="ativo">
                                                        <option value="1">SIM</option>
                                                        <option value="0" {{ isset($item->node_ativo ) && $item->node_ativo == '0' ? 'selected' : '' }}>NÂO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Titulo</label>
                                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{ $item->node_titulo ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sub-titulo</label>
                                                    <input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Sub-titulo" value="{{ $item->node_subtitulo ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Descrição</label>
                                            <textarea class="form-control" id="conteudo" name="conteudo">{{ $item->node_conteudo ?? ''  }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </form>
                </div>
                @if(isset($item->node_id))
                    <!-- /resources/views/components/adm-galeria-imagens.blade.php -->
                    <x-adm-galeria-imagens titulo="Galeria de Imagens" :xrefid="$item->node_id" xrefnome="nodes" :imagens="$imagens"/>
                @endif 
            </div>
        </div>
        
    </section>
@stop
