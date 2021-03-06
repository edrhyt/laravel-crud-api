<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all brands
        $brands = Brand::all();

        foreach($brands as $brand){
            $brand->products_list = Brand::find($brand->id)->products;
        }

        return $brands;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create brand
        $request->validate([
            'slug' => ['required', 'unique:brands,slug'],
            'brand_name' => 'required',
            'country' => 'required',
        ]);
        
        return Brand::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get single brand
        return Brand::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // update brand
         $brand = Brand::find($id);
         $brand->update($request->all());
         $brand->status = "Updated Successfully.";
 
         return $brand;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete brand
        $brand = Brand::find($id);
        Brand::destroy($id);
        $brand->status = "Deleted Successfully.";

        return $brand;
    }
}
