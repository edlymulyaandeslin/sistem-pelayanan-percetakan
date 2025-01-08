<?php

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Unique;

Route::get('/', function () {
    $products = Product::all();

    return view('welcome', [
        "products" => $products
    ]);
});

Route::get('/pesan/{product}', function (Product $product) {
    return view('buatpesanan', [
        "product" => $product
    ]);
});
Route::post('/pesan/{product}', function (Request $request, Product $product) {
    $validateData = $request->validate([
        "customer_name" => "required",
        "customer_phone" => "required",
    ]);

    $orderNumber = "ORD-" . uniqid();

    $validateData["order_number"] = $orderNumber;
    $validateData["product_id"] = $product->id;
    $validateData["quantity"] = 1;
    $validateData["status"] = Order::PENDING;

    Order::create($validateData);

    return redirect("/pesanan/$orderNumber");
});

Route::get("/pesanan/{orderNumber}", function ($orderNumber) {
    return view("pesanan-created", [
        "order_number" => $orderNumber
    ]);
});
Route::post("/pesanan/status", function (Request $request) {
    $order = Order::with("product")->where("order_number", $request->order_number)->first();


    return view("pesanan-status", [
        "order" => $order
    ]);
})->name("pesanan.status");