@extends('cms.layouts.authorized')

@section('title', 'Page')

@section('headerCustom')
	@php
    $title = $model::getTitleIndex();
	@endphp
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header card-header-add ">
                    <span>{{ $title }}</span>
                    {{--<a type="button" class="btn btn-success btn-xs pull-right" href=" {{ url('/admin/ordertion/0') }}">
                        <i class="icon fa fa-plus"></i>
                        <span class="help-text">Buat Order Baru</span>
                    </a>--}}
                </div>
                <div class="card-body no-padding">
                    <table class="datatable table table-striped primary">
                        <thead>
                        <tr>
                            @foreach($model::INDEX_FIELD as $field)
                            <th>{{ keyToLabel($field) }}</th>
                            @endforeach
                                <th>Customer</th>

                            @if($customer_type == 'CUSTOMERBIZ')
                                <th>Company</th>
                                <th>Status Pembayaran</th>
                            @endif
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $item)
                            <tr>
                                @foreach($model::INDEX_FIELD as $field)
                                    @if($field == 'delivery_type')
                                        @if($customer_type == 'CUSTOMERBIZ')
                                            <td>{{ getOrderTypeAttribute($item->getValue($field,'','')) }}</td>
                                        @else
                                            <td>{{ getDeliveryTypeAttribute($item->getValue($field,'','')) }}</td>
                                        @endif

                                    @elseif($field == 'status')
                                        <td>{{ getOrderStatusName($item->getValue($field,'','')) }}</td>
                                    @else
                                        <td @if($field == 'grand_total') class="autonumeric" @endif>{{ $item->getValue($field, '', '') }}</td>
                                    @endif
                                @endforeach
                                    <td>{!! $item->customer_details->first_name !!} {!! $item->customer_details->last_name !!}</td>
                                @if($customer_type == 'CUSTOMERBIZ')
                                    <td>{!! $item->customer_details->company_name !!}</td>
                                    <td>{!! $item->payment_status !!}</td>
                                @endif
                                <td class="text-center td-button">
                                    <a href="{{ url('/admin/order/'.$item->id) }}">
                                        <button type="button" class="btn btn-default btn-xs"> Lihat Detail</button>
                                    </a>

                                    @if($customer_type == 'CUSTOMERBIZ')
                                        <a href="{!! route('invoice', ['order_id' => $item->id, 'id' => 0]) !!}">
                                            <button type="button" class="btn btn-default btn-xs" @if(@$item->grand_total <= 0) disabled @endif> Buat Invoice</button>
                                        </a>
                                        <a href="{!! route('invoices-by-id', ['id' => $item->id]) !!}">
                                            <button type="button" class="btn btn-default btn-xs"> List Invoice</button>
                                        </a>
                                    @endif
                                    {{--<button type="button" class="btn btn-default btn-xs delete-button-modal" data-toggle="modal" data-target="#modal-delete-alert" data-url="{{ url('/admin/order/delete/'.$item->id) }}"> Delete</button>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
