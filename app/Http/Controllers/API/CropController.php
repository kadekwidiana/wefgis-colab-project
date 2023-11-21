<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CropController extends Controller
{
    // data agregat
    public function dataAgregat(Request $request)
    {
        $search = $request->search;
        $typesQuery = Type::query();

        // Jika ada kriteria pencarian, tambahkan where clause
        if ($search) {
            $typesQuery->where('type_name', 'like', '%' . $search . '%');
        }

        $types = $typesQuery->get();
        $totalLocation = Crop::count();

        $result = [];

        foreach ($types as $type) {

            // Count total valid data crop by type
            $validCropCount = $type->crops()->where('valid', 1)->count();

            // Count total data crop by type
            $totalCropCount = $type->crops()->count();


            $result[] = [
                'typeName' => $type->type_name,
                'imageType' => $type->image,
                'validCropCount' => $validCropCount,
                'totalCropCount' => $totalCropCount,
                'totalLocation' => $totalLocation
            ];
        }


        return response()->json($result);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $publish = $request->publish;

        $query = Crop::query();

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('id_type', 'like', '%' . $search . '%')
                    ->orWhereHas('type', function ($query) use ($search) {
                        $query->where('type_name', 'like', '%' . $search . '%');
                    });
            });
        }
        if ($publish === '1') {
            $query->where('valid', 1);
        }
        if ($publish === '0') {
            $query->where('valid', 0);
        }

        $dataCrop = $query->latest()->paginate(10);

        foreach ($dataCrop as &$item) {
            $item->id_type = (int) $item->id_type;
            $item->id_user = (int) $item->id_user;
            $item->valid = (int) $item->valid;
        }
        unset($item); // Unset the reference to avoid unintended modifications outside the loop
        
        // Now $dataCrop has the desired fields cast to integers
        
        return response()->json($dataCrop);
    }

    public function allDataCrop()
    {
        $dataCrop = Crop::all();
        foreach ($dataCrop as &$item) {
            $item->id_type = (int) $item->id_type;
            $item->id_user = (int) $item->id_user;
            $item->valid = (int) $item->valid;
        }
        unset($item); 
        return response()->json($dataCrop);
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
        $validateData = $request->validate([
            'id_user' => 'required',
            'id_type' => 'required',
            'label' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'image' => 'required',
            'plant_age' => 'required',
            'valid' => 'required',
        ]);

        try {
            $cropType = Type::where('type_name', $request->input('label'))->first();

            if ($cropType) {
                $validateData['id_type'] = $cropType->id;
            } else {
                $validateData['id_type'] = $request->input('type_name');
            }

            if ($request->input('valid') == 0) {
                $validateData['id_type'] = $request->input('id_type');
            }

            if ($request->file('image')) {
                switch ($validateData['id_type']) {
                    case 1:
                        $validateData['image'] = $request->file('image')->store('paddy-image');
                        break;
                    case 2:
                        $validateData['image'] = $request->file('image')->store('cassava-image');
                        break;
                    case 3:
                        $validateData['image'] = $request->file('image')->store('corn-image');
                        break;
                    case 4:
                        $validateData['image'] = $request->file('image')->store('sugarcane-image');
                        break;
                    case 5:
                        $validateData['image'] = $request->file('image')->store('soybean-image');
                        break;
                    default:
                        $validateData['image'] = $request->file('image')->store('all-image-crops');
                        break;
                }
            }

            $crop = Crop::create($validateData);

            if ($crop != null) {
                return response()->json([
                    'success' => true,
                    'message' => 'Crop data created successfully',
                    'data' => $crop
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Crop data failed created',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Err',
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
            $crop = Crop::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $crop
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
        $validateData = $request->validate([
            'id_user' => 'required',
            'id_type' => 'required',
            'label' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            // 'image' => 'required',
            'plant_age' => 'required',
            'valid' => 'required',
        ]);

        try {
            $crop = Crop::findOrFail($id);

            $cropType = Type::where('type_name', $request->input('label'))->first();

            if ($cropType) {
                $validateData['id_type'] = $cropType->id;
            } else {
                $validateData['id_type'] = $request->input('type_name');
            }

            if ($request->input('valid') == 0) {
                $validateData['id_type'] = $request->input('id_type');
            }


            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($crop->image) {
                    Storage::delete($crop->image);
                }
                switch ($validateData['id_type']) {
                    case 1:
                        $validateData['image'] = $request->file('image')->store('paddy-image');
                        break;
                    case 2:
                        $validateData['image'] = $request->file('image')->store('cassava-image');
                        break;
                    case 3:
                        $validateData['image'] = $request->file('image')->store('corn-image');
                        break;
                    case 4:
                        $validateData['image'] = $request->file('image')->store('sugarcane-image');
                        break;
                    case 5:
                        $validateData['image'] = $request->file('image')->store('soybean-image');
                        break;
                    default:
                        $validateData['image'] = $request->file('image')->store('all-image-crops');
                        break;
                }
            }

            $crop->update($validateData);

            return response()->json([
                'success' => true,
                'message' => 'Crop data updated successfully',
                'data' => $crop
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
            $crop = Crop::findOrFail($id);

            // Hapus gambar terkait jika ada
            if ($crop->image) {
                Storage::delete($crop->image);
            }

            $crop->delete();

            return response()->json([
                'success' => true,
                'message' => 'Crop deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
    }
}
