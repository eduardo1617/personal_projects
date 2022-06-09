<tr>
    <td>{{$branch->name}}</td>
    <td>{{$branch->city}}</td>
    <td>{{$branch->state}}</td>
    <td>{{$branch->address}}</td>
    <td>{{$branch->phone}}</td>
    <td>{{$branch->status}}</td>
    <td><a class="link-button" href="{{route('branches.edit', ['branch'=>$branch->id])}}">Edit</a></td>
</tr>
