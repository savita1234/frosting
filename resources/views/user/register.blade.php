<!DOCTYPE html>

<head>
  @vite('resources/js/app.js')
</head>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Sign Up</h3>
              @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
              @endif

              <form method="post" action="{{route('user.register')}}">
                @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                    <li>
                      {{$error}}
                    </li>

                    @endforeach
                  </ul>
                </div>
                @endif
                @csrf
                <div class="row">

                  <div class="col-md-6 mb-4">

                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="firstName" name="first_name" class="form-control form-control-lg" />
                      <label class="form-label" for="firstName">First Name</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="middleName" name="middle_name" class="form-control form-control-lg" />
                      <label class="form-label" for="middleName">First Name</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="lastName" name="last_name" class="form-control form-control-lg" />
                      <label class="form-label" for="lastName">Last Name</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="email_id" name="email" class="form-control form-control-lg" />
                      <label class="form-label" for="firstName">Email ID</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="mobile_number" name="phone" class="form-control form-control-lg" />
                      <label class="form-label" for="lastName">Mobile Number</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div data-mdb-input-init class="form-outline">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" />
                      <label class="form-label" for="firstName">Password</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div data-mdb-input-init class="form-outline">
                      <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg" />
                      <label class="form-label" for="lastName">Confirm Password</label>
                    </div>

                  </div>
                </div>



                <div class="mt-4 pt-2">
                  <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>