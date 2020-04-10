@php
    $userId= isset($user)?$user->id:0;
@endphp
<form id="form-upsert"
      action="{{route('parking_user_special_upsert_post',['userId'=>$userId])}}"
      method="POST">
    <div class="row">
        @csrf
        <div class="col-md-12 text-center">
            <h4>Agregar usuario  {{($pension)?'de la pensión':''}}</h4>
        </div>
        @if($pension)
            <input type="hidden" name="pension" value="1">
            @endif

        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'name',
            'label'=>'Nombre',
            'value' => isset($user)?$user->name:''
            ])
        </div>
        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'last_name',
            'label'=>'Apellidos',
            'value' => isset($user)?$user->last_name:''
            ])
        </div>
        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'email',
            'label'=>'Correo',
            'value' => isset($user)?$user->email:''
            ])
        </div>
        <div class="col-md-8 mx-auto">
            <button class="btn btn-primary btn-block">
                {{isset($user) ?'Guardar'  :'Agregar'}}
            </button>
        </div>
    </div>
</form>
