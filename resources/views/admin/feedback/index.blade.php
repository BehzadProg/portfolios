@extends('admin.layouts.master')

@section('title' , 'Feedback')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Feedback</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Feedbacks</h4>
                            <div class="card-header-action">
                                <a href="{{route('admin.feedback.create')}}" class="btn btn-primary">Create New <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
