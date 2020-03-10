@php
    $userId= isset($user)?$user->id:0;
@endphp
<form id="form-upsert"
      action="{{route('admin_user_create_post',['userId'=>$userId])}}"
      method="POST">
    <div class="row">
        @csrf
        <div class="col-md-12 text-center">
            <h4>Agregar administrador</h4>
        </div>
        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'name',
            'label'=>'Nombre'
            ])
        </div>
        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'last_name',
            'label'=>'Apellidos'
            ])
        </div>
        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'email',
            'label'=>'Correo'
            ])
        </div>
        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'password',
            'label'=>'Contraseña',
            'type' => 'password'
            ])
        </div>
        <div class="col-md-8 mx-auto">
            <button class="btn btn-primary btn-block">
                Agregar
            </button>
        </div>
    </div>
</form>
