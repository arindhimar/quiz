<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="login.js"></script>

</head>

<body>

  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

      <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg">
          <div class="card-body">
            <h3 class="text-center mb-4">College Portal</h3>
            <form>
              <div class="form-group">
                <label for="Id">Enter Your Id</label>
                <input type="text" class="form-control" id="id" placeholder="Enter Id">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
              </div>
              <!-- <button  type="submit" class="btn btn-primary btn-block">Login</button> -->
              <input type="button" id="loginbtn" class="btn btn-primary btn-block" value="Login">
            </form>
            <hr>
            <p class="text-center">Forgot Password? <a id='reset' href="#">Reset</a></p>

          </div>
        </div>

        <div class="card mt-3" id="contactForm">
          <div class="card-body">
            <form class="row g-3">
              <div class="col-12">
                <label for="staticEmail2" class="visually-hidden">Enter Registered Email Address</label>
                <input type="email" class="form-control mb-3" id="txtresemail" placeholder="Email">
              </div>
              <div class="col-12 col-md-auto">
                <button type="submit" class="btn btn-primary mb-3" id="resetbtn">Send Email</button>
              </div>
              <div class="col-12 col-md-auto">
                <div class="spinner-border text-secondary" id="spinemail" role="status">
                  <span class="visually-hidden"></span>
                </div>
              </div>
              <div class="col-12 col-md-auto">
                <button type="button" class="btn btn-danger mb-3" id="cancelbtn">Cancel</button>
              </div>
              <div class="col-12">
                <div class="alert" role="alert" id="resetmsg">
                  <p class="mb-0"></p>
                </div>
              </div>
            </form>
          </div>
        </div>


      </div>
    </div>
  </div>
  </div>



  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>