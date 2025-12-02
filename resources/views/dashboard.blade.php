<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Dashboard</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#F8F9FA;">
<main>
   <div class="container py-5">
      <div class="card mb-3 border-bottom">
         <div class="card-body">
            @if(session('success'))
               <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <h5>Welcome to the Dashboard</h5>
            <p>You are logged in</p>
            <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
         </div>
      </div>
   </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
