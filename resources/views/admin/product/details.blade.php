@extends('cms.layouts.authorized')

@section('headerCustom')
    @php
        $id = 0;
        if (!empty($model) && !empty($model->getKey())) $id = $model->getKey();

        if(empty($id)) $title = getPrefixTitleDetails() . ' ' . $model::getTitleDetails();
        else $title = $model::getTitleDetails();

        $formUrl = $model->getUrlDetails(['id' => $id]);
        $cancelUrl = $model->getUrlIndex();

        $language = '';
    @endphp
@endsection

@section('button')

    @include('cms.form.button')

@endsection

@section('content')

    @include('cms.form.errorbox')

    <form id="form" action="{{ $formUrl }}" class="create-project form-horizontal" method="POST"  enctype="multipart/form-data">

        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $model->getTitleDetails() }}</div>
                    <div class="card-body">
                        <div class="row">

                            @include('cms.form.section')

                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Apakah produk memiliki variasi ukuran?</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="varianYes" name="hasVarian" value="1" class="custom-control-input" {!! (@$model->hasVarian) ? 'checked' : '' !!} {!! @$model->isDisabled('hasVarian') !!}>
                                        <label class="custom-control-label" for="varianYes">Ya</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="varianNo" name="hasVarian" value="0" class="custom-control-input" {!! (!$model->hasVarian) ? 'checked' : '' !!} {!! @$model->isDisabled('hasVarian') !!}>
                                        <label class="custom-control-label" for="varianNo">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="priceSection {!! ($model->hasVarian) ? 'hidden' : '' !!}">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">Harga</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp.</span>
                                            <input class="form-control autonumeric" value="{{ $model->price }}" type="text" {{ $model->isRequired('price') }} {{ $model->isDisabled('price') }} label="{{ $model->label('price') }}"/>
                                            <input class="autonumericvalue" id="price" name="price" value="{{ $model->price }}" type="hidden" {{ $model->isDisabled('price') }}/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($id)
                                <div class="varianSection {!! ($model->hasVarian) ? '' : 'hidden' !!}">
                                    <div class="col-md-12">
                                        <div class="card custom-detail-table">
                                            <div class="card-header card-header-add">
                                                <span>Product Varian</span>
                                                <a type="button" class="btn btn-success btn-xs pull-right" href="{!! route('admin.productvarian', ['parentId' => $id, 'id' => 0]) !!}">
                                                    <i class="icon fa fa-plus"></i>
                                                    <span class="help-text">Add Product Varian</span>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <table class="datatable-custom table table-striped primary">
                                                    <thead>
                                                    <tr>
                                                        @foreach(@$modelVarian::INDEX_FIELD as $field)
                                                            <th>{{ keyToLabel($field) }}</th>
                                                        @endforeach
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach (@$model->varians as $item)
                                                        <tr>
                                                            <td>
                                                                {!! @$item->name !!}
                                                            </td>
                                                            <td>
                                                                {!! 'Rp. '.getPriceNumber(@$item->price) !!}
                                                            </td>
                                                            <td class="text-center td-button">
                                                                <a href="{!! route('admin.productvarian', ['parentId' => $id, 'id' => @$item->id]) !!}">
                                                                    <button type="button" class="btn btn-default btn-xs"> Edit Details</button>
                                                                </a>
                                                                <button type="button" class="btn btn-default btn-xs delete-button-modal" data-toggle="modal" data-target="#modal-delete-alert" data-url="{!! route('admin.productvarian.delete', ['id' => @$item->id]) !!}"> Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @yield('button')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>





@endsection


@section('jsCustom')
    <script src="{{ url('/') }}/assets/admin/js/cms.product.js"></script>
@endsection

