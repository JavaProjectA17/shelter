<div class ="wrapper">
  <div class="imgAndName">
    <div class="miniWrapper">
      <h2>{{$animal[0]->name}}</h2>
      <div>
        <img src="{{$animal[0]->image}}" alt="image" class="imgStyle">
      </div>
    </div>
  </div>

  <div class="about">
    <div class="miniWrapper">
       <h2>About</h2>
       <div class="miniWrap">
           <p>{{$animal[0]->about}}</p>
       </div>
    </div>
  </div>
</div>
