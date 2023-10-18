<?php

namespace App\Http\Controllers;

use App\Http\Requests\Suppliers\SupplierStoreRequest;
use App\Http\Requests\Suppliers\SupplierUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.suppliers.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $supplier = Supplier::all();
            return datatables()->of($supplier)
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
    public function store(SupplierStoreRequest $request)
    {
        try {
            $saved = Supplier::create($request->all());
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
    public function show(Supplier $supplier)
    {
        return $supplier;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierUpdateRequest $request, Supplier $supplier)
    {
        try {
            $model = Supplier::find($supplier->id);
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
    public function destroy(Supplier $supplier)
    {
        try {
            if ($supplier->delete()) {
                return response()->json([
                    "status" => true,
                    "message" => "Succes hapus data",
                    "data" => $supplier,
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
