
<!DOCTYPE html>
<html lang="en">
  <head>
  @include('head')
  </head>
  <body>



@include('head_menu')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
              @foreach($getData  as $getDatas)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="/nvs/{{$getDatas->thum}}" alt="">
                        </div>
                        <h2><a href="/single-product/{{$getDatas->id}}">{{$getDatas->name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>${{$getDatas->price_sale}}</ins> <del>${{$getDatas->price}}</del>
                        </div>


                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('below_main')

  @include('footer')
  </body>
</html>
