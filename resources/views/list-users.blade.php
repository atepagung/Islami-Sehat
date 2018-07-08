@extends('layouts.app')

@section('content')
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
       <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="nav-item"><a href="#users" aria-controls="lengkap" role="tab" data-toggle="tab" class="nav-link active">Users</a></li>
  </ul><br>   
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane container-fluid active" id="users">
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header row">
                    <div class="col-11">
                        <i class="fa fa-table"></i> Users
                    </div>
                  </div>
                  @include('layouts.table-users', ['archives' => $users, 'detail' => 'dokter'])
                </div>
          </div>
          
        </div>
</div>

@endsection