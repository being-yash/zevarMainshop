<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MainShopController extends Controller
{

    //------------- ALL SHOPFUNCTIONS ---------\\

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $cats = Category::where('deleted_at', '=', null)->limit(10)->get();
        $featured1 = Product::where('deleted_at', '=', null)->where('price','<=',999)->limit(25)->get();
        $featured2 = Product::where('deleted_at', '=', null)->where('price','<=',1999)->limit(25)->get();
        $featured3 = Product::where('deleted_at', '=', null)->where('price','<=',2499)->limit(25)->get();

        return view('essence.index', get_defined_vars());
    }

    public function search($query)
    {
        
    }

    public function shop()
    {

        $datas = Product::where('deleted_at', '=', null)->paginate(15);
        $cats = Category::where('deleted_at', '=', null)->limit(10)->get();
        return view('essence.shop', get_defined_vars());
    }

    public function detail($name,$code)
    {
        $data = Product::where('code', '=', $code)->limit(1)->get();
        $variants = ProductVariant::where('product_id', $data[0]->id)
                ->where('deleted_at', null)
                ->get();
        $cat = Category::where('id',$data[0]->category_id)->limit(1)->get();
        return view('essence.detail', get_defined_vars());
    }

    public function filter(Request $request)
    {
        $filter = $request->search;
        $datas = Product::where('deleted_at', '=', null)->latest()->paginate(15);
        return view('essence.shopProducts',get_defined_vars());
    }

    public function category($category)
    {

        $cat = str_replace('-',' ',strtolower($category));
        $catid = Category::where('name','like', '%' . $cat . '%')->limit(1)->get();
        //dd($catid,$cat);
        if (count($catid) > 0) {
            $datas = Product::where('category_id',$catid[0]->id)->where('deleted_at', null)->latest()->paginate(15);
        }
        return view('essence.category',get_defined_vars());
    }

    public function categories()
    {
        $categories = Category::where('deleted_at', null)->paginate(15);
        
        return view('essence.categories',get_defined_vars());
    }

    /* cart functionality */

    public function cart(Request $request)
    {
        $id = (int)$request->id;
        $variant = $request->variant;
        if($request->variant == "undefined"){
            $var = ProductVariant::where('product_id',$id)->limit(1)->orderBy('id','DESC')->get();
            $variant = $var[0]->name;
            dd($variant);
        }
        
        $action = (int)$request->action;
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);



        $arr = explode(',', $product->image);
        if ($action == 1) {
            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            }  else {
                $cart[$id] = [
                    "name" => $product->name,
                    "sku_code" => $product->code,
                    "price" => $product->currentPrice,
                    "quantity" => 1,
                    "variant" => $variant,
                    "image" => $arr[0]
                ];
            }
            session()->put('cart', $cart);

            $item = $cart[$id];

            return view('essence.partials.cartAdd',get_defined_vars());
        }

        if ($action == 2) {
            if($request->id && $request->quantity){
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart successfully updated!');
            }
        }

        if ($action == 3) {
            if($request->id) {
                $cart = session()->get('cart');
                if(isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
                session()->flash('success', 'Product successfully removed!');
            }
        }
        
    }
    /* cart functionality end */

    /* checkout code */
    public function checkout()
    {
        return view('essence.checkout',get_defined_vars());
    }

    public function checkoutSave(Request $request)
    {
        $validatedData = $request->all();
        /*$request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'street_address' => ['required', 'string', 'max:255'],
            'street_address2' => ['nullable', 'string', 'max:255'],
            'pincode' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20'],
            'whatsapp_number' => ['nullable', 'string', 'max:20'],
            'email_address' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8', 'confirmed'],
        ]);*/

        $oid = Order::orderBy('id','DESC')->limit(1)->get();
        //$order_id = $oid[0]->id;

        $order = new Order();
        $order->first_name = $validatedData['first_name'];
        $order->last_name = $validatedData['last_name'];
        $order->street_address = $validatedData['street_address'];
        $order->street_address2 = $validatedData['street_address2'];
        $order->pincode = $validatedData['pincode'];
        $order->city = $validatedData['city'];
        $order->state = $validatedData['state'];
        $order->phone_number = $validatedData['phone_number'];
        $order->whatsapp_number = $validatedData['whatsapp_number'];
        $order->email_address = $validatedData['email_address'];
        $order->order_id = 1;
        $order->save();
        $createAccount = $request->createAccount;
        if ($createAccount) {
            $user = new User();
            $user->password = Hash::make($validatedData['password']);
            $user->email = $validatedData['email_address'];
            $user->name = $validatedData['first_name']." ".$validatedData['last_name'];
            $user->save();
            session()->flash('success','Registration successfully.');
        }
        session()->flash('success','Order successfully.');

        return view('essence.checkout',get_defined_vars());
    }
    /* checkout code end */

}
