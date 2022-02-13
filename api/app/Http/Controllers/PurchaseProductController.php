<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\PurchaseProduct as ResourcesPurchaseProduct;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseProduct;
use Illuminate\Http\Request;

class PurchaseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PurchaseProduct::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'purchase_id' => 'required|integer',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $product = Product::where('id', '=', $request['product_id'])->first();
        if ($product === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect Product ID');

        $purchase = Purchase::where('id', '=', $request['purchase_id'])->first();
        if ($purchase === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect Purchase ID');

        $purchaseProduct = PurchaseProduct::create($validator->validate());
        return $this->respondSuccessfullyWithResult('PurchaseProduct created !', $purchaseProduct);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseProduct $purchaseProduct)
    {
        return new ResourcesPurchaseProduct($purchaseProduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseProduct $purchaseProduct)
    {
        if($purchaseProduct->update($request->all())) return $this->respondSuccessfully('PurchaseProduct updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseProduct $purchaseProduct)
    {
        if($purchaseProduct->delete()) return $this->respondSuccessfully('PurchaseProduct destroyed !');
    }

    protected function respondSuccessfullyWithResult($message, $result)
    {
        return response()->json([
            'success' => true,
            'details' => $message,
            'result' => $result,
        ], 201);
    }

    protected function respondSuccessfully($message)
    {
        return response()->json([
            'success' => true,
            'details' => $message,
        ], 200);
    }

    protected function respondUnsuccessfully($message)
    {
        return response()->json([
            'success' => false,
            'details' => $message,
        ], 400);
    }
}
