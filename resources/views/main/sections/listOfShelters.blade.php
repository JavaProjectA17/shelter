<div class="content1 page">
    <div class="container_12">
        <div class="forRight">
            <h2 class = "ic1">Наші притулки</h2>
        </div>
        <div class="clear"></div>



         @foreach($shelters as $shelter)

            <div class="colForShelers">
                <div class="extra_wrapper pad1">
                    <p class="col2">
                        <a href="#">{{$shelter->nameshelter}}</a>
                     </p>
                     {{$shelter->description}}
                     <strong>{{$shelter->address}}</strongS>
                 </div>
            </div>

         @endforeach


    </div>
</div>