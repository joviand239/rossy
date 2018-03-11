<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\OrderItemCustom;
use App\Http\Controllers\CMSCore\Controller;

use App\Util\Constant;
use Illuminate\Support\Facades\Input;
use App\Service\MailerService;

class OrderController extends Controller {
    public function index($status = '', $customer = 'CUSTOMER') {
        if($status == 'all'){
            $orders = Order::with('customer_details.user.roles')
                ->with('order_invoices')
                ->where('status', '!=', Constant::STATUS_COMPLETED)
                ->whereHas('customer_details.user.roles', function ($query) use ($customer) {
                    return $query->where('name', strtoupper($customer));
                })
                ->orderBy('date','desc')
                ->get();

         } else {
            $orders = Order::where('status', $status)
	            ->whereHas('customer_details.user.roles', function ($query) use ($customer) {
		            return $query->where('name', strtoupper($customer));
	            })->get();
        }
	    foreach ($orders as $order){
		    $order->payment_status = 'Belum Lunas';
		    $total_payment = 0;

		    if (count($order->order_invoices) != 0) {
			    foreach ($order->order_invoices as $invoice){
				    if ($invoice->status == 'PAID'){
					    $total_payment += $invoice->amount;
				    }
			    }

			    if ($order->grand_total <= $total_payment) {
				    $order->payment_status = 'Sudah Lunas';
			    }
		    }
	    }
	    return view('admin.order.index', ['list'=>$orders, 'model'=>Order::class, 'customer_type' => $customer]);
    }
    public function details($id) {
        $order = Order::with('customer_details.user.roles')->find($id);

        if($order->status == Constant::STATUS_COMPLETED){
        	$status = 'completed';
        } else {
        	$status = 'all';
        }
	    if ($order->customer_details->user->roles[0]->name == Constant::USER_ROLE_CUSTOMER){
		    $customer = strtolower(Constant::USER_ROLE_CUSTOMER);
	    } else if ($order->customer_details->user->roles[0]->name == Constant::USER_ROLE_CUSTOMERBIZ){
		    $customer = strtolower(Constant::USER_ROLE_CUSTOMERBIZ);
	    }

        $sendPDFRequest = OrderItem::SEND_PROOF_REQUEST;
        $sendSampleRequest = OrderItem::SEND_SAMPLE_REQUEST;

        return view('admin.order.details', ['model'=>$order,'sendPDFRequest' => $sendPDFRequest ,'sendSampleRequest' => $sendSampleRequest, 'customer' => $customer, 'status' => $status]);
    }
    public function save($id) {
        $data = (object)Input::all();
        $order = Order::find($id);
        $customer = 'CUSTOMER';

        $order->status = $data->status;
        $order->resi_number = $data->resi_number;


        if ($order->delivery_type == 'CUSTOM'){
            $order->total_item_price = $data->total_price;
            $order->total_shipping = $data->total_shipping;
            $order->grand_total = $data->total_price + $data->total_shipping;

            $data_item_custom = $data;

            $item_custom = OrderItemCustom::where('order_id', $order->id)->get()->first();
            unset($data_item_custom->status);
            unset($data_item_custom->total_shipping);
            unset($data_item_custom->resi_number);

            $item_custom->fill((array)$data_item_custom)->save();

            $customer = 'CUSTOMERBIZ';
        }


        $order->save();

        if ($order->status == 'DELIVERY') {
            $order_detail = Order::eagerLoadAll()->find($order->id);
            MailerService::orderConfirmation($order_detail);
        }


        $status = 'all';

        if (($order->status != Constant::STATUS_PENDING OR $order->status != Constant::STATUS_CANCELLED) && $order->promo_code != '') {
            MailerService::promoCodeUsageSuccess($order);
        }

        if ($order->status == Constant::STATUS_COMPLETED) $status = Constant::STATUS_COMPLETED;

         return redirect(route('orders', ['status'=>$status, 'customer' => $customer]));
    }
    public function delete($id) {
        $order = Order::find($id);
        if (!empty($order)) $order->delete();
        return redirect(route('orders'));
    }
}
