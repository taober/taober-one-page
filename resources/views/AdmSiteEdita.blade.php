@extends('adminlte::page')

@section('title', 'Taober One Page')

@section('css')
    <link rel="stylesheet" href="/vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/css/taober.css">
@stop

@section('content_header')
    <h1> Dados do Site</h1>
@stop

@section('content')

    <section class="content">
        <form action="/admin/site/salvar" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="site_id" value="{{ $site->id ?? '' }}">
            @csrf  
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edite os dados principais do seu site</h3>
                                <div class="card-tools">
                                    @if(isset($site->id))
                                        <a href="/admin/site/preview/{{ $site->id}}" target="_blank">
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
                                                        <label>Ativo</label>
                                                        <select class="form-control" name="ativo">
                                                            <option value="1">SIM</option>
                                                            <option value="0" {{ isset($site->ativo ) && $site->ativo == '0' ? 'selected' : '' }}>NÂO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Titulo</label>
                                                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{ $site->titulo ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Domínio</label>
                                                        <input type="text" class="form-control" id="dominio" name="dominio" placeholder="Domínio" value="{{ $site->dominio ?? ''  }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="logo">Logo</label>
                                                @if(!empty($site->logo))
                                                    <div class="adm-img box-img">
                                                        <img src="/imagens/{{ $site->logo }}" alt="" width="auto" height="100%">
                                                    </div>
                                                @endif
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input2" id="logo" name="logo">
                                                        <label class="custom-file-label" for="logo">Escolha a Imagem</label>
                                                    </div>
                                                </div>
                                                <input type="checkbox" name="remover_logo" value="S"> Remover Logo
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Google Analytcs</label>
                                                <input type="text" class="form-control" id="google_analytcs" name="google_analytcs" placeholder="Google Analytcs" value="{{ $site->google_analytcs ?? ''  }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Google Search</label>
                                                <input type="text" class="form-control" id="google_search" name="google_search" placeholder="Google Search" value="{{ $site->google_search ?? ''  }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Google Maps</label>
                                                <input type="text" class="form-control" id="google_maps" name="google_maps" placeholder="Google Maps" value="{{ $site->google_maps ?? ''  }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Facebook</label>
                                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="FAcebook" value="{{ $site->facebook ?? ''  }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Instagram</label>
                                                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" value="{{ $site->instagram ?? ''  }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Linkedin</label>
                                                <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin" value="{{ $site->linkedin ?? ''  }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email:</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ $site->email ?? ''  }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">WhatsApp</label>
                                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Whatsapp" value="{{ $site->whatsapp ?? ''  }}">
                                            </div>
                                        </div>
                                         <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">CSS</label>
                                                <textarea class="form-control" rows="10" id="css" name="css">{{ $site->css ?? ''  }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">JS</label>
                                                <textarea class="form-control" rows="10" id="js" name="js">{{ $site->js ?? ''  }}</textarea>
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