
<a href="{{route('animalcategories.create')}}" class="btn btn-success">Add</a>
<table>
    <thead>
        <tr>
            <td>
                Title
            </td>
            <td>
                Actions
            </td>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>
                    {{ $category->title}}
                </td>
                <td>
                    {{link_to(route('animalcategories.edit', ['id' => $category->id]), 'EDIT'}}
                </td>
            </tr>

        @endforeach
    </tbody>

</table>
