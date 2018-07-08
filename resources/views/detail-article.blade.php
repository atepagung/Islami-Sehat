@extends('layouts.app-summernote')

@section('content')

<div class="container">
    <div class="form-horizontal">
    
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-6">
                
                <h1>{{ $article->title }}</h1>
                
            </div>
        </div>

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="col-md-4 control-label">Content</label>

            <div class="col-md-6">
                
                {!! $article->content !!}
                
            </div>
        </div>
 

        <div class="form-group{{ $errors->has('ket_surat_keluar') ? ' has-error' : '' }}">
            <label for="ket_surat_keluar" class="col-md-4 control-label">Kategori</label>

            <div class="col-md-6">
                
                {{ $article->category }}
                
            </div>
        </div>

        <div class="form-group{{ $errors->has('archive') ? ' has-error' : '' }}">
            <label for="archive" class="col-md-4 control-label">Gambar</label>

            <div class="col-md-6">
                
                <br>
                <img id="output_image" width="70px" src="{{ asset('storage/'.$article->picture) }}" />

            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <a href="{{ url('articles/edit/'.$article->id) }}" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger" onclick="open_delete_modal({{ $article->id }})">Hapus</a>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p id="modal_body">Apa anda yakin ingin menghapus Artikel ini?</p>
          <form action="" method="POST" id="form2-delete">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="hidden" id="redirect" name="redirect">
            <input type="submit" value="yakin" class="btn btn-danger">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
    function open_delete_modal(id) {
        $("#myModal").modal();
        $("#form2-delete").attr("action", "{{ url('articles/') }}" + "/" + id);
    }
</script>


@endsection