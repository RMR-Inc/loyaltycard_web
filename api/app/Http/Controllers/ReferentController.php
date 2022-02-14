<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\Referent as ResourcesReferent;
use App\Models\Partner;
use App\Models\Referent;
use App\Models\User;
use Illuminate\Http\Request;

class ReferentController extends Controller
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

        return Referent::orderByDesc('created_at')->get();
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
            'user_id' => 'required|integer|unique:referents',
            'partner_id' => 'integer',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $user = User::where('id', '=', $request['user_id'])->first();
        if ($user === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect User ID');

        if($request['partner_id']){
            $partner = Partner::where('id', '=', $request['partner_id'])->first();
            if ($partner === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect Partner ID');
        }

        $referent = Referent::create($validator->validate());
        return $this->respondSuccessfullyWithResult('Referent created !', $referent);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referent  $referent
     * @return \Illuminate\Http\Response
     */
    public function show(Referent $referent)
    {
        return new ResourcesReferent($referent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referent  $referent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referent $referent)
    {
        if($referent->update($request->all())) return $this->respondSuccessfully('Referent updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referent  $referent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referent $referent)
    {
        if($referent->delete()) return $this->respondSuccessfully('Referent destroyed !');
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
