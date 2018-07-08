@extends('layouts.app')

@section('content')
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
       <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="nav-item"><a href="#belum_terjawab" aria-controls="lengkap" role="tab" data-toggle="tab" class="nav-link active">Belum Terjawab</a></li>
    <li role="presentation" class="nav-item"><a href="#terjawab" aria-controls="butuh_nomor" role="tab" data-toggle="tab" class="nav-link">Terjawab</a></li>
  </ul><br>   
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane container-fluid active" id="belum_terjawab">
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header row">
                    <div class="col-11">
                        <i class="fa fa-table"></i> Belum Terjawab
                    </div>
                  </div>
                  @include('layouts.table-qa', ['archives' => $belum_terjawab, 'detail' => 'dokter'])
                </div>
          </div>
          <div role="tabpanel" class="tab-pane container-fluid" id="terjawab">
            <!-- Example DataTables Card-->
            <div class="card mb-3">
              <div class="card-header row">
                <div class="col-11">
                    <i class="fa fa-table"></i> Terjawab
                </div>
              </div>
              @include('layouts.table-qa', ['archives' => $terjawab, 'detail' => 'dokter'])
            </div>
          </div>
        </div>
</div>

@endsection