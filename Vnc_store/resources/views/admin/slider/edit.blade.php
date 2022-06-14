@extends('admin.main')
@section('content')

<div class="col-12 grid-margin stretch-card">

                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    @include('admin.alert')
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        @foreach($silder as $key =>$silders)
                      <div class="form-group">
                        <label for="exampleInputName1">Tiêu đề</label>
                        <input type="text" class="form-control" value="{{$silders->name}}" name="name" id="name" placeholder="Name">
                        <!-- {{ old('name')}} khi lỗi rederic lại trang không bị mất dữ liệu -->
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Đường dẫn</label>
                        <input type="text" class="form-control" value="{{$silders->url}}" name="url" id="url" placeholder="Name">
                        <!-- {{ old('name')}} khi lỗi rederic lại trang không bị mất dữ liệu -->
                      </div>

                      <div class="form-group">
                        <label>File upload</label>
                        <img src="/nvs/{{$silders->thumb}}" alt="">
                        <input class="form-control form-control-lg" id="thumb" name='thumb' type="file"  value="">

                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">sắp xếp</label>
                        <input type="number" class="form-control" id="sort_by" name="sort_by"  value="{{$silders->sort_by}}" placeholder="Location">
                      </div>


                      <div class="form-group">
                      <input type="radio" class="form-check-input" name="active" id="active" value="1" checked=""> Có <i class="input-helper"></i></label>

                      </div>
                      <div class="form-group">

                      <input type="radio" class="form-check-input" name="active" id="active" value="0" checked=""> Không <i class="input-helper"></i></label>
                      </div>
                      @endforeach
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Tạo Silder</button>
                      <button class="btn btn-dark">Cancel</button>
                      @csrf
                    </form>
                  </div>
                </div>
              </div>

@endsection
