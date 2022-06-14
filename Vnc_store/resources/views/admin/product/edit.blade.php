@extends('admin.main')
@section('content')

<div class="col-12 grid-margin stretch-card">

                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    @include('admin.alert')
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                      @foreach($product as $products)
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" value="{{$products->name}}" name="name" id="name" placeholder="Name">
                        <!-- {{ old('name')}} khi lỗi rederic lại trang không bị mất dữ liệu -->
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Danh mục cha</label>
                        <?php
                        $menus = App\Models\Menu::where('parent_id',0)->get();
                        ?>

                          <select class="form-control" name="parent_id">
                                <option value="0">Danh mục cha</option>
                                    @foreach($menus as $menu)
                                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                                    @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Description</label>
                        <textarea class="form-control" rows="5" id="description" name="description" value="{{ old('description')}} ">{{$products->description}}</textarea>
                        <!-- -->
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Content </label>
                        <textarea class="form-control" rows="5" id="content" name="content" value="{{ old('content')}}" >{{$products->content}}</textarea>
                      </div>
                      <!-- <div class="form-group">
                        <label for="exampleSelectGender"></label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div> -->
                      <div class="form-group">
                        <label for="exampleInputCity1">price</label>
                        <input type="number" class="form-control" id="price" name="price"  value="{{$products->price}}" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">price_sale</label>
                        <input type="number" class="form-control" id="price_sale" name="price_sale"  value="{{$products->price_sale}}" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <img src="/nvs/{{$products->thum}}" alt="">
                        <input class="form-control form-control-lg" id="thum" name='thum' type="file"  value="{{ old('file')}}">

                      </div>
                      <div class="form-group">
                      <input type="radio" class="form-check-input" name="active" id="active" value="1" checked=""> Có <i class="input-helper"></i></label>

                      </div>
                      <div class="form-group">

                      <input type="radio" class="form-check-input" name="active" id="active" value="0" checked=""> Không <i class="input-helper"></i></label>
                      </div>
                      @endforeach

                      <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                      @csrf
                    </form>
                  </div>
                </div>
              </div>





@endsection
