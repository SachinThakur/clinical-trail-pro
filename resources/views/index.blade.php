<!DOCTYPE html>
<html>
<head>
    <title>Screening Result</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

    <div class="card">
        <div class="card-header text-center font-weight-bold">
            <p>
                <span style="float:left" >Result Data</span>
                <span style="float:right"><a href="{{ url('/screening-form') }}">Add Screening</a></span>
            </p>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">First name</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Migraine Frequency</th>
                        <th scope="col">Daily Frequency</th>
                        <th scope="col">Group</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($screeningData as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->first_name }}</td>
                        <td>{{  \Carbon\Carbon::parse($data->date_of_birth)->format('d/m/Y') }}</td>
                        <td>{{ ucfirst($data->migraine_frequency) }}</td>
                        <td>{{ $dailyFrequency[$data->daily_frequency] ?? '-' }}</td>
                        <td>{{ $data->customer_group }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>  
</body>
</html>