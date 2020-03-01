@php($routeName= \Illuminate\Support\Facades\Route::currentRouteName())
<div class="row ">
    <div class="col-md-12 text-center mt-4 d-none d-md-block">
        <h5>
            {{\Auth::user()->full_name}}
        </h5>
    </div>
    <div class="col-md-12 p-0 mt-3">
        <nav class="nav flex-column">
            <a class="nav-link {{$routeName=='admin_users_index'?'active':''}}"
               href="{{route('admin_users_index')}}">
                Super usuarios
            </a>
            <a class="nav-link {{$routeName=='admin_parking_index'?'active':''}}"
               href="{{route('admin_parking_index')}}">
                Estaciónamoentos
            </a>
            <a class="nav-link {{$routeName=='admin_terms_index'?'active':''}}"
               href="{{route('admin_terms_index')}}">
                Termininos y condiciones
            </a>
            <a class="nav-link {{$routeName=='admin_contacts_index'?'active':''}}"
               href="{{route('admin_contacts_index')}}">
                Contacto
            </a>
        </nav>
    </div>
</div>
