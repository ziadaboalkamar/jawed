@if (Session::has('success'))
<div class="alert alert-success p-2">
    {{ Session::get('success') }}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger p-2">
    {{ Session::get('error') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger p-2">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
