<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function getAll()
    {
        return new CategoryCollection(Category::all());
    }

    public function getByCatId($id)
    {
        return new CategoryResource(Category::findOrFail($id));
    }

    public function create(Request $request)
    {
        $request->validate([
            'cat_name' => 'required',
        ]);

        $category = Category::create($request->all());

        return (new CategoryResource($category))
            ->response()
            ->setStatusCode(201);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}
