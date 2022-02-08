@extends('adminlte::page')

@section('title', 'Taober One Page')

@section('css')
    <link rel="stylesheet" href="/vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/css/taober.css">
@stop

@section('content_header')
    <h1> O que fazemos</h1>
@stop

@section('content')

    <section class="content">
        <form action="/admin/o-que-fazemos/salvar" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
            @csrf  
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edite o que Sua empresa faz</h3>
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
                                            <label for="exampleInputEmail1">Titulo</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{ $item->titulo ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Link</label>
                                            <input type="text" class="form-control" id="titulo" name="link" placeholder="link" value="{{ $item->link ?? '' }}">
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
                                
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@stop