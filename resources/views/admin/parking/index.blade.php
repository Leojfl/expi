@php
    /**
    * @var $user \App\Models\User
    */
@endphp
@extends('template.main')
@push('scripts')
    <script src="{{asset('commons/load_view.js')}}"></script>
    <script src="{{asset('commons/submit_form.js')}}"></script>
    <script src="{{asset('js/admin/parking/index.js')}}"
            type="text/javascript"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">
                    Estacionamientos registrados
                </div>
                <div class="card-body p-4">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Usuario responsable</th>
                            <th>Nombre del establecimiento</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($parkings as $parking)
                            <tr>
                                <td>
                                    {{$parking->user->full_name}}
                                </td>
                                <td>
                                    {{$parking->name}}
                                </td>
                                <td style="color: #F39C12">
                                    @for($i=1; $i<=5; $i++)
                                            <i class="{{($i<=$parking->ranking)?'fas':'far'}} fa-star"></i>
                                    @endfor
                                </td>
                                <td>

                                </td>
                                <td>
                                    <a href="{{route('admin_parking_update_status',['parkingId'=>$parking->id])}}"
                                       class="btn-update-status">
                                        <i class="fas {{$parking->active?'fa-toggle-on':'fa-toggle-off'}}"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="2">
                                    <i>
                                        Sin estacionamientos
                                    </i>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $parkings->links() }}
            </div>
        </div>
    </div>
    @include('components.modal',['modalId'=> 'modal-upsert'])
@endsection

