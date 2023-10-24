@extends('admin.layouts.master')

@section('title' , 'General Settings')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>General Settings</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update General Settings</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.general-setting.update' , 1)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                               @if ($general->logo)
                               <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                    Logo</label>
                                <div class="col-sm-12 col-md-7">
                                   <img class="w-25" src="{{asset(env('GENERAL_SETTING_IMAGE_UPLOAD_PATH').$general->logo)}}" alt="">
                                </div>
                            </div>
                               @endif
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo
                                        </label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input name="logo" type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                               @if ($general->footer_logo)
                               <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                    Footer Logo</label>
                                <div class="col-sm-12 col-md-7">
                                   <img class="w-25" src="{{asset(env('GENERAL_SETTING_IMAGE_UPLOAD_PATH').$general->footer_logo)}}" alt="">
                                </div>
                            </div>
                               @endif
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer Logo
                                        </label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input name="footer_logo" type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                               @if ($general->favicon)
                               <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                    Favicon</label>
                                <div class="col-sm-12 col-md-7">
                                   <img class="w-25" src="{{asset(env('GENERAL_SETTING_IMAGE_UPLOAD_PATH').$general->favicon)}}" alt="">
                                </div>
                            </div>
                               @endif
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Favicon
                                        </label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input name="favicon" type="file" class="custom-file-input" id="customFile">
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
