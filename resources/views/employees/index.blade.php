<x-app-layout>
    @foreach($employees as $employee)
        <p>{{ $employee->name }}</p>
        <p>{{ $employee->birthdate }}</p>
        <p>{{ $employee->address }}</p>
        <p>{{ $employee->phone }}</p>
    @endforeach
</x-app-layout>
