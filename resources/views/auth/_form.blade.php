@php
    /**
    *  @var $user \App\Models\User
    */
    $userId= isset($user)?$user->id:0;
@endphp

<form method="POST" action="{{route('register_post',['userId'=>$userId])}}">
    @csrf
    <div class="row m-0">
        <div class="col-md-12 text-center mt-3">
            <h3>Registro</h3>
        </div>

        <div class="col-md-12 mt-2">
            @include('components.input',[
                'name' => 'name',
                'label' => 'Nombres',
                'value' => isset($user)?$user->name:''
            ])
        </div>

        <div class="col-md-12 mt-2">
            @include('components.input',[
                'name' => 'last_name',
                'label' => 'Apellidos',
                'value' => isset($user)?$user->last_name:''
            ])
        </div>


        <div class="col-md-12 mt-2">
            @include('components.input',[
                'name' => 'email',
                'label' => 'Correo',
                'value' => isset($user)?$user->email:''
            ])
        </div>

        <div class="col-md-12 mt-2">
            @include('components.input',[
                'name' => 'password',
                'label' => 'Contraseña',
                'type' => 'password'
            ])
        </div>


        <div class="col-md-12 mt-2">
            @include('components.input',[
                'name' => 'name_parking',
                'label' => 'Nombre del estacionamiento',
                'value' => isset($user)?$user->name:''
            ])
        </div>





        <div class="col-md-12 text-center mt-3">
            <button class="btn btn-primary">
                {{isset($user)?'Guardar':'Registar'}}
            </button>
        </div>
    </div>
</form>
