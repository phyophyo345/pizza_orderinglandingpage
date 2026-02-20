<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //route to create page
    public function createPage(){
        return view('home.create');
    }
    //create new categories
    public function create(Request $request){

        // dd($request->toArray());
        $data=[
            'main_type'=>$request->mainType,
            'sub_type'=>$request->subType,
            'details'=>$request->details,
            'price'=>$request->price
        ];
        $file=$request->file('image');
        $fileName=uniqid().$file->getClientOriginalName();
        $file->move(public_path().'/image/',$fileName);
        $data['img']=$fileName;
        Category::create($data);
        return back();
    }
    //route to update page
    public function update($id){
        // dd($id);
        $categories=Category::find($id);
        return view('home.update',compact('categories'));
    }
    //edit category's data
    public function edit($id,Request $request){
        // dd($id);
        $dbImage=Category::where('id',$id)->value('img');
        $newImage=$request->image;
        // dd($dbImage);
        // dd($newImage);
        // $publicImg=public_path('image/'.$dbImage);
        // dd($publicImg);
        $data=[
            'main_type'=>$request->mainType,
            'sub_type'=>$request->subType,
            'details'=>$request->details,
            'price'=>$request->price
        ];

        if(!empty($newImage)){
             if(!empty($dbImage) && file_exists(public_path('image/'.$dbImage))){
             @unlink(public_path('image/'.$dbImage));
            }
            $file=$newImage;
            $fileName=uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/image/',$fileName);
            $data['img']=$fileName;
        }
        Category::where('id',$id)->update($data);
        return redirect('/');
        // $categories=Category::get();
        // return view('home.child',compact('categories'));


    }
}
