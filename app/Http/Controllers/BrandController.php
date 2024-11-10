<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {

        $brands = Brand::limit(10)->get();
        return view('brands.index', compact('brands'));
    }
    public function create()
    {

        return view('brands.create');
    }
    public function store(BrandRequest $request)
    {
        $req = $request->validated();
        // dd($req);
        Brand::create($req);
        return redirect()->route('brands.index')->with('success', 'Brand created successfully');
    }
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }
    public function update(BrandRequest $request, Brand $brand)
    {
        $req = $request->validated();
        // dd($req);
        $brand->update($req);
        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
    }
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
    }
}
