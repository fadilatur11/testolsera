<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PajakRequest;
use App\Services\PajakService;
use Exception;

class PajakController extends Controller
{
    public function __construct()
    {
        $this->model = new PajakService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->hasRole('admin'));
        $pajak = $this->model->index();
        // $pajak->where('condition');

        $response = [
            'data' => $pajak
        ];

        // return response
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PajakRequest $request)
    { 
        try {
            $this->model->create($request->all());
            $success = 1;
            $message = "Data Pajak Berhasil Disimpan";
        } catch (Exception $ex) {
            $success = 0;
            $message = $ex->getMessage();
        }
        
        // make response
        $response = [
            'success' => $success,
            'message' => $message
        ];
        // return response
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pajak = $this->model->show($id)->first();

        if($pajak)
        {
            $success = 1;
            $message = 'Berhasil mendapatkan Data Pajak ' . $pajak->nama;
            $data = $pajak;
        } else {
            $success = 0;
            $message = 'Oopps! Data Tidak Ditemukan';
            $data = [];
        }

        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data
        ];

        // return response
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PajakRequest $request, $id)
    {
        try {
            $this->model->update($request->all(), $id);
            $success = 1;
            $message = "Data Pajak Berhasil Di Update";
        } catch (Exception $ex) {
            $success = 0;
            $message = $ex->getMessage();
        }

        // make response
        $response = [
            'success' => $success,
            'message' => $message
        ];

        // return response
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
           $this->model->destroy($id);
            $success = 1;
            $message = "Data Pajak Berhasil Di Delete";
        } catch (Exception $ex) {
            $success = 0;
            $message = $ex->getMessage();
        }

        // make response
        $response = [
            'success' => $success,
            'message' => $message
        ];

        // return response
        return response()->json($response, 200);
    }
}
