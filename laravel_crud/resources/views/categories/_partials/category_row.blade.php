<tr>
    <td>{{$category->name}}</td>
    <td>{{$category->slug}}</td>
    <td>{{$category->status}}</td>
    <td><a class="link-button" href="{{route('categories.edit', ['category'=>$category->id])}}">Edit</a></td>
</tr>
