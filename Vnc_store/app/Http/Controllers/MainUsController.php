<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainUsController extends Controller
{
    //
    public function index(){

        $menus_list= menu::where('parent_id',0)->get();
        // $product = product::select('id','name','price','price_sale','thum')->orderByDesc('id')->limit(6);
        $product = DB::table('products')->select('id','name','price','price_sale','thum')->orderByDesc('id')->limit(6)->get();

        return view('main',[
            'title'=>'Vnc Store',
            'product'=>$product

        ])->with('menus_list',$menus_list);

    }
    public function single($id)
    {

        $menus_list= Menu::where('parent_id',0)->get();
             $product_id = product::where('id',$id)->get();
            // $product_id = product::select('id','name','price','price_sale','thum')->orderByDesc('id');
            $product =DB::table('products')->limit(3)->get();

            return view('SingleProduct',[

                    'title'=>'CHi tiết sản phẩm',

                    'product_id'=>$product_id,
                    'product'=>$product,
            ]
            )->with('menus_list',$menus_list);
    }
    public function Shopage(){
        $menus_list= Menu::where('parent_id',0)->get();
        $product =DB::table('products')->limit(8)->get();

         return view('vncshop',[

            'title'=>'Shop page',
            'menus_list'=>$menus_list,
            'product'=>$product,

         ]);
    }
    public function search(Request $request)
    {
         $search = $request->search;
        //  $result = DB::table('products')->Where ('name')->like($search);

        $result= DB::table('products')->where('name', 'LIKE', "%$search%")->orderBy('name')->paginate(5);;

        $menus_list= Menu::where('parent_id',0)->get();
        return view('result_search',[
            'title'=>'Search '.$search,
            'result'=>$result,
            'menus_list'=>$menus_list,

        ]);
    }
    public function danhmuc($id){
        $menus_list= Menu::where('parent_id',0)->get();
        $getData= product::with('menu')->where('menu_id',$id)->paginate(15);
        //   dd($getData);
        return view('hang',[
            'title'=>'Danh mục ',
            'getData'=>$getData,
            'menus_list'=>$menus_list,

        ]);
    }
}
