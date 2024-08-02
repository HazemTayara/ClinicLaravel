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
        <h1 class="text-center">Appointements</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('add_appointment') }}" method="POST" class="mb-4">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Appointements Date</label>
                    <input type="date" name="date" class="form-control" id="name" required>
                </div>
            </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="doctor_id">doctors</label>
                        <select name="doctor_id" class="form-control" required>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="patient_id">patients</label>
                    <select name="patient_id" class="form-control" required>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add appointment</button>
        </form>

        <h2>Appointment List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Appointment date</th>
                    <th>patient name</th>
                    <th>doctor name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>
                            <!-- Update button -->
                            <button class="btn btn-warning" data-toggle="modal"
                                data-target="#updateModal{{ $appointment->id }}">Update</button>

                                <!-- Update Modal -->
                                <div class="modal fade" id="updateModal{{ $appointment->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('edit_appointment', $appointment->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update appointment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="name">appointment date</label>
                                                        <input type="text" name="date" class="form-control" id="name"
                                                            value="{{ $appointment->date }}" required>
                                                    </div>

                                                  
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="patient_id">patient</label>
                                                            @php
                                                                $selectedValue = old('patient_id', $appointment->patient->id);
                                                            @endphp
                                                            <select name="patient_id" class="form-control" required>
                                                                @foreach ($patients as $patient)
                                                                    <option value="{{ $patient->id }}" {{ $patient->id == $selectedValue ? 'selected' : '' }}>
                                                                        {{ $patient->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="doctor_id">doctor</label>
                                                            @php
                                                                $selectedValue = old('doctor_id', $appointment->doctor->id);
                                                            @endphp
                                                            <select name="doctor_id" class="form-control" required>
                                                                @foreach ($doctors as $doctor)
                                                                    <option value="{{ $doctor->id }}" {{ $doctor->id == $selectedValue ? 'selected' : '' }}>
                                                                        {{ $doctor->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
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
                                <form action="{{ route('delete_doctor', $doctor->id) }}" method="POST" style="display:inline;">
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