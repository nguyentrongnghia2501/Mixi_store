<?php

namespace App\Helpers;
use Illuminate\Support\Str;
class Helper{
            public static function menu($menus , $parent_id=0,$char=''){
                                $html='';
                                foreach($menus as $key =>$menu){
                                    if($menu->parent_id == $parent_id){
                                            $html.='
                                            <tr>
                                            <th>'.$menu->id.'</th>
                                            <th>'.$char.$menu->name.'</th>
                                            <th>'.self::active($menu->active).'</th>
                                            <th>'.$menu->updated_at.'</th>
                                              <th>
                            <a class="btn btn-warning btn-sm"  onclick="removeRow('.$menu->id.',\'/admin/menus/delete\')" href=""><i class="fa-solid fa-delete-left"></i></a>
                            <a href="/admin/menus/edit/'.$menu->id.'" class="btn btn-success btn-sm"  onclick="remove">
                                                   <i class="fa-solid fa-file-pen"></i>
                           </a>
                                              </th>
                                            </tr>
                                            ';
                                            unset($menus[$key]);
                                            $html .=self::menu($menus,$menu->id,$char .'--');
                                    }
                                }
                                return $html;

            }
            public static function active($active =0){

                 return $active ==0 ? '<span class="btn btn-danger">No</span>': '<span class="btn btn-success">Yes</span>';

            }
            public static function menus($menus,$parent_id=0){
              //// truyền menu và làm menu thứ cấp ở web chính

                 $html='';
                 foreach($menus as $key =>$menu){
                      if($menu->parent_id==$parent_id)
                      {

                        $html.='
                              <li class="dropdown">
                              <a  href="/danh-muc/'.$menu->id.'-'. Str::slug($menu->name, '-').'.html" class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;" >
                              '.$menu->name.'
                              </a>';

                              if(self::isChild($menus , $menu->id)){

                                    $html.=' <ul class="dropdown-menu"> ';

                                    //  $html.= self::menus($menus,$menu->id);
                                     dd($menu->name);



                                    $html.=' </ul>';


                              }

                             $html.=' </li>
                        ';
                      }

                 }
                 return $html;
            }
            public static function isChild($menus,$id){

                  foreach ($menus as $menu){
                    if($menu->parent_id == $id)
                    {
                       return true;
                    }

                      return false;


                  }

            }


            /// pirice dùng đi dùng lại
             public static function price($price=0,$price_sale=0)
             {
                    if($price_sale !=0) return $price_sale;
                    if($price != 0 ) return $price;
                    return '<a href="/lien-he">Liên hệ</a>';


             }


}
