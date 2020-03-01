@php
    /**
    * @var $user \App\Models\User
    */

@endphp

@extends('template.main')
@section('content')
    <div class="row">
        <div class="col-md-12 text-right mt-5">
            <a class="btn btn-primary">Agregar</a>
        </div>
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">
asd
                </div>
                <div class="card-body">
                    @foreach($users as $user)
                        {{$user->full_name}}
                    @endforeach
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

