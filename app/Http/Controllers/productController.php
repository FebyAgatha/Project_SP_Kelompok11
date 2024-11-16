<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Carbon;

class productController extends Controller
{
    public function createProduct(){
        $categories = Category::all();

        return view('createProduct', [
            'title' => 'Add Product',
            'categories' => $categories
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'category_id' => ['required', 'numeric'],
            'price' => ['required', 'integer'],
            'amount' => ['required', 'integer'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5000']
        ]);

        $name = strip_tags($request->input('name'));

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $name.'.'.$extension;
        $request->file('image')->storeAs('/products', $filename, 'public');


        Product::create([
            'name' => $name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'amount' => $request->amount,
            'image' => $filename
        ]);

        return redirect('/');
    }

    public function index(){
        $products = Product::all();

        return view('ourProducts', [
            'title' => 'Our Products',
            'products' => $products
        ]);
    }

    public function display(Product $product){
        return view('displayProduct', [
            'title' => 'Products Display',
            'product' => $product,
        ]);
    }

    public function delete(Request $request){
        $user = Auth::user()->is_admin;
        $request->validate(['id' => 'required|integer']);
        if($user){
            $product = Product::findOrFail($request->id);
            $product->delete();
        }
        return redirect('/ourproduct');
    }

    public function edit(Product $product){
        $categories = Category::all();
        return view('editProduct', [
            'title' => 'Edit Product',
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'category_id' => ['required', 'numeric'],
            'price' => ['required', 'integer'],
            'amount' => ['required', 'integer'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5000']
        ]);


        $product = Product::findOrFail($id);

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            // Storage::disk('public')->delete('/products/' . $product->image);

            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $request->name . '.' . $extension;
            $request->file('image')->storeAs('/products', $filename, 'public');

            $product->image = $filename; // Update nama file gambar
        }

        $name = strip_tags($request->input('name'));

        // Update data produk
        $product->name = $name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->amount = $request->amount;

        $product->save(); // Simpan perubahan

        return redirect('/dashboard');
    }

    public function Addcart($id, Request $request)
    {
        $request->validate([
            'amount' => ['required', 'integer', 'min:1'],
        ]);

        $product = Product::findOrFail($id);

        $quantity = $request->input('amount', 1);
        $user = Auth::user();

        if($user && $product){
            $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $id)
                        ->first();

            if($cartItem){
                if($product->amount < $cartItem->quantity + $quantity){
                    return redirect()->back()->with('message', 'Cart quantity must not exceed product amount');
                }

                $cartItem->update([
                    'user_id' => $cartItem->user_id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity + $quantity
                ]);
            }
            else{
                if($product->amount < $quantity){
                    return redirect()->back()->with('message', 'Cart quantity must not exceed product amount');
                }

                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $id,
                    'quantity' => $quantity
                ]);
            }
        }

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function checkout(){
        $orderID = 'ORD' . Str::random(8);
        $user = Auth::user();
        $cart = Cart::with('product')->where('user_id', $user->id)->get();

        if($user){
            return view('checkout', [
                'title' => 'Checkout',
                'orderID' => $orderID,
                'cart' => $cart
            ]);
        }
    }

    public function Cart(){
        $user = Auth::user();
        $cart = Cart::with('product')->where('user_id', $user->id)->get();
        // $cart = Cart::where('user_id', $user->id)->first();
        if($user){
            return view('viewCart', [
                'title' => 'Add To Cart',
                'cart' => $cart,
            ]);
        }
    }

    public function deleteProduct(Request $request){
        $user = Auth::user();
        $request->validate(['id' => 'required|integer']);
        if($user){
            $cart = Cart::findOrFail($request->id);
            if($cart->user_id == $user->id){
                $cart->delete();
            }
        }
        return redirect('/shopping-cart');
    }

    public function placeOrder($orderId){
        $user = Auth::user();

        $cart = $user->cart;
        $carts = Cart::with('product')->where('user_id', $user->id)->get();


        foreach ($carts as $cart) {
            $product = Product::findOrFail($cart->product_id);
            $newStock = $product->amount - $cart->quantity;
            $product->amount = max(0, $newStock);
            $product->save();
        }

        try{
            $cart->user_id;
        } catch(Exception $e){
            return redirect('/dashboard');
        }


        foreach($carts as $cart){
            Invoice::create([
                'order_id' => $orderId,
                'user_id' => $cart->user_id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity
            ]);
            $othercarts = Cart::where('product_id', $cart->product_id)->get();
            foreach($othercarts as $othercart){
                $product = Product::findOrFail($othercart->product_id);
                $othercart->quantity = min($othercart->quantity, $product->amount);
                if($othercart->quantity <= 0){
                    $othercart->delete();
                }
            }
        }

        $cart = Cart::where('user_id', $user->id)->delete();

        return view('placeOrder', [
            'title'=>'Receipt',
            'orderId' => $orderId,
            'carts' => $carts
        ]);
    }


    public function viewInvoices(){
        $user = Auth::user();
        $invoices = Invoice::where('user_id', $user->id)->get();

        if($invoices){
            return view('viewInvoice', [
                'title' => 'Invoice List',
                'invoices' => $invoices
            ]);
        }
    }

    public function receipt($orderId){
        $user = Auth::user();
        $cart = $user->order;

        $carts = Invoice::with('product')->where('order_id', $orderId)->get();

        return view('generateInvoice', ['orderId' => $orderId, 'carts' => $carts]);
    }

    public function downloadInvoice($orderID){
        $user = Auth::user();
        $carts = Invoice::with('product')->where('order_id', $orderID)->get();

        $data = [
            'orderId' => $orderID,
            'carts' => $carts,
        ];

        $time = Carbon::now()->format('Y-m-d');
        $pdf = Pdf::loadView('generateInvoice', $data);

        return $pdf->download('invoice'.$orderID.'-'.$time.'.pdf');
    }

    public function cartProduct($orderId){
        $this->receipt($orderId);
        $this->downloadInvoice($orderId);
    }

}


