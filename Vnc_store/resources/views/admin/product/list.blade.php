@extends('admin.main')
@section('content')
          <table class="table">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>description</td>
                        <td>content</td>
                        <td>Hãng</td>
                        <td>Price</td>
                        <td>Price_sale</td>
                        <td>Imager</td>

                        <td>Chức Năng</td>
                    </tr>
                    <tbody>
                                @foreach($listProduct as $key =>$product)
                            <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->menu->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->price_sale }}</td>
                                        <td>

                                        <img style="width:100px;height:100px;" src="/nvs/{{$product->thum}}" alt="{{ $product->name }}" >
                                      </td>
                                       <td>
                                       <a class="btn btn-warning btn-sm" href="/admin/products/delete/{{$product->id}}">
                                           <i class="fa-solid fa-delete-left"></i>
                                       </a>

                                                  <a href="/admin/products/edit/{{$product->id}}" class="btn btn-success btn-sm">

                                                      <i class="fa-solid fa-file-pen"></i>
                                                 </a>

                                       </td>



                            </tr>



                               @endforeach

                    </tbody>



          </table>

@endsection
