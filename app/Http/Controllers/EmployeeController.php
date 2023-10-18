<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employees\EmployeeStoreRequest;
use App\Http\Requests\Employees\EmployeeUpdateRequest;
use App\Models\Employee;
use App\Models\Supplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.employees.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $employee = Employee::with('jobs')
                ->select(['employees.*', 'jobs.title as title'])
                ->join('jobs', 'employees.job_id', '=', 'jobs.id')
                ->get();

            return DataTables()->of($employee)
                ->addIndexColumn()
                ->addColumn('full_name', function ($row) {
                    return "{$row->last_name}  {$row->middle_name} {$row->first_name}";
                })
                ->addColumn('jobs', function (Employee $employee) {
                    return $employee->jobs->title;
                })
                ->addColumn('Actions', function ($row) {
                    $html = '<button class="btn btn-warning btn-xs btnEdit" data-id="' . $row->id . '" data-toggle="modal" data-target="#myModalEdit">Edit</button>';
                    $html .= '<button class="btn btn-danger btn-xs btnDelete" data-id="' . $row->id . '">Hapus</button>';
                    return $html;
                })
                ->rawColumns(['Actions', 'full_name', 'jobs'])
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
    public function store(EmployeeStoreRequest $request)
    {
        try {
            $saved = Employee::create($request->all());
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
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        try {
            $model = Employee::find($employee->id);
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
    public function destroy(Employee $employee)
    {
        try {
            if ($employee->delete()) {
                return response()->json([
                    "status" => true,
                    "message" => "Succes hapus data",
                    "data" => $employee,
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
