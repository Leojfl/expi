@php
    /**
    * @var $user \App\Models\User
    */
@endphp
@extends('template.main')
@push('scripts')
    <script src="{{asset('js/parking/graphic/index-react.js')}}"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6 mt-2 p-0">
            <h3>Graficas</h3>
        </div>
        <div class="col-md-10 mx-auto" id="div-width"> &nbsp;</div>
        <input id="inp-url-graphic" type="hidden" value="{{route('parking_graphics_content')}}">
        <div class="col-md-12" id="root">
        </div>
    </div>
@endsection

