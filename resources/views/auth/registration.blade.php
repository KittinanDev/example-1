<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Registration</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#F8F9FA;">
<section>
   <div class="container py-5">
      <div class="row justify-content-center">
         <div class="col-md-4">
            <div class="card">
               <div class="card-header">Registration</div>
               <div class="card-body">
                  <form method="POST" action="{{ route('register.post') }}">
                     @csrf
                     <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                     </div>
                     <button type="submit" class="btn btn-primary w-100">Register</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
