@extends('admin.main')
@section('content')
<div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>

                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample" method="POST" active="">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Tên danh mục</label>
                        <input type="text" name="name" id="name" class="form-control" id="exampleInputUsername1" placeholder="Tên danh mục ...">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Danh mục cha</label>
                          <select class="form-control" name="parent_id">
                                <option value="0">Danh mục cha</option>
                                    @foreach($menus as $menu)
                                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                                    @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả</label>
                       <textarea name="content" id="content" cols="30" rows="10"></textarea>
                      </div>
                      <div class="form-group">
                      <input type="radio" class="form-check-input" name="active" id="active" value="1" checked=""> Có <i class="input-helper"></i></label>

                      </div>
                      <div class="form-group">

                      <input type="radio" class="form-check-input" name="active" id="active" value="0" checked=""> Không <i class="input-helper"></i></label>
                      </div>

                      <div class="form-check form-check-flat form-check-primary">

                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me </label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                      @csrf
                    </form>
                  </div>
                </div>
              </div>
        </div>
        <label class="form-check-label">


@endsection('content')
