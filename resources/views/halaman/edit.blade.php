@extends('layouts.backend')

@section('content')
<section class="content-header">
  <h1>Ubah Halaman</h1>
  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Ubah Halaman</li>
  </ol>
</section>
<section class="content">
  <div class="card-body">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-body">
            <div class="col-md-9">
              <form action="{{route('halaman.update', $halamans->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{$halamans->judul}}" placeholder="Judul Halaman">
                  @error('judul')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                </div>
                <div class="form-group">
                  <textarea class="form-control @error('konten') is-invalid @enderror" name="konten" id="editor1">{{$halamans->konten}}</textarea>
                  @error('konten')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-send-o"></i> Simpan</button>
                  <a href="{{route('halaman.index')}}" class="btn btn-danger"> Batal</a>
                </div>
                <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" name="gambar" id="image" class="form-control">
                  @error('image')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
                <a href="#" class="thumbnail">
                  <img id="preview-image-before-upload" src="{{asset($halamans->gambar)}}">
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
<script src="{{ asset('themes/back/bower_components/ckeditor/ckeditor.js')}}"></script>
<script>
  $(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('editor1')
//bootstrap WYSIHTML5 - text editor
$('.textarea1').wysihtml5()
})
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>      
$(document).ready(function (e) {  
   $('#image').change(function(){           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]);   
   });  
});
</script>
@endpush