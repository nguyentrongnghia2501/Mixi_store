<?php

namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

Class MenuService{

                public function getParent(){
                        return Menu::where('parent_id',0)->get();

                }
            public function create($request){


                    try {
                         Menu::create([
                            'name'=>(string) $request->input('name'),
                            'parent_id'=>(int)$request->input('parent_id'),
                            'content'=>(string)$request->input('content'),
                            'active'=>(int) $request->input('active'),


                         ]);
                         Session::flash('success','Tạo danh mục thành công ');
                    } catch (\Throwable $err) {
                        Session::flash('error',$err->getMessage());
                        return false;
                    }
                        return true;
            }
            //// get alll
            public function getall(){
                    return Menu::orderbyDesc('id')->paginate(20);

            }
            ///xoas
            public function delete($request){
                    $id=(int) $request->input('id');
                    $menu = Menu ::where('id',$id)->first();
                //      first nếu có sẽ lấy 1
                if($menu){
                                return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
                }
                return false;
            }
                public function update($request , $menu){
                                    // fill update tất cả thông tin request trả lên
                        $menu->name =(string) $request->input('name');

                        if($request->input('parent_id')!= $menu->id){
                            $menu->parent_id =(int) $request->input('parent_id');
                        }
                        $menu->content =(string) $request->input('content');
                        $menu->active =(int) $request->input('active');
                        $menu->save();
                        Session::flash('success','Cập nhật danh mục thành công');
                        return true;
                }


}
