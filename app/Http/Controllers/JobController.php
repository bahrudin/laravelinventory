<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employees\JobStoreRequest;
use App\Http\Requests\Employees\JobUpdateRequest;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.jobs.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $supplier = Job::all();
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

    public function getOptions()
    {
        $options = Job::pluck('title', 'id');
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
    public function store(JobStoreRequest $request)
    {
        try {
            $saved = Job::create($request->all());
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
    public function show(Job $job)
    {
        return $job;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobUpdateRequest $request, Job $job)
    {
        try {
            $model = Job::find($job->id);
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
    public function destroy(Job $job)
    {
        try {
            if ($job->delete()) {
                return response()->json([
                    "status" => true,
                    "message" => "Succes hapus data",
                    "data" => $job,
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
