<tr>
    <td>{{$seller->name}}</td>
    <td>{{$seller->dni}}</td>
    <td>{{$seller->phone}}</td>
    <td>{{$seller->hired_at->format('d/m/Y')}}</td>
    <td>{{$seller->carnet}}</td>
    <td>{{$seller->branches->implode('name')}}</td>
    <td>{{$seller->status}}</td>
    <td><a class="link-button" href="{{route('sellers.edit', ['seller'=>$seller->id])}}">Edit</a></td>
</tr>
