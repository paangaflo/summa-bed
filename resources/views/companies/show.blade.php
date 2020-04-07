@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('Company') }}: {{ $company->name }}</h1>
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a class="btn btn-lg btn-outline-secondary" href="/companies">{{ __('Back') }}</a>
                            <a class="btn btn-lg btn-outline-success" href="/companies/{{ $company->id }}/employees/create">{{ __('Create') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row pb-3">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-center">
                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <form action="/companies/{{ $company->id }}/employees/search" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="employee_id">{{ __('Employee ID') }}:</label>
                                             <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="{{ __('Enter employee ID') }}" value="{{ old('employee_id') }}">
                                        </div>
                                        <div class="col align-middle text-center">
                                            <button class="btn btn-lg btn-outline-success" type="submit">{{ __('Search') }}</button>
                                            <a class="btn btn-lg btn-outline-secondary" href="/companies/{{ $company->id }}">{{ __('Reload') }}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col">
                        <div class="alert alert-primary" role="alert">{{ __('The average age of employees is') }} : {{ $average }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-hover table-bordered">
                            <caption>{{ __('List of Employees') }}</caption>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center w-5">{{ __('ID') }}</th>
                                <th scope="col" class="text-center w-20">{{ __('FIRST NAME') }}</th>
                                <th scope="col" class="text-center w-20">{{ __('LAST NAME') }}</th>
                                <th scope="col" class="text-center w-10">{{ __('AGE') }}</th>
                                <th scope="col" class="text-center w-20">{{ __('ROLE') }}</th>
                                <th scope="col" class="text-center w-25">{{ __('OPTIONS') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row" class="align-middle text-center">{{ $employee->id }}</th>
                                    <td class="align-middle">{{ $employee->name }}</td>
                                    <td class="align-middle">{{ $employee->surname }}</td>
                                    <td class="align-middle text-center">{{ $employee->age }}</td>
                                    @isset($employee->developer)
                                        <td class="align-middle text-center">{{ __('DEVELOPER') }}</td>
                                    @endisset
                                    @isset($employee->designer)
                                        <td class="align-middle text-center">{{ __('DESIGNER') }}</td>
                                    @endisset
                                    <td class="align-middle text-center">
                                        <a class="btn btn-primary btn-sm" href="/companies/{{ $company->id }}/employees/{{ $employee->id }}/edit">{{ __('Edit') }}</a>
                                        <a class="btn btn-primary btn-sm" href="/companies/{{ $company->id }}/employees/{{ $employee->id }}/confirmDelete">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="pagination pagination-centered">
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection