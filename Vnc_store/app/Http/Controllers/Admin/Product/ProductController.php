<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


use App\Http\Services\Product\ProductService;
use App\Http\Requests\product\ProductRequest;

class ProductController extends Controller
{
    //
    protected $prodictService;
    public function __construct(ProductService $productService)
    {
         $this->productService = $productService;

    }


    public function index()
    {
        $getData= product::with('menu')->orderByDesc('id')->paginate(15);

         return view('admin.product.list',[
             'title'=>'Danh sách sản phẩm',

         ])->with('listProduct',$getData);

        //  return view('hocsinh.list')->with('listhocsinh',$getData);
    }


    public function create()
    {
        //

                return view('admin.product.add',[
                    'title'=>'Thêm sản phẩm mới',

                ]);


    }



    public function store(ProductRequest $request)
    {
        $img ='';
        if($request->hasFile('thum')){
              $this->validate($request,[
                        'thum'=>'mimes:jpg,jpeg,png,gif|max:2048',
              ],
            [
                'thum.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				'thum.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]
        );
             $thum = $request->file('thum');
             $img=time().'_'.$thum->getClientOriginalName();
             $destination=public_path('nvs');
             $thum->move($destination, $img);

        }
        $allrequest = $request->all();
        $name= $allrequest['name'];
        $description= $allrequest['description'];
        $content= $allrequest['content'];
        // $menu_id= $allrequest['menu_id'];
        $menu_id = $allrequest['parent_id'];
        $active =$allrequest['active'];
        $price= $allrequest['price'];
        $price_sale= $allrequest['price_sale'];
           $instalToDatabase = array(
               'name'=>$name,
                'description'=>$description,
                'content'=>$content,
                 'menu_id'=>$menu_id,
                  'price'=>$price,
                   'price_sale'=>$price_sale,
                   'thum'=>$img,
                    'active'=>$active
                );

                   /// insert
                   $insertData = DB::table('products')->insert($instalToDatabase);
                   if($insertData){
                    Session::flash('success', 'Thêm mới học sinh thành công!');

                   }
                   else{
                    Session::flash('error', 'Thêm thất bại!');

                   }


        return redirect()->back();
    }



    public function show($id)
    {
                   $Product = product :: where('id',$id)->get();

                   return view('admin.product.edit',[
                       'title'=>'Sửa sản phẩm',
                       'product'=>$Product

                   ]);


    }



    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
            	//Cap nhat sua product


	//Kiểm tra giá trị
	$this->validate($request,
		[
			'name' => 'required',
			'description' => 'required',
			'content' => 'required',
		],
		[
			'name.required' => 'Bạn chưa nhập tên !',
			'description.required' => 'Bạn chưa nhập nội dung!',
			'content.required' => 'Bạn chưa chọn content!',
		]
	);
    if($request->hasFile('thum')){
		$this->validate($request,
			[
				'thum' => 'mimes:jpg,jpeg,png,gif|max:2048',
			],
			[
				'thum.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				'thum.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
			]
		);

		//Xóa file hình thẻ cũ
		$getHT = DB::table('products')->select('thum')->where('id',$request->id)->get();
		if($getHT[0]->thum != '' && file_exists(public_path('nvs/'.$getHT[0]->thum)))
		{
			unlink(public_path('/nvs/'.$getHT[0]->thum));
		}

		//Lưu file hình thẻ mới
		$thum = $request->file('thum');
		$getthum = time().'_'.$thum->getClientOriginalName();
		$destinationPath = public_path('nvs/');
		$thum->move($destinationPath, $getthum);
		$updatethum = DB::table('products')->where('id', $request->id)->update([
			'thum' => $getthum
		]);


	}
	  //Thực hiện câu lệnh update với các giá trị $request trả về
	    $updateData = DB::table('products')->where('id', $request->id)->update([
		'name' => $request->name,
		'description' => $request->description,
		'content' => $request->content,
        'price' => $request->price,
        'price_sale' => $request->price_sale, ]);
        if ($updateData) {
            Session::flash('success', 'Sửa học sinh thành công!');
        }else {
            Session::flash('error', 'Sửa thất bại!');
        }

        //Thực hiện chuyển trang
        return redirect()->back();

    }


    public function destroy($id)
    {
        $deleteProduct = product::where('id',$id)->delete();
        return redirect()->back();

    }
}
