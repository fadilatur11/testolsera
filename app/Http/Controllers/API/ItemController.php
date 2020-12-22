<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;
use Exception;
// use DB;


class ItemController extends Controller
{
    public function __construct()
    {
        $this->service = new ItemService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::enableQueryLog();
        $item = $this->service->index()->get();
        // dd(DB::getQueryLog());
        $response = [
            'data' => $item
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
    public function store(ItemRequest $request)
    {
        // try to store the item
        try {
            $this->service->create($request->all());
            $success = 1;
            $message = "Data Item Berhasil Disimpan";
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
        $item = $this->service->show($id)->first();
        if($item)
        {
            $success = 1;
            $message = "Berhasil mendapatkan Data Item " . $item->nama;
            $data = $item;
        } else {
            $success = 0;
            $message = "Oopps! Data Tidak Ditemukan";
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
    public function update(ItemRequest $request, $id)
    {
        try {
            $this->service->update($request->all(),$id);
            $success = 1;
            $message = "Data Item Berhasil Di Update";
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
            $this->service->destroy($id);
            $success = 1;
            $message = "Data Item Berhasil Di Delete";
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
