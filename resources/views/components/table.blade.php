@props(['headers', 'properties', 'list', 'editRouteName', 'deleteRouteName'])

<table class="table table-bordered">
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($list as $item)
            <tr>
                @foreach ($properties as $property)
                    <td>{{ $item["$property"] }}</td>
                @endforeach
                <td>
                    <div class="btn-group">
                        @if (!empty($editRouteName))
                        <a href="{{ route("$editRouteName", $item['id']) }}" class="btn btn-warning">Edit</a>
                    @endif

                    @if (!empty($deleteRouteName))    
                        <form action="{{ route("$deleteRouteName", $item['id']) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>