<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\Category as ResourcesCategory;
use App\Models\Category;
use App\Models\LoyaltyCardEmployee;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::orderByDesc('created_at')->get();
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
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $category = Category::create($validator->validate());
        return $this->respondSuccessfullyWithResult('Category created !', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new ResourcesCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');

        if($category->update($request->all())) return $this->respondSuccessfully('Category updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $isEmployee = LoyaltyCardEmployee::where('id', '=', Auth::user()->id)->first();
        if($isEmployee === null) return $this->respondUnsuccessfully('Unauthorized !');
        
        if($category->delete()) return $this->respondSuccessfully('Category destroyed !');
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
