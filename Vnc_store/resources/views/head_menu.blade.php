<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="logo">
                <h1><a href="/"><span>Mixi Store</span></a></h1>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="shopping-item">
                <a href="/ShopPingCart/">Cart - <span class="cart-amunt">$800</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
            </div>
        </div>
    </div>
</div>
<div class="mainmenu-area">
<div class="container">
    <div class="row">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="header-navigation">
            <ul>
                <Li><a href="/">Home</a></Li>
                <Li><a href="/Shop_list/">Shop</a></Li>

                @foreach($menus_list as $menul)
                <!-- href="/danh-muc/'.$menu->id.'-'. Str::slug($menu->name, '-').'.html"
                href="{{$menul->id}}.'-'.{{Str::slug($menul->name, '-').'.html'}}"-->
                <li class="dropdown">
                    <a href="/danh-muc/{{$menul->id}}">
                        {{$menul->name}}

                    </a>
                    @if($menul->isChild->count())

                    <ul class="dropdown-menu" >

                          @foreach($menul->isChild as $menuChild)
                        <li><a href="shop-product-list.html">{{$menuChild->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>

</div> <!-- End mainmenu area -->
