<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $customers = Customer::latest()->get();
            return datatables()->of($customers)
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
            $data = Customer::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('Options', function ($data) {
                    return '<button type="button" id="btnPilih" class="btn btn-info btn-sm btnPilih"><li class="fa fa-share"></li> Pilih </button>';
                })
                ->editColumn('status', function ($data) {
                    if ($data->is_status == '1') {
                        return '<span class="badge bg-success">Active</span>';
                    } else {
                        return '<span class="badge bg-warning">inactive</span>';
                    }
                })
                ->rawColumns(['Options', 'status'])
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
