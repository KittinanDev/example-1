<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#F8F9FA;">
<section>
   <div class="container py-5">
      <div class="row justify-content-center">
         <div class="col-md-4">
            <div class="card">
               <div class="card-header">Login</div>
               <div class="card-body">
                  @if(session('success'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                     </div>
                  @endif
                  @if(session('error'))
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                     </div>
                  @endif
                  <form method="POST" action="{{ route('login.post') }}" id="loginForm">
                     @csrf
                     <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email">
                        @error('email')
                           <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback" id="emailError"></div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                        @error('password')
                           <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback" id="passwordError"></div>
                     </div>
                     <button type="submit" class="btn btn-success w-100">Login</button>
                  </form>
                  <a href="{{ route('register') }}">Don't have an account? Register here</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
   let hasError = false;
   const email = document.getElementById('email');
   const password = document.getElementById('password');
   const emailError = document.getElementById('emailError');
   const passwordError = document.getElementById('passwordError');
   
   // Reset errors
   email.classList.remove('is-invalid');
   password.classList.remove('is-invalid');
   emailError.textContent = '';
   passwordError.textContent = '';
   emailError.style.display = 'none';
   passwordError.style.display = 'none';
   
   // Validate email
   if (!email.value.trim()) {
      email.classList.add('is-invalid');
      emailError.textContent = 'Please enter your email';
      emailError.style.display = 'block';
      hasError = true;
   } else if (!email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
      email.classList.add('is-invalid');
      emailError.textContent = 'Invalid email format';
      emailError.style.display = 'block';
      hasError = true;
   }
   
   // Validate password
   if (!password.value) {
      password.classList.add('is-invalid');
      passwordError.textContent = 'Please enter your password';
      passwordError.style.display = 'block';
      hasError = true;
   }
   
   if (hasError) {
      e.preventDefault();
   }
});
</script>
</body>
</html>
