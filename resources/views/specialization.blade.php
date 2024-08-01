<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>specialization Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Specializations</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('add_specialization') }}" method="POST" class="mb-4">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Specialization Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Add specialization</button>
        </form>

        <h2>Specializations List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Specialization Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($specializations as $specialization)
                    <tr>
                        <td>{{ $specialization->name }}</td>
                        <td>
                            <!-- Update button -->
                            <button class="btn btn-warning" data-toggle="modal"
                                data-target="#updateModal{{ $specialization->id }}">Update</button>

                            <!-- Update Modal -->
                            <div class="modal fade" id="updateModal{{ $specialization->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('edit_specialization', $specialization->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update specialization</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">specialization Name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        value="{{ $specialization->name }}" required>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete button -->
                            <form action="{{ route('delete_specialization', $specialization->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>