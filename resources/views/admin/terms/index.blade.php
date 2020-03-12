@php
    /**
    * @var $user \App\Models\User
    */
@endphp
@extends('template.main')
@push('scripts')
    <script src="{{asset('commons/load_view.js')}}"></script>
    <script src="{{asset('commons/submit_form.js')}}"></script>
    <script src="{{asset('js/admin/index.js')}}"
            type="text/javascript"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">
                    Terminos y condiciones
                </div>
                <div class="card-body p-4">
                </div>
            </div>
        </div>
    </div>
    @include('components.modal',['modalId'=> 'modal-upsert'])
@endsection

