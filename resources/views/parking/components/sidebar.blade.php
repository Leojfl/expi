@php($routeName= \Illuminate\Support\Facades\Route::currentRouteName())
<div class="row ">
    <div class="col-md-12 mt-4 d-none d-md-block">
        <b>
            {{\Auth::user()->full_name}}
        </b>
    </div>
    <div class="col-md-12 p-0 mt-3">
        <nav class="nav flex-column">
            @if(Auth::user()->parking->fk_id_parking_type== \App\Models\ParkingType::PARKING ||
            Auth::user()->parking->fk_id_parking_type== \App\Models\ParkingType::PARKING_AND_PENSION)

                <a class="nav-link {{$routeName=='parking_special_users_index'?'active':''}}"
                   href="{{route('parking_special_users_index')}}">
                    Usuarios especiales
                </a>
            @endif
            @if(Auth::user()->parking->fk_id_parking_type== \App\Models\ParkingType::PENSION ||
            Auth::user()->parking->fk_id_parking_type== \App\Models\ParkingType::PARKING_AND_PENSION)
                <a class="nav-link {{$routeName=='parking_pension_users_index'?'active':''}}"
                   href="{{route('parking_pension_users_index')}}">
                    Usuarios de la pension
                </a>
            @endif
            <a class="nav-link {{($routeName=='parking_tariffs_index')?'active':''}}"
               href="{{route('parking_tariffs_index')}}">
                Tarifas
            </a>
            <a class="nav-link {{$routeName=='parking_graphics_index'?'active':''}}"
               href="{{route('parking_graphics_index')}}">
                Graficas
            </a>
        </nav>
    </div>
</div>
