<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\LoyaltyCardEmployee as ResourcesLoyaltyCardEmployee;
use App\Models\Department;
use App\Models\LoyaltyCardEmployee;
use App\Models\User;
use Illuminate\Http\Request;

class LoyaltyCardEmployeeController extends Controller
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

        return LoyaltyCardEmployee::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        $validator = Validator::make($request->all(), [
            'department_id' => 'required|integer',
            'user_id' => 'required|integer|unique:loyalty_card_employees',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $department = Department::where('id', '=', $request['department_id'])->first();
        if($department === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect Department ID');
        $user = User::where('id', '=', $request['user_id'])->first();
        if($user === null) return $this->respondUnsuccessfully('Invalid parameters ! Incorrect User ID');

        $lcemployee = LoyaltyCardEmployee::create($validator->validate());
        return $this->respondSuccessfullyWithResult('LoyaltyCardEmployee created !', $lcemployee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoyaltyCardEmployee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(LoyaltyCardEmployee $employee)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        return new ResourcesLoyaltyCardEmployee($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoyaltyCardEmployee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoyaltyCardEmployee $employee)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        if($employee->update($request->all())) return $this->respondSuccessfully('LoyaltyCardEmployee updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoyaltyCardEmployee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoyaltyCardEmployee $employee)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        if($employee->delete()) return $this->respondSuccessfully('LoyaltyCardEmployee destroyed !');
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
