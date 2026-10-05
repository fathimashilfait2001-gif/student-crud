<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Add New Student</h4>
                       
                        <a href="{{ route('students.index') }}" class="btn btn-light btn-sm">Back</a>
                    </div>
                    <div class="card-body">

                        {{-- Validation Errors Alert --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('students.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Enter full name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address:</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email address" required>
                            </div>

                    

                            <div class="mb-3">
                                <label for="course" class="form-label">Course:</label>
                                <input type="text" name="course" id="course" value="{{ old('course') }}" class="form-control" placeholder="Enter course name" required>
                            </div>
                              
                            <button type="submit" class="btn btn-primary w-100">Submit Student</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>