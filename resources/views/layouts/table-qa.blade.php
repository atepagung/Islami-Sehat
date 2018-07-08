<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Penanya</th>
          <th>Pertanyaan</th>
          <th>Jawaban</th>
          <th>Option</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Tanggal</th>
          <th>Penanya</th>
          <th>Pertanyaan</th>
          <th>Jawaban</th>
          <th>Option</th>
        </tr>
      </tfoot>
      <tbody>
        @foreach($archives as $archive)
          <tr>
            <td>{{ $archive['created_at'] }}</td>
            <td>{{ $archive['penanya']['fullname'] }}</td>
            <td>{{ $archive['question'] }}</td>
            <td>{{ $archive['answer'] }}</td>
            <td>
                <div class="row">
                    <div class="col">
                      @if($detail == "ustadz")
                        <a href="{{ url('qa-ustadz').'/'.$archive['id'] }}" class="btn btn-primary btn-sm" target="_blank" title="Detail" style="width: 70px"><i class="fa fa-external-link"></i> detail</a>
                      @elseif($detail == "dokter")
                        <a href="{{ url('qa-dokter').'/'.$archive['id'] }}" class="btn btn-primary btn-sm" target="_blank" title="Detail" style="width: 70px"><i class="fa fa-external-link"></i> detail</a>
                      @endif
                    </div>
                </div>
            </td>
          </tr>  
        @endforeach
      </tbody>
    </table>
  </div>
</div>