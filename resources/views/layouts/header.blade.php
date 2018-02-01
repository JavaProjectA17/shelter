<header>
    <div class="container_12">
        <div class="grid_12">
            <h1>
                <a href="{{route('index')}}">
                    <img src="user/images/logo.png" alt="">
                </a>
            </h1>
            <div class="menu_block">
                <nav>
                    <ul class="sf-menu">
                        <li class="current"><a href="{{route('index')}}">Головна</a></li>
                        <li class="with_ul"><a href="{{route('about')}}">Про нас</a>
                            {{--<ul>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Archive</a></li>
                            </ul>--}}
                        </li>
                        {{--<li><a href="{{route('')}}.html">Services</a></li>--}}
                        <li><a href="{{route('new')}}">Новини</a></li>
                        <li><a href="{{route('contacts')}}">Контакти </a></li>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>
