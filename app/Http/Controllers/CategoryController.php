<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view("cms.categoryPages.show_categories",["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cms.categoryPages.add_category");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "categoryName" => "required",
                "categoryType" => "required"
            ],
            [
                "categoryName.required" => "يجب عليك إدخال اسم الصنف الذي تريدإضافته",
                "categoryType.required" => "يجب عليك إدخال تحديد نوع الصنف الذي تريد إضافته"
            ]
        );

        $category=new Category();
        $category->categoryName=$request->get("categoryName");
        $category->categoryType=$request->get("categoryType");
        $category->status=$request->get("status");

        $isSaved=$category->save();
        if($isSaved){
            session()->flash("message","تم حفظ المنتج الصنف");
            return redirect()->back();
        }else{
            session()->flash("message","حدثت مشكلة ولم يتم حفظ الصنف");
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        
        $categoryData=Category::findOrFail($id);
        return view("cms.categoryPages.update_category",["categoryData"=>$categoryData]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate(
            [
                "categoryName" => "required",
                "categoryType" => "required"
            ],
            [
                "categoryName.required" => "يجب عليك إدخال اسم الصنف الذي تريد تعديله",
                "categoryType.required" => "يجب عليك إدخال تحديد نوع الصنف الذي تريد تعديله"
            ]
        );

        $category=Category::findOrFail($id);
        $category->categoryName=$request->get("categoryName");
        $category->categoryType=$request->get("categoryType");
        $category->status=$request->get("status");

        $isUpdated=$category->update();
        if($isUpdated){
            session()->flash("message","تم تعديل المنتج الصنف");
            return redirect()->back();
        }else{
            session()->flash("message","حدثت مشكلة ولم يتم تعديل الصنف");
            return redirect()->back();
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $category=Category::findOrFail($id);
        $isDaeleted=$category->delete();
        if($isDaeleted){
            return response()->json(["icon"=>"success","title"=>"تم حذف الصنف بنجاح"],200);
            return redirect()->back();
        }else{
            return response()->json(["icon"=>"error","title"=>"حدثت مشكلة ولم يتم حذف الصنف "],400);
            return redirect()->back();


        }
    }
}
