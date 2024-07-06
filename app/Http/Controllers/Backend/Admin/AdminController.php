<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Customer_Invoice;
use App\Models\Product;
use App\Models\Product_Order;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use App\Models\Supplier_Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function login_form(){
        return view('Backend.Pages.Login.Login');
    }
    public function get_data(Request $request){
        if (!empty($request->data=='customer_data')) {
            $response_data= Customer::latest()->take(5)->get();
            return response()->json($response_data);
            exit; 
        }
        if (!empty($request->date)) {
            $s_date=$request->date; 
            $e_date= Carbon::now()->toDateString();

            /*define custom function */
            $__count_entries=function ($model) use ($s_date, $e_date){
            return  $model::whereBetween('created_at',[$s_date,$e_date])->count();
            };
            $__sum_invoice_amount = function ($model) use ($s_date, $e_date) {
                return $model::whereDate('created_at', '>=', $s_date)
                            ->whereDate('created_at', '<=', $e_date)
                            ->sum('paid_amount');
            };
            $total_sales_amount=$__sum_invoice_amount(Customer_Invoice::class);
            $total_purchase_amount=$__sum_invoice_amount(Supplier_Invoice::class);
            $total_product_order=$__count_entries(Product_Order::class);
            $total_customer=$__count_entries(Customer::class);
            $total_supplier=$__count_entries(Supplier::class);
            $total_products=$__count_entries(Product::class);
            $total_seller=$__count_entries(Seller::class);

            $total_order_amount = Product_Order::whereDate('created_at', '>=', $s_date)
                ->whereDate('created_at', '<=', $e_date)
                ->sum('grand_total');

            // $total_purchase_amount = Supplier_Invoice::whereDate('created_at', '>=', $s_date)
            //     ->whereDate('created_at', '<=', $e_date)
            //     ->sum('paid_amount');

            // $total_customer = Customer::whereDate('created_at', '>=', $s_date)
            //     ->whereDate('created_at', '<=', $e_date)
            //     ->count();

            // $total_supplier = Supplier::where(function ($query) use ($s_date, $e_date){
            //     $query->where('created_at', '>=',$s_date)
            //     ->where('created_at','>=', $e_date);
            // })->count();

            // $total_products = Product::where(function ($query)use ($s_date,$e_date){
            //     $query->where('created_at', '>=',$s_date)
            //         ->where('created_at', '>=',$e_date);
            // })->count();

            // $total_seller = Seller::whereBetween('created_at',[$s_date, $e_date])->count();

            $response_data=[
                'total_sales_amount'=>intval($total_sales_amount),
                'total_purchase_amount'=>intval($total_purchase_amount),
                'net_income'=>intval(($total_sales_amount + $total_order_amount)) -intval($total_purchase_amount),
                
                'total_customer'=>intval($total_customer),
                'total_supplier'=>intval($total_supplier),
                'total_products'=>intval($total_products),
                'total_seller'=>intval($total_seller),
                'total_product_order'=>intval($total_product_order),
            ];
            return response()->json($response_data);
        }
        if (!empty($request->data=='get_top_rated_product')) {
            $response_data = DB::table('product_order_details')
                    ->select('product_id', DB::raw('SUM(qty) as total_qty'))
                    ->groupBy('product_id')
                    ->orderByDesc('total_qty')
                    ->limit(5)
                    ->get();
            return response()->json($response_data);
            exit;
        }
        
    }
    public function login_functionality(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }else{
           // Session::flash('error-message','Invalid Email or Password');
            return redirect()->back()->with('error-message','Invalid Email or Password');
        }
    }
    public function dashboard()
    {
        return view('Backend.Pages.Dashboard.index');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    

}
