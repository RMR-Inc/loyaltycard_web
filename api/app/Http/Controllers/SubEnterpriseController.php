<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\SubEnterprise as ResourcesSubEnterprise;
use App\Models\Enterprise;
use App\Models\Product;
use App\Models\Referent;
use App\Models\SubEnterprise;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class SubEnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubEnterprise::orderByDesc('created_at')->get();
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
            'referent_id' => 'required|integer',
            'enterprise_id' => 'required|integer|unique:sub_enterprises',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $referent = Referent::where('id', '=', $request['referent_id'])->first();
        if ($referent === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect Referent ID');

        $enterprise = Enterprise::where('id', '=', $request['enterprise_id'])->first();
        if ($enterprise === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect Enterprise ID');

        $subEnterprise = SubEnterprise::create($validator->validate());
        return $this->respondSuccessfullyWithResult('SubEnterprise created !', $subEnterprise);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubEnterprise  $subEnterprise
     * @return \Illuminate\Http\Response
     */
    public function show(SubEnterprise $subEnterprise)
    {
        return new ResourcesSubEnterprise($subEnterprise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubEnterprise  $subEnterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubEnterprise $subEnterprise)
    {
        if($subEnterprise->update($request->all())) return $this->respondSuccessfully('SubEnterprise updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubEnterprise  $subEnterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubEnterprise $subEnterprise)
    {
        if($subEnterprise->delete()) return $this->respondSuccessfully('SubEnterprise destroyed !');
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
