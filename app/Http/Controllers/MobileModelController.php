<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\MobileModel;

class MobileModelController extends Controller
{
    public function index()
    {
        $brand = Brand::all();
        $models = MobileModel::all();

        return view('mobile_models.index', compact('models','brand'));
    }

    public function create()
    {
        $brands = Brand::all();

        return view('mobile_models.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'model_name' => 'required'
        ]);

        MobileModel::create([
            'brand_id' => $request->brand_id,
            'model_name' => $request->model_name
        ]);

        return redirect('/mobile-models')
                     ->with('success', 'Mobile model added successfully!');
    }

    public function edit($id)
    {
        $model = MobileModel::find($id);
        $brands = Brand::all();

        return view('mobile_models.edit', compact('model', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'model_name' => 'required'
        ]);

        $model = MobileModel::find($id);

        $model->update([
            'brand_id' => $request->brand_id,
            'model_name' => $request->model_name
        ]);

        return redirect('/mobile-models')
                     ->with('success', 'Mobile model updated successfully!');
    }

    public function destroy($id)
    {
        $model = MobileModel::find($id);
        $model->delete();

        return redirect('/mobile-models')
                     ->with('success', 'Mobile model deleted successfully!');
    }
}
