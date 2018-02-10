<div class="grid_7">
    <h2>Новини</h2>
    <br>
    @foreach($news as $new)
        <div class="blog">
            <img src="{{$new->image}}" alt="" class="img_inner fleft i1">
            <div class="extra_wrapper">
                <div class="text2 col2">{{$new->title}}</div>
                {{$new->short_description}}
            </div>
            <div class="clear"></div>
            <br>
            <a href="#" class="btn">More</a>
        </div>
    @endforeach
</div>
