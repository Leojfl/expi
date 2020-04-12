@php
    $tariffId= isset($tariff)?$tariff->id:0;
@endphp
<form id="form-upsert"
      action="{{route('parking_tariffs_upsert_post',['tariffId'=>$tariffId])}}"
      method="POST">
    <div class="row">
        @csrf
        <div class="col-md-12 text-center">
            <h4>{{isset($tariff)?'Actualizar':'Agregar'}} tarifa</h4>
        </div>
        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'title',
            'label'=>'Titulo',
            'value' => isset($tariff)?$tariff->title:''
            ])
        </div>
        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'price',
            'label'=>'Monto a pagar',
            'value' => isset($tariff)?$tariff->price:''
            ])
        </div>
        <div class="col-md-8 mx-auto">
            @include('components.input',[
            'name' => 'time',
            'label'=>'Tiempo maximo (Minutos)',
            'value' => isset($tariff)?$tariff->time:''
            ])
        </div>
        <div class="col-md-8 mx-auto">
            <button class="btn btn-primary btn-block">
                {{isset($tariff) ?'Guardar'  :'Agregar'}}
            </button>
        </div>
    </div>
</form>
