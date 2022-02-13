<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Resources\Bill as ResourcesBill;
use App\Models\Bill;
use App\Models\Purchase;
use App\Models\LoyaltyCardEmployee;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::orderByDesc('created_at')->get();

        $isEmployee = LoyaltyCardEmployee::where('user_id', '=', Auth::user()->id)->first();
        if($isEmployee !== null) return $bills;

        $keeped_bills = array();
        foreach($bills as $bill){
            $purchase = Purchase::where('id', '=', $bill->purchase_id)->first();
            if($purchase !== null && $purchase->user_id === Auth::user()->id) array_push($keeped_bills, $bill);
        }

        return $keeped_bills;
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
            'purchase_id' => 'required|integer',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $purchase = Purchase::where('id', '=', $request['purchase_id'])->first();
        if($purchase === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect Purchase ID');

        $bill = Bill::create($validator->validate());
        return $this->respondSuccessfullyWithResult('Bill created !', $bill);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        $purchase = Purchase::where('id', '=', $bill->purchase_id)->first();
        if($purchase->user_id !== Auth::user()->id || $isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        return new ResourcesBill($bill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        if($bill->update($request->all())) return $this->respondSuccessfully('Bill updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');
        
        if($bill->delete()) return $this->respondSuccessfully('Bill destroyed !');
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
