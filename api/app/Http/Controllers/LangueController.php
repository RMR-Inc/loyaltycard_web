<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\Langue as ResourcesLangue;
use App\Models\Langue;
use App\Models\LoyaltyCardEmployee;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Langue::orderByDesc('created_at')->get();
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
            'name' => 'required|string|max:100|min:3',
            'acronym' => 'required|string|size:2',
            'content' => 'required|json',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $lang = Langue::create($validator->validate());
        return $this->respondSuccessfullyWithResult('Langue created !', $lang);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function show(Langue $langue)
    {
        return new ResourcesLangue($langue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Langue $langue)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        if($langue->update($request->all())) return $this->respondSuccessfully('Langue updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Langue $langue)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');
        
        if($langue->delete()) return $this->respondSuccessfully('Langue destroyed !');
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
