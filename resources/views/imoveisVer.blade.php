@extends('adminlte::page')

@section('title', 'Imóveis')

@section('content_header')
    <h1> Empreendimento: <br><b>{{ $imovel->nome ?? '' }}</b></h1>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/css/taober.css">
@stop

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Dados do empreendimento</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(session('mensagem_imovel'))
                                <div class="alert alert-success">
                                    <p>{{session('mensagem_imovel')}}</p>
                                </div>
                            @endif
                            <form action="/admin/imoveis/salvar" method="post" enctype="multipart/form-data">       
                                @csrf                        
                                <input type="hidden" name="empreendimento_id" value="{{ $imovel->id ?? '' }}">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Ativo</label>
                                            <select class="form-control" name="ativo">
                                                <option value="1">SIM</option>
                                                <option value="0" {{ isset($imovel->ativo ) && $imovel->ativo == '0' ? 'selected' : '' }}>NÂO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6"></div>
                                    <div class="col-3 text-right">
                                        <div class="form-group">
                                            <br>
                                            @if(isset($imovel->id))
                                            <a href="/admin/imoveis/preview/{{ $imovel->id}}" target="_blank">
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
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ $imovel->nome ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sub-título</label>
                                            <input type="text" class="form-control" id="subtitulo"  name="subtitulo" placeholder="Subtítulo" value="{{ $imovel->subtitulo ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            @if(!empty($imovel->logo))
                                                <div class="adm-img box-img">
                                                    <img src="/imagens/empreendimentos/{{ $imovel->logo }}" alt="" width="100%" height="auto">
                                                </div>
                                            @endif
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="logo" name="logo">
                                                    <label class="custom-file-label" for="logo">Escolha a Imagem</label>
                                                </div>
                                            </div>
                                            <input type="checkbox" name="remover_logo" value="S"> Remover Logo
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fundo">Plano de Fundo</label>
                                            @if(!empty($imovel->fundo))
                                                <div class="adm-img box-img">
                                                    <img src="/imagens/empreendimentos/{{ $imovel->fundo }}" alt="" width="100%" height="auto">
                                                </div>
                                            @endif
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fundo" name="fundo">
                                                    <label class="custom-file-label" for="fundo">Escolha a Imagem</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Domínio</label>
                                            <input type="text" class="form-control" id="dominio" name="dominio" placeholder="Domínio" value="{{ $imovel->dominio ?? ''  }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Youtube URL</label>
                                            <input type="text" class="form-control" id="youtubelink" name="youtubelink" placeholder="Youtube url" value="{{ $imovel->youtubelink ?? ''  }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição</label>
                                    <textarea id="descricao_site" name="descricao_site">{{ $imovel->descricao_site ?? ''  }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Google Analytcs</label>
                                            <input type="text" class="form-control" id="google_analytcs" name="google_analytcs" placeholder="Google Analytcs" value="{{ $imovel->google_analytcs ?? ''  }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Google Search</label>
                                            <input type="text" class="form-control" id="google_search" name="google_search" placeholder="Google Search" value="{{ $imovel->google_search ?? ''  }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Google Maps</label>
                                            <input type="text" class="form-control" id="google_maps" name="google_maps" placeholder="Google Maps" value="{{ $imovel->google_maps ?? ''  }}">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Sessão Imagens</h3>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Título Imagens</label>
                                            <input type="text" class="form-control" id="tituloimagens" name="tituloimagens" placeholder="Titulo imagens" value="{{ $imovel->tituloimagens ?? ''  }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Texto Imagens</label>
                                            <textarea id="textoimagens" name="textoimagens">{{ $imovel->textoimagens ?? ''  }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h3>Sessão Plantas</h3>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Título Plantas</label>
                                            <input type="text" class="form-control" id="tituloplantas" name="tituloplantas" placeholder="Título Plantas" value="{{ $imovel->tituloplantas ?? ''  }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Texto Plantas</label>
                                            <textarea id="textoplantas" name="textoplantas">{{ $imovel->textoplantas ?? ''  }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h2>DESCRICÃO</h2>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="logo">Imagem</label>
                                            @if(!empty($imovel->descricao_fundo))
                                                <div class="adm-img box-img">
                                                    <img src="/imagens/oempreendimento/{{ $imovel->descricao_fundo }}" alt="" width="100%" height="auto">
                                                </div>
                                            @endif
                                            <input type="file" name="descricao_fundo" class="form-control" id="descricao_fundo">
                                        </div>
                                    </div>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titulo 1</label>
                                            <input type="text" class="form-control" name="descricao_titulo" id="descricao_titulo" placeholder="Título" value="{{ $imovel->descricao_titulo ?? ''  }}">
                                        </div>
                                     </div>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Descrição 1</label>
                                            <textarea id="descricao_texto" name="descricao_texto">{{ $imovel->descricao_texto ?? ''  }}</textarea>
                                        </div>
                                     </div>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titulo 2</label>
                                            <input type="text" class="form-control" name="descricao_titulo_2" id="descricao_titulo_2" placeholder="Título"  value="{{ $imovel->descricao_titulo_2 ?? ''  }}">
                                        </div>
                                     </div>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Descrição 2</label>
                                            <textarea id="descricao_texto_2" name="descricao_texto_2">{{ $imovel->descricao_texto_2 ?? ''  }}</textarea>
                                        </div>
                                     </div>
                                </div>                              
                                <br>
                                <h2>DETALHES</h2>
                                <hr>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Ativo</label>
                                            <select class="form-control" name="detalhe_ativo">
                                                <option value="1">SIM</option>
                                                <option value="0" {{ isset($imovel->detalhe_ativo) && $imovel->detalhe_ativo == '0' ? 'selected' : '' }}>NÂO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="logo">Imagem</label>
                                            @if(!empty($imovel->detalhe_fundo))
                                                <div class="adm-img box-img">
                                                    <img src="/imagens/detalhes/{{ $imovel->detalhe_fundo }}" alt="" width="100%" height="auto">
                                                </div>
                                            @endif
                                            <input type="file" name="detalhe_fundo" class="form-control" id="detalhe_fundo">
                                        </div>
                                    </div>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titulo 1</label>
                                            <input type="text" class="form-control" name="detalhe_titulo" id="detalhe_titulo" placeholder="Título" value="{{ $imovel->detalhe_titulo ?? ''  }}">
                                        </div>
                                     </div>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Descrição 1</label>
                                            <textarea id="detalhe_texto" name="detalhe_texto">{{ $imovel->detalhe_texto ?? ''  }}</textarea>
                                        </div>
                                     </div>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titulo 2</label>
                                            <input type="text" class="form-control" name="detalhe_titulo_2" id="detalhe_titulo_2" placeholder="Título"  value="{{ $imovel->detalhe_titulo_2 ?? ''  }}">
                                        </div>
                                     </div>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Descrição 2</label>
                                            <textarea id="detalhe_texto_2" name="detalhe_texto_2">{{ $imovel->detalhe_texto_2 ?? ''  }}</textarea>
                                        </div>
                                     </div>
                                </div>                              
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                @if(isset($imovel->id))
                    <div class="col-4">
                        <!-- /.card-body -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Imagens</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/imoveis/upload" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="tipo" value="imagem">
                                    <input type="hidden" name="empreendimento_id" value="{{ $imovel->id }}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Titulo</label>
                                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="logo">Imagem</label>
                                                <input type="file" name="image" class="form-control" id="imagem">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default btn-sm">
                                                    <i class="fas fa-image"></i> Upload
                                                </button>
                                            </div>
                                        </div>
                                    </div>                              
                                </form>
                                <div class="galeria-imagens">
                                    <div class="row">
                                        @foreach ($imagens as $imagem)
                                            <form action="/admin/imoveis/apagar-imagem" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="tipo" value="imagem">
                                                <input type="hidden" name="id" value="{{$imagem->id}}">
                                                <div class="col-3 box-img">
                                                    <button type="submit" class="btn btn-danger btn-sm excluir" style="    position: absolute;right: 4px;padding: 0px 5px;"><i class="fas fa-trash" style="font-size: 10px;"></i></button>
                                                    <img src="{{asset('/imagens/imagens/cache/395x286_'.$imagem->imagem)}}" alt="" width="100%" height="auto">
                                                    {{ $imagem->titulo }}
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Plantas</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/imoveis/upload" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="empreendimento_id" value="{{ $imovel->id }}">
                                    <input type="hidden" name="tipo" value="planta">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Titulo</label>
                                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="logo">Imagem</label>
                                                <input type="file" name="image" class="form-control" id="imagem">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default btn-sm">
                                                    <i class="fas fa-image"></i> Upload
                                                </button>
                                            </div>
                                        </div>
                                    </div>                              
                                </form>
                                <div class="galeria-imagens">
                                    <div class="row">
                                        @foreach ($plantas as $planta)
                                            <form action="/admin/imoveis/apagar-imagem" method="post">
                                                @csrf
                                                <input type="hidden" name="tipo" value="planta">
                                                <input type="hidden" name="id" value="{{$planta->id}}">
                                                <div class="col-3 box-img">
                                                    <button type="submit" class="btn btn-danger btn-sm excluir" style="    position: absolute;right: 4px;padding: 0px 5px;"><i class="fas fa-trash" style="font-size: 10px;"></i></button>
                                                    <img src="{{asset('/imagens/plantas/cache/395x286_'.$planta->imagem)}}" alt="" width="100%" height="auto">
                                                    {{ $planta->titulo }}
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@stop

@section('js')
    <script src="/vendor/summernote/summernote-bs4.min.js"></script>
    <script>
        $('#data-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#descricao_site').summernote({height: 150});
        $('#textoimagens').summernote({height: 150});
        $('#textoplantas').summernote({height: 150});
        $('#descricao_texto').summernote({height: 150});
        $('#descricao_texto_2').summernote({height: 150});
        $('#detalhe_texto').summernote({height: 150});
        $('#detalhe_texto_2').summernote({height: 150});
    </script>
@stop