<tr>
    <td>{{$product->name}}</td>
    <td>{{$product->price}}</td>
    <td>{{$product->category->name}}</td>
    <td>{{$product->status}}</td>
    <td><a class="link-button" 
    href="{{route('products.edit', ['product'=>$product->id])}}">Edit</a></td>
</tr>
