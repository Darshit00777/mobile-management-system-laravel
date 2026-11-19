<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\Brand;
use App\Models\MobileModel;


class MobileController extends Controller
{
    public function index()
    {
        $mobiles = Mobile::with(['brand', 'mobileModel'])->get();

        return view('mobiles.index', compact('mobiles'));
    }

    public function create()
    {
        $brands = Brand::all();
        $models = MobileModel::all();

        return view('mobiles.create', compact('brands', 'models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'mobile_model_id' => 'required|exists:mobile_models,id',
            'storage' => 'required',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'photo' => 'nullable'
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload'), $filename);
            $data['photo'] = $filename;
        }

        Mobile::create($data);

        return redirect('/mobiles/manage')
                     ->with('success', 'Mobile added successfully!');
    }

    public function edit($id)
    {
        $mobile = Mobile::find($id);
        $brands = Brand::all();
        $models = MobileModel::all();

        return view('mobiles.edit', compact('mobile', 'brands', 'models'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'mobile_model_id' => 'required|exists:mobile_models,id',
            'storage' => 'required',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $mobile = Mobile::find($id);
        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload'), $filename);
            $data['photo'] = $filename;
        }

        $mobile->update($data);

        return redirect('/mobiles/manage')
                     ->with('success', 'Mobile updated successfully!');
    }

    public function destroy($id)
    {
        $mobile = Mobile::find($id);
        $mobile->delete();

        return redirect('/mobiles/manage')
                     ->with('success', 'Mobile deleted successfully!');
    }
}
