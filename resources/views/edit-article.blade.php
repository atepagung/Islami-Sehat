@extends('layouts.app-summernote')

@section('content')

<div class="container">

    <form class="form-horizontal" method="POST" action="{{ url('articles/edit/'.$article->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ $article->title }}" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="col-md-4 control-label">Content</label>

            <div class="col-md-6">
                <textarea id="summernote" class="form-control" name="content" required>{!! $article->content !!}</textarea>
            </div>
        </div>
 

        <div class="form-group{{ $errors->has('ket_surat_keluar') ? ' has-error' : '' }}">
            <label for="ket_surat_keluar" class="col-md-4 control-label">Kategori</label>

            <div class="col-md-6">
                <!-- <textarea id="ket_surat_keluar" class="form-control" name="ket_surat_keluar" required></textarea> -->
                <div class="input-group mb-3">
                  <select class="custom-select" id="inputGroupSelect01" name="category">
                    @if($article->category == 'Category 1')
                        
                        <option value="Category 1" selected>Category 1</option>
                        <option value="Category 2">Category 2</option>
                        <option value="Category 3">Category 3</option>
                    @elseif($article->category == 'Category 2')
                        <option value="Category 1">Category 1</option>
                        <option value="Category 2" selected>Category 2</option>
                        <option value="Category 3">Category 3</option>
                    @else
                        <option value="Category 1">Category 1</option>
                        <option value="Category 2">Category 2</option>
                        <option value="Category 3" selected>Category 3</option>
                    @endif
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
                <input type="file" name="image" onchange="preview_image(event)">
                <br>
                <img src="{{ asset('storage/'.$article->picture) }}" id="output_image" width="70px"/>

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