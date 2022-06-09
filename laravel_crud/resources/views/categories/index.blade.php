@extends('layouts.main')
@section('main')
    <a class="link-button" href="{{route('categories.create')}}">Add Category</a>
    <table>
        <thead>
        <tr>
            <th>Category</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
            @each('categories._partials.category_row', $categories, 'category')
        </tbody>
    </table>
@endsection
