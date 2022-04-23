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
                        <input type="hidden" name="pai" value="{{ $node_pai }}">
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
                                    @if(isset($item->node_id) && 1==2)
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
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label>{{$tipo->tipo_labels->ativo}}</label>
                                                    <select class="form-control" name="ativo">
                                                        <option value="1">SIM</option>
                                                        <option value="0" {{ isset($item->node_ativo ) && $item->node_ativo == '0' ? 'selected' : '' }}>NÂO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{$tipo->tipo_labels->titulo}}</label>
                                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{ $item->node_titulo ?? '' }}">
                                                </div>
                                            </div>
                                            @if( $tipo->tipo_labels->sub_titulo !== false)
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">{{$tipo->tipo_labels->sub_titulo}}</label>
                                                        <input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Sub-titulo" value="{{ $item->node_subtitulo ?? '' }}">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if( $tipo->tipo_labels->descricao !== false)
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{$tipo->tipo_labels->descricao}}</label>
                                            <textarea class="form-control" id="conteudo" name="conteudo">{{ $item->node_conteudo ?? ''  }}</textarea>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </form>
                </div>
                @if($tipo->tipo_labels->node_capa && isset($item->node_id))
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Listagem</h3>
                                <div class="card-tools">
                                    <a href="/admin/nodes/novo/{{ $tipo->tipo_nome }}">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus"></i> Novo
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{$tipo->tipo_labels->titulo}}</th>
                                            @if( $tipo->tipo_labels->sub_titulo !== false)
                                                <th>{{$tipo->tipo_labels->sub_titulo}}</th>
                                            @endif
                                            <th width='80' class="text-center">{{$tipo->tipo_labels->ativo}}</th>
                                            <th width='100'></th>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        @foreach ($itens as $item_tr)
                                            <tr>
                                                <td>{{ $item_tr->node_titulo }}</td>
                                                @if( $tipo->tipo_labels->sub_titulo !== false)
                                                    <td>{{ $item_tr->node_subtitulo }}</td>
                                                @endif
                                                <td class="text-center">{{ $item_tr->node_ativo == '0' ? 'Não' : 'Sim'  }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">Ações</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="/admin/nodes/{{ $item_tr->node_id }}">Editar</a>
                                                        <a class="dropdown-item" href="/admin/nodes/deletar/{{ $item_tr->node_id }}">Exluir</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{$tipo->tipo_labels->titulo}}</th>
                                            @if( $tipo->tipo_labels->sub_titulo !== false)
                                                <th>{{$tipo->tipo_labels->sub_titulo}}</th>
                                            @endif
                                            <th width='100' class="text-center">{{$tipo->tipo_labels->ativo}}</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                @endif 
                @if($tipo->tipo_labels->galeria && isset($item->node_id))
                    <!-- /resources/views/components/adm-galeria-imagens.blade.php -->
                    <x-adm-galeria-imagens titulo="Galeria de Imagens" :xrefid="$item->node_id" xrefnome="nodes" :imagens="$imagens"/>
                @endif
            </div>
        </div>
        
    </section>
@stop

@section('js')
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
    </script>
@stop
