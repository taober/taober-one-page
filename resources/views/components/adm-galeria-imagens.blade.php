<div class="col-12">
    <form action="/admin/media/imagem-salvar" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="xref_id" value="{{ $xref_id }}">
        <input type="hidden" name="xref_nome" value="{{ $xref_nome }}">
        @csrf  
        
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{ $titulo }}</h3>
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
                        <x-adminlte-input-file name="galeria_imagem" label="Imagem" placeholder="Escolha a imagem" disable-feedback/>
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
                                        <span>{{ $imagem->titulo }}</span>
                                        <div class="btns">
                                            <a class="float-right favoritar" href="/admin/media/imagem-deletar/{{ $imagem->id }}" >
                                                <i class="fas fa-trash" style=""></i>
                                            </a>
                                            <a class="float-left excluir" href="/admin/media/imagem-favoritar/{{ $imagem->id }}" >
                                                <i class="{{ ($imagem->favorita == 1) ? 'fas' : 'far'}} fa-star"></i>
                                            </a>
                                        </div>
                                        <img src="{{asset('/imagens/'.$imagem->imagem)}}" alt="" width="100%" height="auto">
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