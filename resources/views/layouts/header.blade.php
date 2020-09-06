<head>
    <style>
       .caret{color:#887E7E}
       .dropdown-item:hover{color:blue}
    </style>
    
</head>
<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +977 9815790619</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@haatnepal.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="logo pull-left">
                        <a href="{{route('index')}}"><img src="{{asset('images/logo.png')}}" alt="logo" /></a>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            @guest
                              <li><a href="{{ route('userLogin') }}"><i class="fa fa-lock"></i> {{__('words.Login')}}</a></li>
                            @else
                              <li class="dropdown">
                                <a id="navbarDropdown" href="#">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{route('user-profile.index')}}"><i class="fa fa-shopping-cart"></i> {{__('words.my_products')}}</a></li>
                                    <li><a href="{{route('ads.create')}}"><i class="fa fa-plus"></i><i class="fa fa-sign-out-alt"></i> {{__('words.Create Ads')}}</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                             {{__('words.logout')}}
                                        </a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                            <li><a href=""><i class="fa fa-bullhorn"></i> {{__('words.sale')}}</a></li>
                            <li><a href="locale/en"><i class="fa fa-globe"></i> Eng</a></li>
                            <li><a href="locale/nep"> नेपाली</a></li>                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('index')}}" class="active">{{__('words.Home')}}</a></li>
                            <li class="dropdown"><a href="#">{{__('words.Products')}}<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($categories as $category)
                                        <li><a href="{{route('product-list',$category->id)}}">{{$category->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li> 
            
                            <li class="dropdown"><a href="#">{{__('words.Rental')}} <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{route('user-room.index')}}">Space</a></li>
                                    <li><a href="{{route('user-vehicle.index')}}">Vehicle</a></li>
                                </ul>
                            </li> 
                            <li><a href="{{route('ads.create')}}"><i class="fa fa-plus"></i> {{__('words.Create Ads')}}</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                      <div class="search_box">
                        <input type="text" placeholder="Search" name="search" style="float:left">
                      </div>
                      <button type="submit" class="btn btn-primary margin" style="margin-top:0px;padding-top:0.9rem">Go</button>
                      <a href="{{route('advance')}}"><i class="fa fa-plus"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>