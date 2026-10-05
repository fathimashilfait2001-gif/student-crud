<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Edit Student</h4>
                        <a href="{{ route('students.index') }}" class="btn btn-dark btn-sm">Back</a>
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

                        <form action="{{ route('students.update', $student->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address:</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}" class="form-control" required>
                            </div>

                        
                            <div class="mb-3">
                                <label for="course" class="form-label">Course:</label>
                                <input type="text" name="course" id="course" value="{{ old('course', $student->course) }}" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Update Student</button>
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