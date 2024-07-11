@props(['submitRoute', 'model', 'method', 'formControls'])

<form action="{{ route("$submitRoute", empty($model) ? '' : $model->id) }}" method="POST">
    @csrf
    @method("$method")
    
    @foreach ($formControls as $name => $type)
        <div class="form-group">
            <label for="{{ $name }}">{{ ucfirst($name) }}</label>
            <input type="{{ $type }}" class="form-control" name="{{ $name }}" 
            value="{{empty($model) ? '' : $model->$name}}">
        </div>    
    @endforeach

    <button type="submit" class="btn btn-success">
        {{ strtolower($method) == "post" ? 'Create' : 'Update' }}
    </button>
</form>