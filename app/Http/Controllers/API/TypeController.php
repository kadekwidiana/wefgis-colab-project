<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataType = Type::all();
        return response()->json($dataType);
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type_name' => 'required',
            'image' => 'required'
        ]);

        try {
            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('type-image');
            }

            $type = Type::create($validatedData);
            if ($type != null) {
                return response()->json([
                    'success' => true,
                    'message' => 'Type successfuly added',
                    'data' => $type
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Type failed added'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $type = Type::findOrFail($id);
            $crops = Crop::where('id_type', $id)->get();

            return response()->json([
                'success' => true,
                'type' => $type->type_name,
                'dataCrop' => $crops
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
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
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type_name' => 'required'
        ]);

        try {
            $type = Type::findOrFail($id);

            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($type->image) {
                    Storage::delete($type->image);
                }
                // Simpan gambar baru
                $validatedData['image'] = $request->file('image')->store('type-image');
            }

            $type->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Type success edit',
                'data' => $type
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
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
            $type = Type::findOrFail($id);
            $dataCrop = Crop::where('id_type', $id)->first();
            if ($dataCrop) {
                $dataCrop->delete();
                return response()->json([
                    'message' => 'This type hasmany data crops'
                ]);
            }

            if ($type->image) {
                Storage::delete($type->image);
            }

            $type->delete();

            return response()->json([
                'success' => true,
                'message' => 'Type success deleted'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
    }
}
