@extends('admin.layouts.master')

@section('title' , 'About Section')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>About Section</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update About Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.about.update' , 1)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                    <div class="col-sm-12 col-md-7">
                                      <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                      </div>
                                    </div>
                                  </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="title" type="text" value="{{$about->title}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripton</label>
                                    <div class="col-sm-12 col-md-7">
                                      <textarea name="description" class="summernote">{!! $about->description !!}</textarea>
                                    </div>
                                  </div>

                                 @if ($about->resume)
                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                      <div>
                                          <i class="fas fa-file-pdf" style="font-size: 50px"></i>
                                          <p>Resume File has been uploaded for replacing select your new file</p>
                                      </div>
                                    </div>
                                  </div>
                                 @endif

                                  <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Resume File</label>
                                    <div class="col-sm-12 col-md-7">
                                      <div class="custom-file">
                                        <input name="resume" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                      </div>
                                    </div>
                                  </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
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
<script>
    $(document).ready(function(){
        $('#image-preview').css({
            'background-image': 'url("{{asset(env('ABOUTME_IMAGE_UPLOAD_PATH').$about->image)}}")',
            'background-size': 'cover',
            'background-position': 'center center'
        })
    });
</script>
@endpush

