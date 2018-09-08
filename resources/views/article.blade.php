@extends('layouts.app')

@section('content')
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
       <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="nav-item"><a href="#category_1" aria-controls="lengkap" role="tab" data-toggle="tab" class="nav-link active">{{ $title }}</a></li>
  </ul><br>   
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane container-fluid active" id="category_1">
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header row">
                    <div class="col-11">
                        <i class="fa fa-table"></i> {{ $title }}
                    </div>
                    <div class="col-1">
                        <a href="{{ route('add-article') }}" class="btn btn-primary btn-sm">+</a>    
                    </div>
                  </div>
                  @include('layouts.table', ['archives' => $articles, 'red' => 'surat-keluar'])
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
        $("#form2-delete").attr("action", "{{ url('article/') }}" + "/" + id);
    }
</script>

@endsection