@php
    /**
    * @var $user \App\Models\User
    */
@endphp
@extends('template.main')
@push('scripts')
    <script src="{{asset('commons/load_view.js')}}"></script>
    <script src="{{asset('commons/submit_form.js')}}"></script>
    <script src="{{asset('js/parking/user/index.js')}}"
            type="text/javascript"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12 text-right mt-5">
            <a href="{{route('admin_user_upsert',['userId'=>0])}}"
               class="btn btn-primary btn-upsert">Agregar</a>
        </div>

        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">
                    Usuarios  {{($pension)?' de pensión':'especiales'}}
                </div>
                <div class="card-body p-4">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($userSpecials as $user)
                            <tr>
                                <td>
                                    {{$user->full_name}}
                                </td>
                                <td>
                                    <a href="#"
                                    data-url="{{route('admin_user_upsert',['userId'=>$user->id])}}"
                                    class="btn-upsert">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#"
                                    data-url="{{route('admin_user_update_status',['userId'=>$user->id])}}"
                                       class="btn-update-status">
                                        <i class="fas {{$user->active?'fa-toggle-on':'fa-toggle-off'}}"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="2">
                                    <i>
                                        Sin usuarios
                                    </i>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $userSpecials->links() }}
            </div>
        </div>
    </div>
    @include('components.modal',['modalId'=> 'modal-upsert'])
@endsection

