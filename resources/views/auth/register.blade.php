@extends('template.main')
@section('content')
    <div class="row py-3 " style="min-height: calc(100vh - 100px)">
        <div class="col-md-6 mx-auto align-self-center">
            <div class="card shadow ">
                <div class="card-body">
                    @include('auth._form',['user'=> $user??null])
                </div>
            </div>
        </div>
    </div>
@endsection
