
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('New Employee') }}</h1>
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
                <form action="/companies/{{ $company->id }}/employees" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="first_name">{{ __('First name') }}:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="{{ __('Type a first name') }}" value="{{ old('first_name') }}">
                                <label for="last_name">{{ __('Last name') }}:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="{{ __('Type a last name') }}" value="{{ old('last_name') }}">
                                <label for="age">{{ __('Age') }}:</label>
                                <input type="text" class="form-control" id="age" name="age" placeholder="{{ __('Type a age') }}" value="{{ old('age') }}">
                                <label for="role">{{ __('Role') }}:</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="DEVELOPER">{{ __('DEVELOPER') }}</option>
                                    <option value="DESIGNER">{{ __('DESIGNER') }}</option>
                                </select>
                                <label for="skill">{{ __('Skill') }}:</label>
                                <select class="form-control" id="skill" name="skill">
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill }}">{{ $skill }}</option>
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

@section('page-script')
<script type="text/javascript">
    $(function() {
        $('select[name=role]').change(function() {
            var url = '/companies/employees/' + $(this).val();
            $.get(url, function(data) {
                var select = $('form select[name= skill]');
                select.empty();
                $.each(data,function(key, value) {
                    select.append('<option value=' + value + '>' + value + '</option>');
                });
            });
        });
    });
</script>
@stop

