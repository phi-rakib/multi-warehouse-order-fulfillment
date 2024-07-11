@if ($message = session('message'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif