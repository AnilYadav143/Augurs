<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    /**
     * add Product page 
     **/
    public function index(){
        $product= Product::get();
        return view('product',compact('product'));
    }
    /**
     * store product
     **/
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);

        $res = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
        ]);
        if($res){
            toast('successfull product saved','success');
        }else{
            toast('product not saved','error');
        }
        return redirect()->back();
    }

    /**
     * delete product function
     **/
    public function Edit($id){
        $single_pr = Product::find($id);
        $product   = Product::get();
        return view('product',compact('single_pr','product'));
    }
    /**
     * Update product function
     **/
    public function Update(Request $request, $id){
        $product = product::find($id);
        $res = $product->update([
            'name'=>$request->name??$request->name,
            'price'=>$request->price??$request->price,
            'description'=>$request->description??$request->description,
        ]);
        if($res){
            toast('successfull product Updated','success');
        }else{
            toast('product not Updated','error');
        }
        return redirect()->back();
    }

    public function Delete($id){
        $res = Product::find($id)->delete();
        if($res){
            toast('successfull deleted product ','success');
        }else{
            toast('product not deleted','error');
        }
        return redirect()->back();
    }
    /**
     * Search Product by name and description
     **/
    public function Search(Request $request){
        $search = $request->search;
        $product = Product::where('name','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')->get();
        return view('product',compact('product'));
    }


}
