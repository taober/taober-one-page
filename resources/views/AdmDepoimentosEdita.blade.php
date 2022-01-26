@extends('adminlte::page')

@section('title', 'Imóveis')

@section('content_header')
    <h1> Depoimento</h1>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/css/taober.css">
@stop

@section('content')

    <section class="content">
        <form action="/admin/depoimentos/salvar" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
            @csrf  
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edite um Depoimento</h3>
                                <div class="card-tools">
                                    @if(isset($item->id))
                                        <a href="/admin/site/preview/{{ $item->id}}" target="_blank">
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
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Ativo</label>
                                                    <select class="form-control" name="ativo">
                                                        <option value="1">SIM</option>
                                                        <option value="0" {{ isset($item->ativo ) && $item->ativo == '0' ? 'selected' : '' }}>NÂO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Autor</label>
                                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ $item->nome ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Empresa</label>
                                                    <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa" value="{{ $item->empresa ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Cargo</label>
                                                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="cargo" value="{{ $item->cargo ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="logo">Foto</label>
                                                    @if(!empty($item->foto))
                                                        <div class="adm-img box-img">
                                                            <img src="/imagens/depoimentos/{{ $item->foto }}" alt="" width="auto" height="100%">
                                                        </div>
                                                    @endif
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input2" id="foto" name="foto">
                                                            <label class="custom-file-label" for="foto">Escolha a Imagem</label>
                                                        </div>
                                                    </div>
                                                    <input type="checkbox" name="remover_foto" value="S"> Remover Foto
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Descrição</label>
                                            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Domínio" value="{{ $item->descricao ?? ''  }}">
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