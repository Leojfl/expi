@php
    /**
    * @var $user \App\Models\User
    */
@endphp
@extends('template.main')
@push('scripts')
    <script src="{{asset('commons/load_view.js')}}"></script>
    <script src="{{asset('commons/submit_form.js')}}"></script>
    <script src="{{asset('js/parking/tariff/index.js')}}"
            type="text/javascript"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12 text-right mt-5">
            <a href="#"
               data-url="{{route('parking_tariffs_upsert',['tariffId'=>0])}}"
               class="btn btn-primary btn-upsert">Agregar</a>
        </div>
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">
                    Tarifas
                </div>
                <div class="card-body p-4">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Monto</th>
                            <th>Tiempo</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tariffs as $tariff)
                            <tr>
                                <td>
                                    {{$tariff->title}}
                                </td>
                                <td>
                                    ${{number_format($tariff->price,2)}}
                                </td>
                                <td>
                                    {{$tariff->full_time}}
                                </td>
                                <td>
                                    <a href="#"
                                       data-url="{{route('parking_tariffs_update_status',['tariffId'=>$tariff->id])}}"
                                       class="btn-update-status">
                                        <i class="fas {{$tariff->active?'fa-toggle-on':'fa-toggle-off'}}"></i>
                                    </a>
                                    &nbsp;

                                    <a href="#"
                                       data-url="{{route('parking_tariffs_upsert',['tariffId'=>$tariff->id])}}"
                                       class="btn-upsert">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">
                                    <i>
                                        Sin tarifas
                                    </i>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $tariffs->links() }}
            </div>
        </div>
    </div>
    @include('components.modal',['modalId'=> 'modal-upsert'])
@endsection

