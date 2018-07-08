@extends('layouts.app-summernote')

@section('content')
<div class="container">
    <div class="form-horizontal">
    
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Nama</label>

            <div class="col-md-6">
                
                {{ $qa->penanya->fullname }}
                
            </div>
        </div>

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="col-md-4 control-label">Usia</label>

            <div class="col-md-6">
                
                {{ $qa->penanya->usia }}
                
            </div>
        </div>
 

        <div class="form-group{{ $errors->has('ket_surat_keluar') ? ' has-error' : '' }}">
            <label for="ket_surat_keluar" class="col-md-4 control-label">Jenis Kelamin</label>

            <div class="col-md-6">
                
                @if($qa->penanya->jk == 0)
                    {{ "Laki-laki" }}
                @else
                    {{ "Perempuan" }}
                @endif
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Pertanyaan</label>

            <div class="col-md-6">
                
                {{ $qa->question }}
                
            </div>
        </div>

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Jawaban</label>

            <div class="col-md-6">
                
                {{ $qa->answer }}
                
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <a href="#" class="btn btn-warning" onclick="open_modal()">Jawab</a>
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
          <p id="modal_body">Jawaban:</p>
          <form action="{{ url('/qa-ustadz/answer/'.$qa->id) }}" method="POST" id="form">
            {{ csrf_field() }}
            <textarea name="answer" id="" cols="75" rows="5"></textarea>
            <input type="submit" value="Jawab" class="btn btn-danger">
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
    function open_modal() {
        $("#myModal").modal();
    }
</script>


@endsection