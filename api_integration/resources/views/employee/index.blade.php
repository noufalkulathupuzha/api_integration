@foreach ($employees as $employee)
    <h2>{{ $employee->name }}</h2>
    <h2>{{ $employee->companyName }}</h2>
    <h2>{{ $employee->gender }}</h2>
    <h2>{{ $employee->salary }}</h2>
    <h2>{{ $employee->city }}</h2>
@endforeach
