<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');

use App\Models\{Attendance, Campaign, Category, Classes, Contact, Conversation, Courses, Customer, Degree, Email_Campaign, Fee, Group, Ledger, Level_Two, Order, Plan, Product, PurchaseProducts, QuantityUnit, Sale, Stock, User};
use Faker\Core\Number;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use LDAP\Result;
use PhpParser\Node\Stmt\Return_;

class PagesController extends Controller
{
    public function home()
    {
        $categories = Category::latest()->get();
        $products = Product::latest()->get();
        $product_stock = [];
        foreach ($products as $product) {
            $stock = Stock::where('product_id', $product->id)->first();
            if ($stock) {
                $product_stock[$product->id] = $stock->product_stock;
            } else {
                $product_stock[$product->id] = 0;
            }
        }
        return view('Pages.home', compact("categories", "products", "product_stock"));
    }
    public function about()
    {
        return view('Pages.about');
    }
    public function shop()
    {
        $categories = Category::latest()->get();
        $categories_products = [];
        foreach ($categories as $getcategory) {
            $products_of_category = Product::where('category', $getcategory->id)->count();
            if ($products_of_category) {
                $categories_products[$getcategory->id] = $products_of_category;
            } else {
                $categories_products[$getcategory->id] = 0;
            }
        }
        $products = Product::latest()->paginate(10);
        $product_stock = [];
        foreach ($products as $product) {
            $stock = Stock::where('product_id', $product->id)->first();
            if ($stock) {
                $product_stock[$product->id] = $stock->product_stock;
            } else {
                $product_stock[$product->id] = 0;
            }
        }
        return view('Pages.shop', compact('products', 'categories', 'categories_products', 'product_stock'));
    }
    public function contact()
    {
        return view('Pages.contact');
    }
    public function add_to_cart(Request $request)
    {
        if (session()->has('user_added')) {
            $product = Product::where('id', $request->product_id)->first();
            $alredy_exists = Sale::where(['product_id' => $product->id, 'status' => 0, 'customer_id' => session()->get('user_added')])->first();
            if ($alredy_exists) {
                return response()->json([
                    "message" => 300,
                ]);
            } else {
                Sale::create([
                    'product_id' => $product->id,
                    'product_quantity' => $request->quantity,
                    'status' => 0,
                    'date' => date('Y-m-d'),
                    "price" => $product->product_price,
                    "customer_id" => session('user_added'),
                ]);
                return response()->json([
                    "message" => 200,
                    'cart_items' => Sale::where(['customer_id' => session()->get('user_added'), 'status' => 0])->count(),
                ]);
            }
        } else {
            return response()->json([
                "message" => 400,
            ]);
        }
    }
    public function get_category($id)
    {
        $category = Category::where('id', $id)->first();
        $categories = Category::latest()->get();
        $categories_products = [];
        foreach ($categories as $getcategory) {
            $products_of_category = Product::where('category', $getcategory->id)->count();
            if ($products_of_category) {
                $categories_products[$getcategory->id] = $products_of_category;
            } else {
                $categories_products[$getcategory->id] = 0;
            }
        }
        $products = Product::where('category', $category->id)->paginate(10);
        $product_stock = [];
        foreach ($products as $product) {
            $stock = Stock::where('product_id', $product->id)->first();
            if ($stock) {
                $product_stock[$product->id] = $stock->product_stock;
            } else {
                $product_stock[$product->id] = 0;
            }
        }
        return view('Pages.category', compact('category', 'products', 'categories', 'categories_products', 'product_stock'));
    }
    public function productDetials($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::where('id', $product->category)->first();
        $related_products = Product::where('category', $category->id)->get();
        $product_stock = [];
        foreach ($related_products as $product) {
            $stock = Stock::where('product_id', $product->id)->first();
            if ($stock) {
                $product_stock[$product->id] = $stock->product_stock;
            } else {
                $product_stock[$product->id] = 0;
            }
        }
        $stock = Stock::where('product_id', $product->id)->first();
        return view('Pages.product_details', compact("product", "category", "related_products", "stock", "product_stock"));
    }
    public function signin()
    {
        if (session()->has('user_added')) {
            return redirect('/')->with('error', 'already login');
        } else {
            return view('authentication.signin');
        }
    }
    public function register()
    {
        return view('authentication.signup');
    }
    public function logout()
    {
        if (session()->has('user_added')) {
            session()->forget('user_added');
            return redirect('/login');
        } else {
            return redirect('/');
        }
    }
    public function otp()
    {
        if (session('admin_check') != '') {
            return view('authentication.otp');
        } else {
            return redirect('/')->with('error', 'Please Enter The Credentials First..!');
        }
    }
    public function forget()
    {
        return view('authentication.forget');
    }
    public function reset()
    {
        return view('authentication.reset');
    }
    public function offline()
    {
        return view('authentication.offline');
    }
    public function dashboard()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        if ($user->role == "Admin") {
            $orders = DB::table('orders as o')
                ->join('customers as c', 'c.id', '=', 'o.customer_id')
                ->orderBy('o.id', 'desc')->count();
            $todayOrders = DB::table('orders as o')
                ->join('customers as c', 'c.id', '=', 'o.customer_id')
                ->whereDate('o.created_at', date('Y-m-d'))
                ->orderBy('o.id', 'desc')->count();
            $totalCategories = Category::where('added_from', session()->get('user_added'))->latest()->count();
            $totalProducts = Product::where('added_from', session()->get('user_added'))->latest()->count();
            $totalUnits = QuantityUnit::where('added_from', session()->get('user_added'))->latest()->count();
            return view('Pages.dashboard', compact("user", "orders", "todayOrders", "totalCategories", "totalUnits", "totalProducts"));
        } else {
            $orders = DB::table('orders as o')
                ->join('customers as c', 'c.id', '=', 'o.customer_id')
                ->where('c.email', $user->email)
                ->orderBy('o.id', 'desc')->count();
            $todayOrders = DB::table('orders as o')
                ->join('customers as c', 'c.id', '=', 'o.customer_id')
                ->where('c.email', $user->email)
                ->whereDate('o.created_at', date('Y-m-d'))
                ->orderBy('o.id', 'desc')->count();
            return view('Pages.dashboard', compact("user", "orders", "todayOrders"));
        }
    }
    public function profile()
    {
        $user = DB::table('users')->where("id", session()->get('user_added'))->first();
        $orders = DB::table('orders as o')
            ->join('customers as c', 'c.id', '=', 'o.customer_id')
            ->where('c.email', $user->email)
            ->orderBy('o.id', 'desc')->count();
        return view('Pages.profile', compact("user", "orders"));
    }
    public function get_profile()
    {
        $user = DB::table('users')->where("id", session()->get('user_added'))->first();
        return view('Pages.get_profile', compact("user"));
    }
    public function getGmailPage()
    {
        return view('authentication.gmail');
    }
    public function updateProfile(Request $request)
    {
        User::where('id', $request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "contact_no" => $request->contact_no,
            "password" => Hash::make($request->password),
            "temp_password" => $request->password,
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
    public function getupdateProfile(Request $request, $id)
    {
        User::where('id', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "contact_no" => $request->contact_no,
            "password" => Hash::make($request->password),
            "temp_password" => $request->password,
            "address" => $request->address,
            "labour_cost" => $request->labour_cost,
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
    public function change_password()
    {
        $user = DB::table('users')->where("id", session()->get('user_added'))->first();
        return view('authentication.change_password', compact("user"));
    }
    public function update_password(Request $request)
    {
        $request->validate([
            "password" => 'required|confirmed',
            "password_confirmation" => 'required',
        ]);
        $user = DB::table('users')->where("id", session()->get('user_added'))->first();
        User::where('id', $user->id)->update([
            "password" => Hash::make($request->password),
            "temp_password" => $request->password,
        ]);
        return response()->json([
            "message" => "update_password",
        ]);
    }
    public function cart()
    {
        $cart_items = Sale::where('customer_id', session()->get('user_added'))->where('status', 0)->get();
        foreach ($cart_items as $items) {
            $items->product_id = Product::where('id', $items->product_id)->first();
        }
        return view('Pages.cart', compact("cart_items"));
    }
    public function remove_cart_item($id)
    {
        Sale::where('id', $id)->delete();
        $cart_items = Sale::where('customer_id', session()->get('user_added'))->where('status', 0)->get();
        foreach ($cart_items as $items) {
            $items->product_id = Product::where('id', $items->product_id)->first();
        }
        $totalPrice = 0;
        foreach ($cart_items as $item) {
            $totalPrice += $item->product_id->product_price * $item->product_quantity;
        }
        return response()->json([
            "message" => "cart",
            "total" => number_format($totalPrice, 0),
        ]);
    }
    public function change_quantity(Request $request)
    {
        Sale::where('id', $request->cart_id)->update([
            "product_quantity" => $request->product_quantity,
        ]);
        $cart_item = Sale::where('id', $request->cart_id)->first();
        $cart_items = Sale::where('customer_id', session()->get('user_added'))->where('status', 0)->get();
        foreach ($cart_items as $items) {
            $items->product_id = Product::where('id', $items->product_id)->first();
        }
        $totalPrice = 0;
        foreach ($cart_items as $item) {
            $totalPrice += $item->product_id->product_price * $item->product_quantity;
        }
        return response()->json([
            "total" => number_format($totalPrice, 0),
            "product_price" => $cart_item->price * $cart_item->product_quantity,
        ]);
    }
    public function checkout()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        $cart_items = Sale::where('customer_id', session()->get('user_added'))->where('status', 0)->get();
        foreach ($cart_items as $items) {
            $items->product_id = Product::where('id', $items->product_id)->first();
        }
        $totalPrice = 0;
        foreach ($cart_items as $item) {
            $totalPrice += $item->product_id->product_price * $item->product_quantity;
        }
        return view('Pages.checkout', compact("totalPrice", "cart_items", "user"));
    }
    public function place_order(Request $request)
    {
        $order_key = 'order_key_' . uniqid();
        $cart_items = Sale::where('customer_id', session()->get('user_added'))->where('status', 0)->get();
        foreach ($cart_items as $items) {
            $takenStock = $items->product_quantity;
            $items->product_id = Product::where('id', $items->product_id)->first();
            $productStock = Stock::where('product_id', $items->product_id->id)->first();
            $alreadyStock = $productStock->product_stock;
            $nowStock = $alreadyStock - $takenStock;
            $productStock->update([
                "product_stock" => $nowStock,
            ]);
        }
        $array_data = [
            "name" => $request->full_name,
            "date" => date('M j, Y', strtotime(date('Y-m-d'))),
            "order_number" => $order_key,
            "payment_method" => $request->payment_method,
            "cart_items" => $cart_items,
        ];
        $mail_data = [
            'recipient' => $request->email,
            'formEmail' => 'itsme.shaharyar@gmail.com',
            'name' => $request->full_name,
            'subject' => "Chaandi Kaar Ecommerce",
            'body' => $array_data,
        ];
        Mail::send('Pages.order-template', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['formEmail'], $mail_data['name'])
                ->subject($mail_data['subject']);
        });
        $customer = Customer::create([
            'customer_id' => session()->get('user_added'),
            'name' => $request->full_name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'street_address' => $request->address,
            'order_note' => $request->order_note,
            'payment_method' => $request->payment_method,
        ]);
        $order = Order::create([
            "order_key" => $order_key,
            "customer_id" => $customer->id,
            'payment_method' => $request->payment_method,
            'order_status' => "Delivered",
        ]);
        $cart_items = Sale::where('status', 0)->where('customer_id', session()->get('user_added'))->update([
            "status" => 1,
            "order_key" => $order->order_key,
            "customer_id" => $customer->id,
            "date" => date('Y-m-d'),
        ]);
        if ($cart_items) {
            return response()->json([
                "message" => 200,
                "order_key" => $order_key,
            ]);
        } else {
            return response()->json([
                "message" => 300,
            ]);
        }
    }
    public function order($id)
    {
        $order = DB::table('orders as o')
            ->join('customers as c', 'o.customer_id', '=', 'c.id')
            ->join('sales as s', 'o.order_key', '=', 's.order_key')
            ->join('products as p', 's.product_id', '=', 'p.id')
            ->where('o.order_key', $id)
            ->first();
        $order_items = DB::table('orders as o')
            ->join('customers as c', 'o.customer_id', '=', 'c.id')
            ->join('sales as s', 'o.order_key', '=', 's.order_key')
            ->join('products as p', 's.product_id', '=', 'p.id')
            ->where('o.order_key', $id)
            ->get();
        return view('Pages.order', compact("order", "order_items"));
    }
    public function contact_add(Request $request)
    {
        $mail_data = [
            'recipient' => 'itsme.shaharyar@gmail.com',
            'formEmail' => $request->email,
            'name' => $request->name,
            'subject' => $request->subject,
            'body' => ['subject' => $request->subject, 'message' => $request->message],
        ];
        Mail::send('Customers.contact-template', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['formEmail'], $mail_data['name'])
                ->subject($mail_data['subject']);
        });
        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
}
