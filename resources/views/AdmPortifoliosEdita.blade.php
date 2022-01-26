@extends('adminlte::page')

@section('title', 'Imóveis')

@section('content_header')
    <h1> Portifolio</h1>
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
                    <form action="/admin/portifolios/salvar" method="post" enctype="multipart/form-data"> 
                        <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
                        @csrf  
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edite um Portifólio</h3>
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
                                                    <label for="exampleInputEmail1">Titulo</label>
                                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo" value="{{ $item->titulo ?? '' }}">
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
                                                    <label for="exampleInputEmail1">Link</label>
                                                    <input type="text" class="form-control" id="link" name="link" placeholder="link" value="{{ $item->link ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="logo">Foto</label>
                                                    @if(!empty($item->imagem))
                                                        <div class="adm-img box-img">
                                                            <img src="/imagens/portifolios/{{ $item->imagem }}" alt="" width="auto" height="100%">
                                                        </div>
                                                    @endif
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input2" id="imagem" name="imagem">
                                                            <label class="custom-file-label" for="imagem">Escolha a Imagem</label>
                                                        </div>
                                                    </div>
                                                    <input type="checkbox" name="remover_imagem" value="S"> Remover Imagem
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
                    </form>
                </div>
                <div class="col-12">
                    <form action="/admin/portifolios/imagem-salvar" method="post" enctype="multipart/form-data"> 
                        <input type="hidden" name="portifolio_id" value="{{ $item->id ?? '' }}">
                        @csrf  
                        
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edite as Imagens do Portifólio</h3>
                                <div class="card-tools">
                                    <button type="submit" class="btn btn-primary ">
                                        <i class="fas fa-save"></i> Salvar
                                    </button>    
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body"> 
            
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="logo">Imagem</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input2" id="portifolio_imagem" name="portifolio_imagem">
                                                    <label class="custom-file-label" for="portifolio_imagem">Escolha a Imagem</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titulo</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título da imagem" value="">
                                        </div>
                                    </div> 
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="galeria-imagens">
                                            <div class="row">
                                                @foreach ($imagens as $imagem)

                                                    <div class="col-3 box-img">
                                                        <a class=" btn btn-danger btn-sm" href="/admin/portifolios/imagem-deletar/{{ $imagem->id }}" style="position: absolute;right: 8px;padding: 0px 5px; top: 8px;">
                                                            <i class="fas fa-trash" style="font-size: 10px;"></i>
                                                        </a>
                                                        <img src="{{asset('/imagens/portifolios/'.$imagem->imagem)}}" alt="" width="100%" height="auto">
                                                        {{ $imagem->titulo }}
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </section>
@stop