<div class="row">
    <div class="col">
        <h1>Company Notification {{ $company->id }}: {{ $company->name }}</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Data company</h2>
        <table class="table">
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->logo }}</td>
                <td>{{ $company->website }}</td>
            </tr>
        </table>
    </div>
</div>