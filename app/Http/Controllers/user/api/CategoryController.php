<?php

namespace App\Http\Controllers\user\api;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return response()->json([
            'categories' => Category::where('user_id', '=', $id)->get()
        ]);

        // return response()->json('hiii');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'name' => $validator->messages(),
            ]);
        }

        $data = [
            'name' => $request->name,
            'user_id' => $request->id,
        ];

        if (Category::create($data)) {
            return response()->json([
                'success' => "Magic has been spelled!",
            ]);
        } else {
            return response()->json([
                'failure' => "Magic has become shopper!",
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json([
            'category' => Category::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'name' => $validator->messages(),
            ]);
        }

        $data = [
            'name' => $request->name,
        ];

        $category = Category::find($request->id);

        if ($category->update($data)) {
            return response()->json([
                'success' => "Magic has been spelled!",
            ]);
        } else {
            return response()->json([
                'failure' => "Magic has become shopper!",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Category::find($id)->delete()) {
            return response()->json([
                'success' => "Magic has been spelled!"
            ]);
        } else {
            return response()->json([
                'failure' => "Magic has become shopper!"
            ]);
        }

    }
}
