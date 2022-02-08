@extends('adminlte::page')

@section('title', 'Imóveis')

@section('content_header')
    <h1>Sites</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Listagem de Sites</h3>
                    <div class="card-tools">
                        <a href="/admin/portifolios/novo/">
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
                            <th>Titulo</th>
                            <th>Dominio</th>
                            <th width='100'>Ativo</th>
                            <th></th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach ($itens as $item)
                            <tr>
                                <td>{{ $item->titulo }}</td>
                                <td>{{ $item->dominio }}</td>
                                <td>{{ $item->ativo == '0' ? 'Não' : 'Sim'  }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Ações</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                          <a class="dropdown-item" href="/admin/sites/{{ $item->id }}">Editar</a>
                                          <a class="dropdown-item" href="/admin/sites/deletar/{{ $item->id }}">Exluir</a>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Titulo</th>
                            <th>Empresa</th>
                            <th>Ativo</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
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