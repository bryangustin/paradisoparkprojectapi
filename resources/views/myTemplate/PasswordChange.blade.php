<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">
                      Reset Password
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/api/reset-password">
                            @csrf
                            <div class="mb-3">
                              <input type="hidden" name="token" value={{$data}}>
                              <label for="Email" class="form-label">Email:</label>
                              <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="mb-3">
                              <label for="Password" class="form-label">Password</label>
                              <input type="password" class="form-control" id="Password" name="password">
                            </div>
                            <div class="mb-3">
                              <label for="Conf-Password" class="form-label">Confirm Password</label>
                              <input type="password" class="form-control" id="Conf-Password" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div> 
                  </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
</body>
</html>