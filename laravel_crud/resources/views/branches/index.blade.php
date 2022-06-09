@extends('layouts.main')
@section('main')
    <a class="link-button" href="{{route('branches.create')}}">Add Branch</a>
    <table>
        <thead>
        <tr>
            <th>Branch Name</th>
            <th>City</th>
            <th>State</th>
            <th>Address</th>
            <th>Phone</th>
            <th>status</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
            @each('branches._partials.branch_row', $branches, 'branch')
        </tbody>
    </table>
@endsection
