<?php

namespace App\Http\Services\Product;
use App\Models\product;
use Symfony\Component\Console\Input\Input;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
class ProductService{

          public function getMenu()
          {
         return Menu::where('active',1)->get();

          }


          protected function isValidPrice($request){

                    // if($request->input('price')!=0 && $request->input('price_sale') !=0
                    //  && $request->input('price_sale') >= $request->input('price')
                    //  )
                    // {
                    //         Session::flash('error','Giá giảm phải nhỏ hơn giá gốc');
                    //         return false;
                    // }
                    // if($request->input('price_sale')!=0 && (int)$request->input('price_sale')==0)
                    // {
                    //     Session::flash('error','Vui lòng nhập giá gốc !');
                    //     return false;
                    // }
                    // return true;

          }
          public function insert($request)
          {
                    // $isValidPrice = $this->isValidPrice(($request));
                    // if($isValidPrice == false){
                    //     return false;
                    // }




                    try {
                        //code...
                    // $request->except('_token');
                    // product::create([
                    //     'name'=>(string) $request->input('name'),
                    //     'description'=>(string) $request->input('description'),
                    //     'content'=>(string) $request->input('content'),
                    //     'menu_id'=>(int) $request->input('menu_id'),
                    //     'price'=>(int) $request->input('price'),
                    //     'price_sale'=>(int) $request->input('price_sale'),
                    //     'thum'=>(string) $filename
                    // ]);




                    Session::flash('success','Thêm sản phẩm thành công');
                    } catch (\Throwable $err) {
                        //throw $th;
                        Session::flash('error','Thêm sản không thành công');
                        // \Log::info($err->getMessage());
                        return false;
                    }
                    return true;
          }
          ///list
          public function getSP(){
              return Product::orderByDesc('id')->paginate(15);
          }

}
