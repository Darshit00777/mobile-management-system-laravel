<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    // Display all brands
    public function index()
    {
        $brands = Brand::all();

        return view('brand.index', compact('brands'));
    }

    // Display the add brand page
    public function create()
    {
        return view('brand.create');
    }

    // Save a new brand
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required'
        ]);

        Brand::create([
            'brand_name' => $request->brand_name
        ]);

        return redirect('/brand')->with('success', 'Brand added successfully!');
    }

    // Display the edit brand page
    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('brand.edit', compact('brand'));
    }

    // Update a brand
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required'
        ]);

        $brand = Brand::find($id);
        $brand->update([
            'brand_name' => $request->brand_name
        ]);

        return redirect('/brand')->with('success', 'Brand updated successfully!');
    }

    // Delete a brand
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect('/brand')->with('success', 'Brand deleted successfully!');
    }
}
