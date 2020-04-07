@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('Companies') }}</h1>
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a class="btn btn-lg btn-outline-success" href="/companies/create">{{ __('Create') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table table-hover table-bordered">
                            <caption>{{ __('List of companies') }}</caption>
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center w-5">{{ __('ID') }}</th>
                                    <th scope="col" class="text-center w-75">{{ __('NAME') }}</th>
                                    <th scope="col" class="text-center w-25">{{ __('OPTIONS') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <th scope="row" class="align-middle text-center">{{ $company->id }}</th>
                                    <td class="align-middle">{{ $company->name }}</td>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-primary btn-sm" href="/companies/{{ $company->id }}/edit">{{ __('Edit') }}</a>
                                        <a class="btn btn-primary btn-sm" href="/companies/{{ $company->id }}/confirmDelete">{{ __('Delete') }}</a>
                                        <a class="btn btn-primary btn-sm" href="/companies/{{ $company->id }}">{{ __('Employees') }}</a>
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
                            {{ $companies->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection