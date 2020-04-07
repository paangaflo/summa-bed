@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('Edit Employee') }} - Id : {{ $employee->id }}</h1>
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a class="btn btn-lg btn-outline-secondary" href="/companies/{{ $company->id }}">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
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
                <form action="/companies/{{ $company->id }}/employees/{{ $employee->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="first_name">{{ __('First name') }}:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="{{ __('Type a first name') }}" value="{{ $employee->name }}">
                                <label for="last_name">{{ __('Last name') }}:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="{{ __('Type a last name') }}" value="{{ $employee->surname }}">
                                <label for="age">{{ __('Age') }}:</label>
                                <input type="text" class="form-control" id="age" name="age" placeholder="{{ __('Type a age') }}" value="{{ $employee->age }}">
                                <label for="role">{{ __('Role') }}:</label>
                                <select class="form-control" id="role" name="role" disabled>
                                    <option value="DEVELOPER" {{ $employee->developer ? 'selected' : '' }}>{{ __('DEVELOPER') }}</option>
                                    <option value="DESIGNER" {{ $employee->designer ? 'selected' : '' }}>{{ __('DESIGNER') }}</option>
                                </select>
                                <label for="skill">{{ __('Skill') }}:</label>
                                <select class="form-control" id="skill" name="skill" disabled>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill }}" {{ ($employee->lang == $skill or $employee->type == $skill) ? 'selected' : '' }}>{{ $skill }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-lg btn-outline-success" type="submit">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection