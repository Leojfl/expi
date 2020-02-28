@extends('template.main')
@section('content')
<div class="row " style="height: calc(100vh - 100px)">
    <div class="col-md-6 mx-auto align-self-center">
        <div class="card shadow ">
            <div class="card-body">
            <form method="POST" action="{{route('login_post')}}">
                @csrf
                    <div class="row m-0">
                        <div class="col-md-12 text-center">
                            <img src="{{asset('img/expin.jpg')}}" height="70"/>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <h3>Iniciar  sessión</h3>
                        </div>

                        <div class="col-md-12 mt-2">
                            @include('components\input',[
                                'name' => 'email',
                                'label' => 'Correo'
                            ])
                        </div>
                        <div class="col-md-12 mt-2">
                            @include('components\input',[
                                'name' => 'password',
                                'label' => 'Contraseña',
                                'type' => 'password'
                            ])
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <button class="btn btn-primary">
                                Iniciar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
