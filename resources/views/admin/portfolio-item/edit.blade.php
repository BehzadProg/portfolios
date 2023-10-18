@extends('admin.layouts.master')

@section('title' , 'Edit Portfolio-item')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('admin.portfolio-item.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Portfolio Item</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Portfolio Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.portfolio-item.update' , $portfolioItem->id)}}" method="post" enctype="multipart/form-data">
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
                                        <input name="title" type="text" value="{{$portfolioItem->title}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                      <select name="category_id" class="form-control selectric">
                                        <option>Select</option>

                                        @foreach ($categories as $category)
                                        <option {{$category->id == $portfolioItem->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                      </select>
                                    </div>
                                  </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripton</label>
                                    <div class="col-sm-12 col-md-7">
                                      <textarea name="description" class="summernote">{!!$portfolioItem->description!!}</textarea>
                                    </div>
                                  </div>

                                  <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Client</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="client" type="text" value="{{$portfolioItem->client}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Website</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="website" type="text" value="{{$portfolioItem->website}}" class="form-control">
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
            'background-image': 'url("{{asset(env('PORTFOLIO_ITEM_IMAGE_UPLOAD_PATH') . $portfolioItem->image)}}")',
            'background-size': 'cover',
            'background-position': 'center center'
        })
    });
</script>
@endpush

