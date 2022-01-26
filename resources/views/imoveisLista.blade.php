@extends('adminlte::page')

@section('title', 'Imóveis')

@section('content_header')
    <h1>Imóveis</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Listagem de imóveis</h3>
                    <div class="card-tools">
                        <a href="/admin/imoveis/novo/">
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Novo Imóvel
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="data-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Dominio</th>
                                <th>Cadastro</th>
                                <th>Ativo</th>
                                <th></th>
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach ($imoveis as $imovel)
                                <tr>
                                    <td>{{ $imovel->nome }}</td>
                                    <td>{{ $imovel->dominio }}</td>
                                    <td>{{ $imovel->created }}</td>
                                    <td>{{ $imovel->ativo }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">Ações</button>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="/admin/imoveis/{{ $imovel->id }}">Editar</a>
                                            <a class="dropdown-item" href="#">Exluir</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Dominio</th>
                                <th>Cadastro</th>
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