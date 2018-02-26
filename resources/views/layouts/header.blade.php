<header>
    <div class="container_12">
        <div class="grid_12">
            <h1>
                <a href="{{route('index')}}">
                    <img src="/user/images/logo.png" alt="">
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
                        <li><a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left">login</a></li>
                        <li><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button> </li>
                </nav>
        <!-- Trigger the modal with a button -->
 <div data-role="main" class="ui-content">
  <div data-role="popup" id="myPopup" class="ui-content" style="min-width:150px;">
      <form method="post" action="/action_page_post.php">
        <div>
          <h3>Login information</h3>
          <label for="usrnm" class="ui-hidden-accessible">Username:</label>
          <input type="text" name="user" id="usrnm" placeholder="Username">
          <label for="pswd" class="ui-hidden-accessible">Password:</label>
          <input type="password" name="passw" id="pswd" placeholder="Password">
          <label for="log">Keep me logged in</label>
          <input type="checkbox" name="login" id="log" value="1" data-mini="true">
          <input type="submit" data-inline="true" value="Log in">
        </div>
      </form>
    </div>
  </div>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms and Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>

</header>
