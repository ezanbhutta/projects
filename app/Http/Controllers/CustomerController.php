<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Ledger;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers as c')->join('orders as o', 'o.customer_id', '=', 'c.id')->get();
        $customer_dates = [];
        foreach ($customers as $customer) {
            if ($customer) {
                $customer_dates[$customer->id] = Sale::where('customer_id', $customer->id)->first()->date ?? "";
            } else {
                $customer_dates[$customer->id] = [];
            }
        }
        return view('Customers.view', compact("customers", "customer_dates"));
    }
    public function orders()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        if ($user->role == "Admin") {
            $orders = DB::table('orders as o')
                ->join('customers as c', 'c.id', '=', 'o.customer_id')
                ->orderBy('o.id', 'desc')->get();
            return view('Pages.orders', compact("orders"));
        } else {
            $orders = DB::table('orders as o')
                ->join('customers as c', 'c.id', '=', 'o.customer_id')
                ->where('c.email', $user->email)
                ->orderBy('o.id', 'desc')->get();
            return view('Pages.orders', compact("orders"));
        }
    }
    public function orderDetails($order_key)
    {
        $order = DB::table('orders as o')
            ->join('customers as c', 'o.customer_id', '=', 'c.id')
            ->join('sales as s', 'o.order_key', '=', 's.order_key')
            ->join('products as p', 's.product_id', '=', 'p.id')
            ->join('categories as ca', 'p.category', '=', 'ca.id')
            ->where('o.order_key', $order_key)
            ->first();
        $order_items = DB::table('orders as o')
            ->join('customers as c', 'o.customer_id', '=', 'c.id')
            ->join('sales as s', 'o.order_key', '=', 's.order_key')
            ->join('products as p', 's.product_id', '=', 'p.id')
            ->join('categories as ca', 'p.category', '=', 'ca.id')
            ->where('o.order_key', $order_key)
            ->get();
        return view('Pages.order_details', compact("order", "order_items"));
    }
    public function orders_filteration(Request $request)
    {
        $dateRange = explode(' - ', $request->input('daterange'));
        if (count($dateRange) == 2) {
            $start_date = date("Y-m-d", strtotime(trim($dateRange[0])));
            $end_date = date("Y-m-d", strtotime(trim($dateRange[1])));
        } else {
            $start_date = $end_date = date("Y-m-d", strtotime($request->input('daterange')));
        }
        $allorders = DB::table('orders as o')
            ->join('customers as c', 'c.id', '=', 'o.customer_id')
            ->whereBetween('o.created_at', [$start_date, $end_date])
            ->orderBy('o.id', 'desc')->get();
        $array_orders = [];
        foreach ($allorders as $order) {
            $array_orders[] = [
                'order_key' => '<a href="' . url('order/details/' . $order->order_key) . '">' . str_replace('order_key_', '', $order->order_key) . '</a>',
                'name' => $order->name,
                'email' => $order->email,
                'contact_no' => $order->contact_no,
                'date' => date('M j, Y', strtotime($order->created_at)),
                'status' => $this->getOrderStatusBadge($order->order_status),
                'payment_method' => '<span class="badge bg-info">' . $order->payment_method . '</span>',
                'delete_button' => '<a href="' . url('/order/details/' . $order->order_key) . '"
                                                class="btn btn-primary text-white btn-sm"><i class="fas fa-eye"></i>
                                                Details</a>',
            ];
        }
        return response()->json([
            "data" => $array_orders,
        ]);
    }
    private function getOrderStatusBadge($status)
    {
        switch ($status) {
            case 'Processing':
                return '<span class="badge bg-danger">' . __('Processing') . '</span>';
            case 'Delivered':
                return '<span class="badge bg-success">' . __('Delivered') . '</span>';
            case 'Cancelled':
                return '<span class="badge bg-warning">' . __('Cancelled') . '</span>';
            default:
                return '<span class="badge bg-secondary">' . __('Unknown') . '</span>';
        }
    }
}
