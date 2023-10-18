<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.orders.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $supplier = Order::all();
            return datatables()->of($supplier)
                ->addIndexColumn()
                ->editColumn('last_name', function ($row) {
                    return "{$row->last_name} {$row->first_name}";
                })
                ->editColumn('order_date', function ($row) {
                    return date('d-m-Y', strtotime($row->order_date));
                })
                ->addColumn('Actions', function ($row) {
                    $html = '<button class="btn btn-info btn-xs btnDetail" data-id="' . $row->id . '" data-toggle="modal" data-target="#myModalDetail">Lihat</button>';
                    $html .= '<button class="btn btn-warning btn-xs btnEdit" data-id="' . $row->id . '" data-toggle="modal" data-target="#myModalEdit">Edit</button>';
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
