<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{



    // uri: /api/product/all
    // method: get

    public function all(Request $request)
    {

        $product = Product::orderBy('updated_at','DESC')->with(['user:id,name'])->paginate(20);


        return response()->json(compact('product'));
    }


    // get
    public function view(Request $request)
    {

        $validate = Validator::make($request->all(),[
            'id' => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'type' => "missing",
                'message' => $validate->errors()->first(),
                'result' => null
            ]);
        }


        $product = Product::find($request->id);


        return response()->json(compact('product'));


    }

    // post
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'unit_buying_cost' => 'required|integer',
            'unit_selling_cost' => 'required|integer',
            'quantity' => 'required|integer',
            'tax_rate' => 'required|integer',
            'sold_out_flag' => 'required|boolean',
        ]);

        if($validate->fails()){
            return response()->json([
                'type' => "missing",
                'message' => $validate->errors()->first(),
                'result' => null
            ]);
        }

        $productAttr = [
            'user_id' => auth()->id(),
            'name' => $request->name,
            'code' => $request->code,
            'unit_buying_cost' => $request->unit_buying_cost,
            'unit_selling_cost' =>$request->unit_selling_cost,
            'quantity' => $request->quantity,
            'tax_rate' => $request->tax_rate,
            'sold_out_flag' => $request->sold_out_flag,
            ];

            $insert = Product::create($productAttr);
            $success = (Boolean) $insert;
            $message = $success ? 'Successfully Insert' : 'Fail To Insert';

            return response()->json(compact('success','message'));
            // return view('products.store',compact('products'))->with(request()->input('page'));



            // return view('products.store');

    }


    // post
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'id' => 'required',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'unit_buying_cost' => 'required|integer',
            'unit_selling_cost' => 'required|integer',
            'quantity' => 'required|integer',
            'tax_rate' => 'required|integer',
            'sold_out_flag' => 'required|boolean',

        ]);

        if($validate->fails()){

            return response()->json([
                'type' => "missing",
                'message' => $validate->errors()->first(),
                'result' => null
            ]);

        }

        $productAttr = [
            'name' => $request->name,
            'code' => $request->code,
            'unit_buying_cost' => $request->unit_buying_cost,
            'unit_selling_cost' =>$request->unit_selling_cost,
            'quantity' => $request->quantity,
            'tax_rate' => $request->tax_rate,
            'sold_out_flag' => $request->sold_out_flag,

            ];

            $where  = ['id' => $request->id,'user_id' => auth()->id()];

            $product = Product::where($where)->first();

            $success = false;
            if($product){
                $success = (Boolean) Product::where($where)->update($productAttr);
                $message = $success ? 'Successfully Update' : 'Fail To Update';
            }else{
                $message = "Product not exist or you do not have permission";
            }

            return response()->json(compact('success','message'));
    }


    // get
    public function delete(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'id' => 'required',
        ]);

        if($validate->fails()){

            return response()->json([
                'type' => "missing",
                'message' => $validate->errors()->first(),
                'result' => null
            ]);

        }
            $where  = ['id' => $request->id,'user_id' => auth()->id()];

            $product = Product::where($where)->first();

            // return $product;

            $success = false;
            if($product){
                $success = (Boolean) Product::where($where)->delete();
                $message = $success ? 'Successfully Deleted' : 'Fail To Delete';
            }else{
                $message = "Product not exist or you do not have permission";
            }

            return response()->json(compact('success','message'));


    }

}