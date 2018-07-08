<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Username</th>
          <th>Password</th>
          <th>Fullname</th>
          <th>Usia</th>
          <th>Jenis Kelamin</th>
          <th>Asal Pesantren</th>
          <th>Berat</th>
          <th>Riwayat Penyakit</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Username</th>
          <th>Password</th>
          <th>Fullname</th>
          <th>Usia</th>
          <th>Jenis Kelamin</th>
          <th>Asal Pesantren</th>
          <th>Berat</th>
          <th>Riwayat Penyakit</th>
        </tr>
      </tfoot>
      <tbody>
        @foreach($archives as $archive)
          <tr>
            <td>{{ $archive['username'] }}</td>
            <td>{{ $archive['password'] }}</td>
            <td>{{ $archive['fullname'] }}</td>
            <td>{{ $archive['usia'] }}</td>
            <td>
                @if($archive['jk'] == 0)
                  {{ "Laki-laki" }}
                @elseif($archive['jk'] == 1)
                  {{ "Perempuan" }}
                @endif
            </td>
            <td>{{ $archive['asal_pesantren'] }}</td>
            <td>{{ $archive['berat'] }}</td>
            <td>{{ $archive['riwayat_penyakit'] }}</td>
          </tr>  
        @endforeach
      </tbody>
    </table>
  </div>
</div>