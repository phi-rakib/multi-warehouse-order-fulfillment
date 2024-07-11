@props(['title', 'routeName', 'routeText'])

<div class="row my-4">
    <div class="col-12">
        <div class="float-left">
            <h2>{{ $title }}</h2>
        </div>
        <div class="float-right">
            <a href="{{ route($routeName) }}" class="btn btn-primary">
                {{ $routeText }}
            </a>
        </div>
    </div>
</div>