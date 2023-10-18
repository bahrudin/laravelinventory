<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.products.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::all();
            return datatables()->of($product)
                ->addIndexColumn()
                ->addColumn('Actions', function ($row) {
                    $html = '<button class="btn btn-warning btn-xs btnEdit" data-id="' . $row->id . '" data-toggle="modal" data-target="#myModalEdit">Edit</button>';
                    $html .= '<button class="btn btn-danger btn-xs btnDelete" data-id="' . $row->id . '">Hapus</button>';
                    return $html;
                })
                ->rawColumns(['Actions'])
                ->toJson();
        }
    }


    public function getOptions(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('category')->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category', function ($data) {
                    return $data->category->name;
                })
                ->addColumn('Options', function ($data) {
                    return '<button type="button" id="btnPilih" class="btn btn-info btn-sm btnPilih"><li class="fa fa-share"></li> Pilih </button>';
                })
                ->addColumn('status', function ($data) {
                    if ($data->is_status == '1') {
                        return '<span class="badge bg-success">Active</span>';
                    } else {
                        return '<span class="badge bg-warning">inactive</span>';
                    }
                })
                ->rawColumns(['Options', 'Status', 'category'])
                ->make(true);
        }
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
    public function store(ProductStoreRequest $request)
    {
        try {
            $saved = Product::create($request->all());
            if ($saved) {
                return response()->json([
                    "status" => true,
                    "message" => "Operasi berhasil dilakukan",
                    "data" => $saved,
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Terjadi kesalahan dalam proses permintaan",
                "error_message" => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $model = Product::find($product->id);
            $saved = $model->update($request->all());
            if ($saved) {
                return response()->json([
                    "status" => true,
                    "message" => "Operasi berhasil dilakukan",
                    "data" => $saved,
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Terjadi kesalahan dalam proses permintaan",
                "error_message" => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            if ($product->delete()) {
                return response()->json([
                    "status" => true,
                    "message" => "Succes hapus data",
                    "data" => $product,
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Terjadi kesalahan dalam proses permintaan",
                "error_message" => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function stock(Request $request)
    {
        try {
            $model = Product::where('code', $request->input('code'))->first();

            $model->code = $request->code;
            $model->qty = $model->qty + $request->qty;
            if ($model->update()) {
                return response()->json([
                    "status" => true,
                    "message" => "Update Stock berhasil",
                    "data" => $model,
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Terjadi kesalahan dalam proses permintaan",
                "error_message" => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
