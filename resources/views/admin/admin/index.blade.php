@php
    /**
    * @var $user \App\Models\User
    */
@endphp
@extends('template.main')
@push('scripts')
    <script src="{{asset('commons/load_view.js')}}"></script>
    <script src="{{asset('js/admin/index.js')}}" type="text/javascript"></script>
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
                    Super usuarios
                </div>
                <div class="card-body p-4">
                    @forelse($users as $user)
                        {{$user->full_name}}
                    @empty
                        <h5 class="text-center  mt-3  ">
                            <i>
                                Sin usuarios
                            </i>
                        </h5>
                    @endforelse
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('components.modal',['modalId'=> 'modal-upsert'])
@endsection

