<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CategoriesResource;
use App\Http\Controllers\Api\BaseController as BaseController;

class CategoriesController extends BaseController
{
    public function index()
    {
        $categories = Categories::latest()->paginate(10);
        return CategoriesResource::collection($categories);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'user_id' => 'required'
        ],[
            'name.required' => 'Nama Harus di Isi !',
            'user_id.required' => 'User Id Harus di Isi !',
        ]);

        if ($validator->fails()) {
            // return response(['error' => $validator->errors(), 'Validation Error']);
            return $this->sendError('Validation Error.', $validator->errors());   
        }

        $category = Categories::create($data);
        // return new CategoriesResource($product);
        return $this->sendResponse(new CategoriesResource($category), 'Category Created Successfully.');
    }

    public function show(Categories $categories)
    {
        return new CategoriesResource($categories);
    }

    public function update(Request $request, Categories $category)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'user_id' => 'required',
        ],[
            'name.required' => 'Nama Harus di Isi !',
            'user_id.required' => 'User Id Harus di Isi !',
        ]);

        if ($validator->fails()) {
            // return response(['error' => $validator->errors(), 'Validation Error']);
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $category->update($request->all());
        // return new CategoriesResource($product);
        return $this->sendResponse(new CategoriesResource($category), 'Category Updated Successfully.');
    }

    public function destroy(Categories $category)
    {
        $category->delete();
        // return response(['Info' => 'Data Berhasil DiHapus !!']);
        return $this->sendResponse([], 'Category Deleted Successfully.');
    }

    public function search($name)
    {
        $categories = Categories::where('name', 'like', '%'.$name.'%')->get();
        return CategoriesResource::collection($categories);
    }

    public function detail($id)
    {
        $categories = Categories::where('id', $id)->get();
        return CategoriesResource::collection($categories);
    }
}
