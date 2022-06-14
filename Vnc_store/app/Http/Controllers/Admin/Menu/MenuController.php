<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\menu;
use App\Http\Requests\Menu\MenuCreateFormRequest;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    //
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create(){

        return view('admin.menu.add',[
            'title'=>'Them danh muc',
            'menus'=>$this->menuService->getParent()
        ]);
    }
    public function store(MenuCreateFormRequest $request){
                // dd($request->all());
            $result = $this->menuService->create($request);
            return redirect()->back();

    }


    ///list

    public function index(){

        return view('admin.menu.list',[
                'title'=>'danh sach danh muc',
                'menus'=>$this->menuService->getall()

        ]);
    }
     //show
     public function show(Menu $menu){
            return view('admin.menu.edit',
           [
                    'title'=>'Chỉnh sửa danh mục'.$menu->name,
                    'menu'=>$menu,
                    'menus'=>$this->menuService->getParent()


           ]);
    }
    ///delete
    public function delete(Request $request){
        $result=$this->menuService->delete($request);
    }
   public function update(menu $menu,MenuCreateFormRequest $request){
                $this->menuService->update($request ,$menu);
                return redirect('/admin/menus/list/');
       }
}
