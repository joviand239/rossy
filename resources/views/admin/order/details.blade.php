@extends('cms.layouts.authorized')

@section('headerCustom')
    @php
    $id = 0;
    if (!empty($model->getKey())) $id = $model->getKey();

    $title = 'Order Detail';
    $formUrl = url('/admin/order/'.$id);
    $cancelUrl = url('/admin/orders/'.$status.'/'.$customer);
    $language = '';
    $grandTotal = 0;
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
                    <div class="card-header">
                        <span>Order</span>
                        @if(@$model->customer_details->user->roles[0]->name == 'CUSTOMERBIZ')
                            <a type="button" class="btn btn-success btn-xs pull-right @if(@$model->grand_total <= 0) disabled @endif" href="{!! route('invoice', ['order_id' => $model->id, 'id' => 0]) !!}">
                                <i class="icon fa fa-plus"></i>
                                <span class="help-text">Buat Invoice</span>
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Order Number</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $model->order_number }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Order Date</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $model->date }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Customer</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $model->customer_details->first_name }} {{ $model->customer_details->last_name }} ( {{ $model->customer_details->email }} )" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Customer Phone</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $model->customer_details->phone }}" type="text" disabled/>
                                </div>
                            </div>
                            @if(!empty($model->customer_details->company_id))
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Customer Company</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $model->customer_details->company->name }}" type="text" disabled/>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Order Status</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="radio" name="status" value="{{ \App\Util\Constant::STATUS_PENDING }}" @if($model->status == \App\Util\Constant::STATUS_PENDING) checked @endif/> Pending<br/>
                                    <input type="radio" name="status" value="{{ \App\Util\Constant::STATUS_PAID }}" @if($model->status == \App\Util\Constant::STATUS_PAID) checked @endif/> Printing<br/>
                                    <input type="radio" name="status" value="{{ \App\Util\Constant::STATUS_DELIVERY }}" @if($model->status == \App\Util\Constant::STATUS_DELIVERY) checked @endif/> Delivery (Pilihan ini akan mengirim email pemberitahuan ke Customer)<br/>
                                    <input type="radio" name="status" value="{{ \App\Util\Constant::STATUS_COMPLETED }}" @if($model->status == \App\Util\Constant::STATUS_COMPLETED) checked @endif/> Completed<br/>
                                    <input type="radio" name="status" value="{{ \App\Util\Constant::STATUS_CANCELLED }}" @if($model->status == \App\Util\Constant::STATUS_CANCELLED) checked @endif/> Cancelled<br/>
                                    <br/>
                                </div>

                            </div>
                            <br/><br/>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Metode Pengiriman</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $model->delivery_type }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label" for="resi_number">Nomor Resi</label>
                                </div>
                                <div class="col-md-9">
                                    <input name="resi_number" class="form-control" value="{{ $model->resi_number }}" type="text"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Detail Pesanan</div>
                    <div class="card-body">
                        @if(@$model->delivery_type != 'CUSTOM')
                            <div class="row">
                            <table class="table table-striped primary">
                                <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Attribut</th>
                                    <th>Quantity</th>
                                    <th>Harga/item</th>
                                    <th>Total Harga</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($model->order_items as $order_item)
                                    <tr>
                                        <td>{{ $order_item->product->name }}</td>
                                        <td>
                                            <table>

                                                Bahan : {{ $order_item->material->name }}<br/>
                                                Ukuran : {{ $order_item->size->name }}<br/>
                                            @foreach($order_item->attributes as $attribute)
                                                {{ getAttributeTitleDetail($attribute->type,$attribute->subtype) }} : {{ $attribute->name }}<br/>
                                            @endforeach
                                                @if(!empty(GetFileURL($order_item->attachment)))
                                                    <br/>
                                                    {{ ($order_item->product->side_number) > 1 ? 'Sisi Depan': 'File'}}: <a target="_blank" href="{{ GetFileURL($order_item->attachment) }}"> {{ GetFileName($order_item->attachment) }}</a><br/>
                                                @endif
                                                @if(!empty(GetFileURL($order_item->back_side)))
                                                    Sisi Belakang: <a target="_blank" href="{{ GetFileURL($order_item->back_side) }}"> {{ GetFileName($order_item->back_side) }}</a><br/>
                                                @endif
                                                @if(!empty(GetFileURL($order_item->left_side)))
                                                    Sisi Kiri: <a target="_blank" href="{{ GetFileURL($order_item->left_side) }}"> {{ GetFileName($order_item->left_side) }}</a><br/>
                                                @endif
                                                @if(!empty(GetFileURL($order_item->right_side)))
                                                    Sisi Kanan: <a target="_blank" href="{{ GetFileURL($order_item->right_side) }}"> {{ GetFileName($order_item->right_side) }}</a><br/>
                                                @endif
                                                @if(!empty(GetFileURL($order_item->top_side)))
                                                    Sisi Atas: <a target="_blank" href="{{ GetFileURL($order_item->top_side) }}"> {{ GetFileName($order_item->top_side) }}</a><br/>
                                                @endif
                                                <br/>
                                                @if($order_item->notes != '')
                                                    Notes: {{ $order_item->notes }}
                                                    <br>
                                                @endif
                                                @if($order_item->send_pdf_request == 'YES')
                                                    Kirim Proof PDF: {{ $sendPDFRequest[$order_item->send_pdf_request] }}
                                                    <br>
                                                @endif
                                                @if($order_item->send_sample_request == 'YES')
                                                    Kirim Proof Print: {{ $sendSampleRequest[$order_item->send_sample_request] }}
                                                @endif
                                            </table>
                                        </td>
                                        <td class="autonumeric">{{ $order_item->quantity }}</td>
                                        <td class="autonumeric">{{ $order_item->item_price }}</td>
                                        <td class="autonumeric">{{ $order_item->total_price }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="text-right">Sub Total</td>
                                        <td class="autonumeric">{{ $model->total_item_price }}</td>
                                    </tr>
                                    @if(!empty(floatval($model->total_discount)))
                                    <tr>
                                        <td colspan="4" class="text-right">Promo Discount ( {{ $model->promo_code }} )</td>
                                        <td class="autonumeric">{{ $model->total_discount }}</td>
                                    </tr>
                                    @endif
                                    @if(!empty(floatval($model->total_shipping)))
                                    <tr>
                                        <td colspan="4" class="text-right">Shipping ( {{ $model->weight_total }} gram )</td>
                                        <td class="autonumeric">{{ $model->total_shipping }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td colspan="4" class="text-right">Grand Total</td>
                                        <td class="autonumeric">{{ $model->grand_total }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        @endif


                        @if(@$model->delivery_type == 'CUSTOM')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="product_name">Nama Produk</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="product_name" class="form-control" value="{{ @$model->order_item_custom->product_name }}" type="text"/>
                                        @foreach(json_decode($model->order_item_custom->attachment) as $attachment)
                                            @if(!empty(GetFileURL([$attachment])))
                                                <a target="_blank" href="{{ GetFileURL([$attachment]) }}"> {{ GetFileName([$attachment]) }}</a>
                                                <br/>
                                            @endif
                                        @endforeach
                                        <br/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="size">Ukuran</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="size" class="form-control" value="{{ @$model->order_item_custom->size }}" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="page">Halaman</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="page" class="form-control" value="{{ @$model->order_item_custom->page }}" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="paper_type">Jenis Kertas</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="paper_type" class="form-control" value="{{ @$model->order_item_custom->paper_type }}" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="delivery_date">Tanggal Pengiriman</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="delivery_date" class="form-control" value="{{ @$model->order_item_custom->delivery_date }}" type="date"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="delivery_time">Jam Pengiriman</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="delivery_time" class="form-control" value="{{ @$model->order_item_custom->delivery_time }}" type="time"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="delivery_address">Alamat Pengiriman</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="delivery_address" class="form-control">{{ @$model->order_item_custom->delivery_address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="quantity">Jumlah</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="quantity" class="form-control" value="{{ @$model->order_item_custom->quantity }}" type="number"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="packing_notes">Catatan Packaging</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="packing_notes" class="form-control">{{ @$model->order_item_custom->packing_notes }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="item_price">Harga per Item</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="item_price" class="form-control" value="{{ @$model->order_item_custom->item_price }}" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="total_price">Harga Total</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="total_price" class="form-control" value="{{ @$model->order_item_custom->total_price }}" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="total_shipping">Harga Pengiriman</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="total_shipping" class="form-control" value="{{ @$model->total_shipping }}" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label" for="admin_notes">Catatan Admin</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="admin_notes" class="form-control">{{ @$model->order_item_custom->admin_notes }}</textarea>
                                    </div>
                                </div>

                                @yield('button')
                            </div>
                        @endif


                    </div>
                </div>

                @if($model->delivery_type == \App\Entity\Order::DELIVERY_TYPE_REGULAR)
                <div class="card">
                    <div class="card-header">Detail Pengiriman</div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">First Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" id="add-address-modal-first_name" value="{{ @$model->shipping_address->first_name }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Last Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" id="add-address-modal-last_name" value="{{ @$model->shipping_address->last_name }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Address Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" id="add-address-modal-address_name" value="{{ @$model->shipping_address->address_name }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" id="add-address-modal-email" value="{{ @$model->shipping_address->email }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Sisi</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" id="add-address-modal-email" value="{{ @$model->shipping_address->jne_city->city_name }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">PostCode</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" id="add-address-modal-email" value="{{ @$model->shipping_address->postcode }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Phone</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" id="add-address-modal-email" value="{{ @$model->shipping_address->phone }}" type="text" disabled/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                        <div class="card-header">Detail Billing</div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">First Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="add-address-modal-first_name" value="{{ @$model->billing_address->first_name }}" type="text" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">Last Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="add-address-modal-last_name" value="{{ @$model->billing_address->last_name }}" type="text" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">Address Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="add-address-modal-address_name" value="{{ @$model->billing_address->address_name }}" type="text" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">Email</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="add-address-modal-email" value="{{ @$model->billing_address->email }}" type="text" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">Sisi</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="add-address-modal-email" value="{{ @$model->billing_address->jne_city->city_name }}" type="text" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">PostCode</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="add-address-modal-email" value="{{ @$model->billing_address->postcode }}" type="text" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">Phone</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="add-address-modal-email" value="{{ @$model->billing_address->phone }}" type="text" disabled/>
                                    </div>
                                </div>

                                @yield('button')
                            </div>
                        </div>
                    </div>
                @elseif($model->delivery_type == \App\Entity\Order::DELIVERY_TYPE_COLLECT)
                <div class="card">
                    <div class="card-header">Detail Pickup</div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $model->pickup_name }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Date Time</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $model->customer_details->pickup_date }} {{ $model->customer_details->pickup_time }}" type="text" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Outlet</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ @$model->outlet->name }}" type="text" disabled/>
                                </div>
                            </div>

                            @yield('button')
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </form>


@endsection

