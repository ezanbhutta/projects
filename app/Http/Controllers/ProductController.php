<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\QuantityUnit;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allproducts = Product::where('added_from', session()->get('user_added'))->latest()->get();
        $categories = Category::where('added_from', session()->get('user_added'))->latest()->get();
        $array_data = [];
        foreach ($allproducts as $product) {
            $category = Category::where('id', $product->category)->first();
            if ($category) {
                $array_data[$product->id] = $category->name;
            }
        }
        $allquantityUnits = QuantityUnit::where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact("allproducts", "array_data", "categories", "allquantityUnits");
        return view('Product.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $user = User::where('id', session()->get('user_added'))->first();
        if ($user->labour_cost == "") {
            return response()->json([
                "message" => "labout_cost",
            ]);
        }
        if ($user->labour_cost == "") {
            $labour_cost = 0;
        } else {
            $labour_cost = $user->labour_cost;
        }
        $input = $request->all();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.alphavantage.co/query?function=SILVER&interval=monthly&apikey=5JRZYOZ6O59WZTQ0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
            exit;
        }
        curl_close($ch);
        $data = json_decode($response, true);
        $imagePaths = [];
        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $file) {
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move('admin/product_images', $filename);
                $imagePaths[] = asset('admin/product_images/' . $filename);
            }
            $input['product_image'] = json_encode($imagePaths);
        }
        $input['added_from'] = session()->get('user_added');
        $input['product_name'] = strtolower($request->product_name);
        $productPrice = rand(3010, 3030) * $request->product_weight + $labour_cost;
        $input['product_price'] = $productPrice;
        $product = Product::create($input);
        if ($product) {
            Stock::updateOrCreate(
                ['product_id' => $product->id],
                [
                    'product_stock' => $request->product_stock,
                    'added_from' => session()->get('user_added'),
                ]
            );
        }
        $allproducts = Product::where('added_from', session()->get('user_added'))->latest()->get();
        $array_data = [];
        foreach ($allproducts as $product) {
            $category = Category::where('id', $product->category)->first();
            if ($category) {
                $array_data[$product->id] = $category->name;
            }
        }
        return response()->json([
            "message" => "product",
            "allproducts" => $allproducts,
            "array_data" => $array_data,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return response()->json([
            "message" => $product,
            "product_stock" => Stock::where('product_id', $product->id)->first()->product_stock ?? 0,
            "product_image" => json_decode($product->product_image),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $user = User::where('id', session()->get('user_added'))->first();
        if ($user->labour_cost == "") {
            return response()->json([
                "message" => "labout_cost",
            ]);
        }
        if ($user->labour_cost == "") {
            $labour_cost = 0;
        } else {
            $labour_cost = $user->labour_cost;
        }
        $input = $request->all();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.alphavantage.co/query?function=SILVER&interval=monthly&apikey=5JRZYOZ6O59WZTQ0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
            exit;
        }
        curl_close($ch);
        $data = json_decode($response, true);
        $imagePaths = [];
        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $file) {
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move('admin/product_images', $filename);
                $imagePaths[] = asset('admin/product_images/' . $filename);
            }
            $input['product_image'] = json_encode($imagePaths);
        }
        $category = Category::where('id', $request->category)->first();
        $input['added_from'] = session()->get('user_added');
        $input['product_name'] = strtolower($request->product_name);
        $productPrice = rand(3010, 3030) * $request->product_weight + $labour_cost;
        $input['product_price'] = $productPrice;
        if ($product->update($input)) {
            Stock::updateOrCreate(
                ['product_id' => $product->id],
                [
                    'product_stock' => $request->product_stock,
                    'added_from' => session()->get('user_added'),
                ]
            );
        }
        return response()->json([
            "module" => "product",
            "module_data" => $product,
            "product_name" => ucfirst($product->product_name),
            "product_price" => ucfirst($product->product_price),
            "category" => ucfirst($category->name),
            "product_unit" => ucfirst($product->product_unit),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function stocks()
    {
        $allproducts = Product::where('added_from', session()->get('user_added'))->latest()->get();
        $array_data = [];
        foreach ($allproducts as $products) {
            $checkStock = Stock::where('product_id', $products->id)
                ->orderBy('updated_at', 'desc')
                ->first();
            if ($checkStock) {
                $array_data[$products->id] = $checkStock;
            } else {
                $array_data[$products->id] = "No Stock Yet";
            }
        }
        $compact = compact("allproducts", "array_data");
        return view('Product.stocks')->with($compact);
    }
    public function sync_products()
    {
        $array_response_products = [];
        $array_products = ['Silver', 'Gold'];
        $productLimit = 80;
        foreach ($array_products as $product) {
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://real-time-product-search.p.rapidapi.com/search?q=" . urlencode($product) . "&country=uk&language=en&page=1&limit=10&sort_by=BEST_MATCH&product_condition=ANY&min_rating=ANY",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "x-rapidapi-host: real-time-product-search.p.rapidapi.com",
                    "x-rapidapi-key: a59464ef20msh6239eaa43147690p17ce65jsna08ff50bde17"
                ],
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
                continue;
            }
            $decoded_response = json_decode($response, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "JSON Decode Error: " . json_last_error_msg();
                continue;
            }
            $array_response_products[$product] = $decoded_response;
        }
        foreach ($array_products as $productType) {
            if (isset($array_response_products[$productType]['data']['products'])) {
                $count = 0;
                foreach ($array_response_products[$productType]['data']['products'] as $product) {
                    if ($count >= $productLimit) {
                        break;
                    }
                    $productTitle = $product['product_title'] ?? 'Unknown';
                    $productPrice = $product['offer']['price'] ?? 0;
                    $productPhotos = $product['product_photos'] ?? [];
                    $productDescription = $product['product_description'] ?? '';
                    $insert_product = Product::updateOrCreate(
                        ['product_name' => $productTitle],
                        [
                            'category' => $productType === "Silver" ? 1 : 2,
                            'product_name' => $productTitle,
                            'product_min_limit' => rand(1, 100),
                            'product_unit' => 'Kg',
                            'product_price' => str_replace("£", '', $productPrice),
                            'product_image' => json_encode($productPhotos, JSON_UNESCAPED_SLASHES),
                            'product_description' => $productDescription,
                            'added_from' => session()->get('user_added'),
                        ]
                    );
                    Stock::updateOrCreate([
                        'product_id' => $insert_product->id,
                    ], [
                        'product_id' => $insert_product->id,
                        'product_stock' => rand(1, 100),
                        'added_from' => session()->get('user_added'),
                    ]);
                    $count++;
                }
            } else {
                echo "No products found for category: $productType\n";
            }
        }

        return redirect()->back();
    }
}
