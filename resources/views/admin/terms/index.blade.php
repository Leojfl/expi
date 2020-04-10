@php
    /**
    * @var $user \App\Models\User
    */
@endphp
@extends('template.main')
@push('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@push('scripts')
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{asset('js/admin/terms/index.js')}}"
            type="text/javascript"></script>
@endpush
@section('content')
    <div class="row h-100">
        <div class="col-md-12 mt-5">
            <div class="card shadow ">
                <div class="card-header">
                    Terminos y condiciones
                </div>
                <div class="card-body p-4">
                    <div class="row m-0 mt-1">
                        <div class="col-12 pb-5">
                            <div id="editor">
                                {!! $terms->terms !!}
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <button class="btn btn-primary btn-upsert"
                                    data-url="{{route('terms_upsert')}}"
                                    data-token="{{csrf_token()}}">
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('components.modal',['modalId'=> 'modal-upsert'])
@endsection

