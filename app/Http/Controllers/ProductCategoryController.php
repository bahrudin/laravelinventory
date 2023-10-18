<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CatProductStoreRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = 'Product Category';
        return view('admins.product_categories.index', compact(['pages']));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $category = ProductCategory::all();
            return datatables()->of($category)
                ->addIndexColumn()
                ->addColumn('Actions', function ($row) {
                    $html = '<button class="btn btn-warning btn-xs btnEdit" data-id="'.$row->id.'" data-toggle="modal" data-target="#myModalEdit">Edit</button>';
                    $html .= '<button class="btn btn-danger btn-xs btnDelete" data-id="'.$row->id.'">Hapus</button>';
                    return $html;
                })
                ->rawColumns(['Actions'])
                ->toJson();
        }
    }

    public function getOptions()
    {
        $options = ProductCategory::pluck('name', 'code');
        return response()->json(['options' => $options]);
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
        try {
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:product_categories,code',
                'name' => 'required',
                'is_status' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages()->all()[0],
                ]);
            }

            $cp = new ProductCategory();
            $cp->code = $request->input('code');
            $cp->name = $request->input('name');
            $cp->is_status = $request->input('is_status');
            $cp->descriptions = $request->input('descriptions');
             if($cp->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Saved successfully',
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        return response()->json($productCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:product_categories,code,'.$id,
                'name' => 'required',
                'is_status' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages()->all()[0],
                ]);
            }

            $data = ProductCategory::find($id);
            $data->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data update successfully',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Check data',
                'errors-detail'=> $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        try {
            if ($productCategory->delete()){
                return response()->json([
                    'status' => true,
                    'message' => 'Data update successfully',
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Check data',
                'errors-detail'=> $e->getMessage()
            ]);
        }
    }
}
