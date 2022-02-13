<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\Purchase as ResourcesPurchase;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Purchase::orderByDesc('created_at')->get();
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
            'user_id' => 'required|integer',
            'partner_id' => 'integer',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $user = User::where('id', '=', $request['user_id'])->first();
        if($user === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect User ID');

        if($request['partner_id']){
            $partner = Partner::where('id', '=', $request['partner_id'])->first();
            if ($partner === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect Partner ID');
        }

        $purchase = Purchase::create($validator->validate());
        return $this->respondSuccessfullyWithResult('Purchase created !', $purchase);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return new ResourcesPurchase($purchase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        if($purchase->update($request->all())) return $this->respondSuccessfully('Purchase updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        if($purchase->delete()) return $this->respondSuccessfully('Purchase destroyed !');
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
