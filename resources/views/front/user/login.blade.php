<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KeluargaBahagia | Login</title>
    <link rel="stylesheet" href="{{url('css/login.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="" />
    <meta name="author" content="" />
  </head>
  <body>
    <div id="page" class="site login-show">
      <div class="container">
        <div class="wrapper">
          <!-- Login Form -->
          <div class="login">
            <div class="content-heading">
              <div class="y-style">
                <div class="logo">
                  <a href="{{url("/")}}">Keluarga<span>Bahagia</span></a>
                </div>
                <div class="welcome">
                  <h2 class="title">Welcome<br />Back!</h2>
                  <p>Get start to be creative.</p>
                </div>
              </div>
            </div>
            <div class="content-form">
              <div class="y-style">
                <form id="loginForm" action="javascript:;" method="post">@csrf
                  <p>
                    <label for="email">Email</label>
                    <input
                      type="text"
                      class="textInput"
                      name="email"
                      placeholder="Enter your email"
                    />
                  </p>
                  <p>
                    <label for="password">Password</label>
                    <input
                      type="password"
                      class="textInput"
                      name="password"
                      placeholder="Enter your password"
                    />
                  </p>
                  <p class="check">
                    <input type="checkbox" id="remember" />
                    <label for="remember">Remember Me</label>
                  </p>
                  <p class="forgot"><a href="#">Forgot Password?</a></p>
                  <p><button type="submit">Login</button></p>
                </form>
                <div class="afterform">
                  <p>Don't have an account?</p>
                  <a href="#" class="t-signup">Register</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Register Form -->
          <div class="signup">
            <div class="content-heading">
              <div class="y-style">
                <div class="logo">
                    <a href="{{url("/")}}">Keluarga<span>Bahagia</span></a>
                </div>
                <div class="welcome">
                  <h2 class="title">Sign Up<br />Now!</h2>
                  <p>Ready to be creative?<br />We can help you grow.</p>
                </div>
              </div>
            </div>
            <div class="content-form">
              <div class="y-style">
                <form id="registerForm" action="javascript:;" method="post">@csrf
                  <p>
                    <label for="name">Full Name</label>
                    <input
                      type="text"
                      class="textInput"
                      name="name"
                      placeholder="Enter your name"
                    />
                  </p>
                  <p>
                    <label for="email">Email</label>
                    <input
                      type="email"
                      class="textInput"
                      name="email"
                      placeholder="Enter your email"
                    />
                  </p>
                  <p>
                    <label for="password">Password</label>
                    <input
                      type="password"
                      class="textInput"
                      name="password"
                      placeholder="Enter your password"
                    />
                  </p>
                  <p><button type="submit">Sign Up</button></p>
                </form>
                <div class="afterform">
                  <p>Already have an account?</p>
                  <a href="#" class="t-login">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
