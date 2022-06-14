<?php

namespace App\Http\Controllers\Admin\slide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\silde;

class SildeController extends Controller
{
    //
    protected $slide;


    public function create(){
        return view('admin.slider.add',[
            'title'=>'Thêm slide mới !',

        ]);

    }
    public function store(Request $request){
           $img='';
           if($request->hasFile('thumb')){
               $this->validate($request,[
                    'thumb'=>'mimes:jpg,jpeg,png,gift|max:2048',

               ],
            [
                'thum.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'thum.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]
        );

             $thum = $request->file('thumb');
             $img=time().'_'.$thum->getClientOriginalName();
             $desti = public_path('nvs');
             $thum->move($desti,$img);
           }
           $allRequest = $request->all();
           $name= $allRequest['name'];
           $url= $allRequest['url'];
           $sort_by=$allRequest['sort_by'];
           $active= $allRequest['active'];
              $install = array(
                  'name'=>$name,
                  'url'=>$url,
                'sort_by'=>$sort_by,
                'thumb'=>$img,
                'active'=>$active
              );
              //install
              $insertData = DB::table('sildes')->insert($install);
              if($insertData){
                Session::flash('success', 'Thêm Slider mới thành công!');

               }
               else{
                Session::flash('error', 'Thêm Slider thất bại!');
               }

               return redirect()->back();


    }
    public function index(){
        return view('admin.slider.list',
        [
            'title'=>'Danh sách slide',
            'silder'=>$this->slide->getshow()
        ]);
    }
    public function destroy($id){
            $destroy = Silde::where('id',$id)->delete();
            return redirect()->back();
    }
    public function show($id){
        $silder = silde::where('id',$id)->get();
          return view('admin.slider.edit',[
                    'title'=>'sua silde',
                   'silder'=>$silder

          ]);
    }
    public function update(Request $request, $id ){
            $this->validate($request,
            [
                'name' => 'required',
               'url' => 'required',


            ],
            [
                'name.required' => 'Bạn chưa nhập tên !',
                'url.required' => 'Bạn chưa nhập nội dung!',

            ]);
            if($request->hasFile('thumb')){
                $this->validate($request,[
                    'thum' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    'thum.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'thum.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]);
                $getHT = DB::table('sildes')->select('thumb')->where('id',$request->id)->get();
                if($getHT[0]->thumb != '' && file_exists(public_path('nvs/'.$getHT[0]->thumb)))
                {
                    unlink(public_path('/nvs/'.$getHT[0]->thumb));
                }
                 //save img
                 $thumb = $request->file('thumb');
                 $getthumb = time().'_'.$thumb->getClientOriginalName();
                 $despath =  public_path('nvs/');
                 $thumb->move($despath,$getthumb);
                 $updateThumb = DB::table('sildes')->where('id',$id)->update(['thumb'=>$getthumb]);


            }
            $updateData = DB::table('sildes')->where('id',$id)->update([
                    'name'=>$request->name,
                    'url'=>$request->url,
                    'sort_by'=>$request->sort_by,


            ]);
            if($updateData){
                Session::flash('success', 'Sửa học sinh thành công!');
            }
            else{
                Session::flash('success', 'Sửa học sinh thành công!');
            }
            return redirect()->back();

    }
}
