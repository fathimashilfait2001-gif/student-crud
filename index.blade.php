<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student CRUD System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <h2>Student List</h2>
                   
                    <a class ="btn btn-success" href="{{ route('students.create') }}">Add New Student </a>
                </div>
            </div>

            <!--Students Table-->
            <div class="card shadow-sm">
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0">

                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th width="200px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->course }}</td>
                                <td>
                                    <!-- Add action buttons for edit and delete -->
                                        <!-- Edit form -->
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                      
                                        <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $student->id) }}">Edit</a>

                                        <!-- Delete form -->
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No Student Records Found!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

                        