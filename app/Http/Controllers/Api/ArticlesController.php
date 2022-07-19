<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ArticlesResource;
use App\Http\Controllers\Api\BaseController as BaseController;
use DB;

class ArticlesController extends BaseController
{
    public function index()
    {
        $articles = Articles::latest()->paginate(10);
        return ArticlesResource::collection($articles);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $cek_category = DB::table('categories')
            ->select('id','name','user_id')
            ->where('id', $request->category_id)
            ->first();

        $validator = Validator::make($data, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ],[
            'title.required' => 'Title Harus di Isi !',
            'content.required' => 'Content Id Harus di Isi !',
            'image.required' => 'Image Harus di Isi !',
            'user_id.required' => 'User Id Harus di Isi !',
            'category_id.required' => 'Category Id Harus di Isi !',
        ]);

        if ($validator->fails()) {
            // return response(['error' => $validator->errors(), 'Validation Error']);
            return $this->sendError('Validation Error.', $validator->errors());   
        }

        if (is_null($cek_category)) {
            // return response(['error' => $validator->errors(), 'Validation Error']);
            return $this->sendError('Category Does Not Exist.', $validator->errors());   
        }

        $articles = Articles::create($data);
        // return new ArticlesResource($product);
        return $this->sendResponse(new ArticlesResource($articles), 'Article Created Successfully.');
    }

    public function show(Articles $articles)
    {
        return new ArticlesResource($articles);
    }

    public function update(Request $request, Articles $article)
    {
        $data = $request->all();
        $cek_category = DB::table('categories')
            ->select('id','name','user_id')
            ->where('id', $request->category_id)
            ->first();

        $validator = Validator::make($data, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ],[
            'title.required' => 'Title Harus di Isi !',
            'content.required' => 'Content Id Harus di Isi !',
            'image.required' => 'Image Harus di Isi !',
            'user_id.required' => 'User Id Harus di Isi !',
            'category_id.required' => 'Category Id Harus di Isi !',
        ]);

        if ($validator->fails()) {
            // return response(['error' => $validator->errors(), 'Validation Error']);
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (is_null($cek_category)) {
            // return response(['error' => $validator->errors(), 'Validation Error']);
            return $this->sendError('Category Does Not Exist.', $validator->errors());   
        }

        $article->update($request->all());
        // return new ArticlesResource($product);
        return $this->sendResponse(new ArticlesResource($article), 'Article Updated Successfully.');
    }

    public function destroy(Articles $article)
    {
        $article->delete();
        // return response(['Info' => 'Data Berhasil DiHapus !!']);
        return $this->sendResponse([], 'Article Deleted Successfully.');
    }

    public function search($title)
    {
        $article = Articles::where('title', 'like', '%'.$title.'%')->get();
        return ArticlesResource::collection($article);
    }

    public function detail($id)
    {
        $article = Articles::where('id', $id)->get();
        return ArticlesResource::collection($article);
    }
}
