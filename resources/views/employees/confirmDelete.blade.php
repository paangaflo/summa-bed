@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('Delete Employee') }}  -  ID : {{ $employee->id }}</h1>
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a class="btn btn-lg btn-outline-secondary" href="/companies/{{ $company->id }}">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="/companies/{{ $company->id }}/employees/{{ $employee->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="row">
                        <div class="col">
                            <h3>{{ __('Are you sure to delete the employee') }} {{ $employee->first_name }} {{ $employee->last_name }}?</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-lg btn-outline-success" type="submit">{{ __('Delete') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection