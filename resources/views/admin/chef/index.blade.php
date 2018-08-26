@extends('cms.layouts.authorized')

@section('title', 'Chef List')

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
                    <a type="button" class="btn btn-success btn-xs pull-right" href=" {{ route('admin.'.strtolower($model::getClassName()), ['id'=>0])}}">
                        <i class="icon fa fa-plus"></i>
                        <span class="help-text">{{ getPrefixTitleDetails() }} {!! $model::getTitle() !!}</span>
                    </a>
                </div>
                <div class="card-body no-padding">
                    <table class="datatable table table-striped primary">
                        <thead>
                        <tr>
                            @foreach($model::INDEX_FIELD as $field)
                            <th>{{ keyToLabel($field) }}</th>
                            @endforeach
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $item)
                            <tr>
                                @foreach($model::INDEX_FIELD as $field)
                                    <td>{{ $item->getValue($field, '', '') }}</td>
                                @endforeach
                                <td class="text-center td-button">
                                    <a href="{{ route('admin.'.strtolower($model::getClassName()), ['id'=>$item->id]) }}">
                                        <button type="button" class="btn btn-default btn-xs"> Edit Details</button>
                                    </a>
                                    <button type="button" class="btn btn-default btn-xs delete-button-modal" data-toggle="modal" data-target="#modal-delete-alert" data-url="{{ route('admin.'.strtolower($model::getClassName().'.delete'), ['id'=>$item->id]) }}"> Delete</button>
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
