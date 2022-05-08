<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\Enterprise as ResourcesEnterprise;
use App\Models\Enterprise;
use App\Models\LoyaltyCardEmployee;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        return Enterprise::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isReferent = Referent::where('id', '=', Auth::user()->id)->first();
        if($isReferent === null) return $this->respondUnsuccessfully('Unauthorized !');

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200|min:3',
            'adress' => 'required|string',
            'email' => 'required|email|max:185|min:5',
            'phone' => 'required|string|max:18|min:3',
            'annual_sales' => 'required|numeric',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $enterprise = Enterprise::create($validator->validate());
        return $this->respondSuccessfullyWithResult('Enterprise created !', $enterprise);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function show(Enterprise $enterprise)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        return new ResourcesEnterprise($enterprise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enterprise $enterprise)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        if($enterprise->update($request->all())) return $this->respondSuccessfully('Enterprise updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprise)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        if($enterprise->delete()) return $this->respondSuccessfully('Enterprise destroyed !');
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
        ], 200);
    }
}
