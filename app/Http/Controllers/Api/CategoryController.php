<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        if($categories->isEmpty()){
            return response()->json([
                'message' => 'No categories found',
            ],404);
        }
        return response()->json([
            'data' => $categories,
            'message' => 'Categories fetched successfully',
        ],200);
    }
}
