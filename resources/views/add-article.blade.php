@extends('layouts.app-summernote')

@section('content')

<div class="container">

    <form class="form-horizontal" method="POST" action="{{ route('store-article') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" required>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="col-md-4 control-label">Content</label>

            <div class="col-md-6">
                <textarea id="summernote" class="form-control" name="content" required></textarea>
                
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
        </div>
 

        <div class="form-group{{ $errors->has('ket_surat_keluar') ? ' has-error' : '' }}">
            <label for="ket_surat_keluar" class="col-md-4 control-label">Kategori</label>

            <div class="col-md-6">
                <!-- <textarea id="ket_surat_keluar" class="form-control" name="ket_surat_keluar" required></textarea> -->
                <div class="input-group mb-3">
                  <select class="custom-select" id="inputGroupSelect01" name="category">
                      <option value="A">Kesehatan dan Gizi</option>
                      <option value="B">Kesehatan Lingkungan</option>
                      <option value="C">Gaya Hidup</option>
                      <option value="D">Kesehatan Masyarakat</option>
                  </select>
                </div>

                @if ($errors->has('ket_surat_keluar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ket_surat_keluar') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('archive') ? ' has-error' : '' }}">
            <label for="archive" class="col-md-4 control-label">Gambar</label>

            <div class="col-md-6">
                <input type="file" name="image" onchange="preview_image(event)" required>
                <br>
                <img id="output_image" width="70px"/>

                @if ($errors->has('archive'))
                    <span class="help-block">
                        <strong>{{ $errors->first('archive') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>



@endsection