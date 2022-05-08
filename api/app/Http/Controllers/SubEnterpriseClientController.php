<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\SubEnterpriseClient as ResourcesSubEnterpriseClient;
use App\Models\User;
use App\Models\Product;
use App\Models\SubEnterprise;
use App\Models\SubEnterpriseClient;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class SubEnterpriseClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubEnterpriseClient::orderByDesc('created_at')->get();
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
            'user_id' => 'required|integer|unique:sub_enteprise_clients',
            'subenterprise_id' => 'required|integer',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $user = User::where('id', '=', $request['user_id'])->first();
        if ($user === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect User ID');

        $subenterprise = SubEnterprise::where('id', '=', $request['subenterprise_id'])->first();
        if ($subenterprise === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect SubEnterprise ID');

        $subEnterpriseClient = SubEnterpriseClient::create($validator->validate());
        return $this->respondSuccessfullyWithResult('SubEnterpriseClient created !', $subEnterpriseClient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubEnterpriseClient  $subEnterpriseClient
     * @return \Illuminate\Http\Response
     */
    public function show(SubEnterpriseClient $subEnterpriseClient)
    {
        return new ResourcesSubEnterpriseClient($subEnterpriseClient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubEnterpriseClient  $subEnterpriseClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubEnterpriseClient $subEnterpriseClient)
    {
        if($subEnterpriseClient->update($request->all())) return $this->respondSuccessfully('SubEnterpriseClient updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubEnterpriseClient  $subEnterpriseClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubEnterpriseClient $subEnterpriseClient)
    {
        if($subEnterpriseClient->delete()) return $this->respondSuccessfully('SubEnterpriseClient destroyed !');
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
