<div class="content page1">
    <div class="container_12">
        <div class="grid_12"> <a href="#" class="next"></a><a href="#" class="prev"></a>
            <h2>Доступні тварини</h2>
        </div>
        <div class="clear"></div>
        <ul class="carousel1">

        @foreach($animals as $animal)

            <li class="grid_4"> <img src={{$animal->image}} alt="" class="img_inner fleft">
                <div class="extra_wrapper pad1">
                    <p class="col2"><a href="#">{{$animal->name}}</a></p>
                    {{$animal->about}}</div>
            </li>
         @endforeach

        </ul>
    </div>
</div>