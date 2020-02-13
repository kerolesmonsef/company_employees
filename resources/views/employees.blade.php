<?php // dd(companies);    ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">All action is same as company</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employee</div>

                <div class="card-body">
                    <table class="text-center table-bordered table" >
                        <thead>
                        <th>id</th>
                        <th>f_name</th>
                        <th>l_name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>created_at</th>
                        <th>Delete</th>
                        <th>update</th>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee_i)
                            <tr>
                                <td>{{ $employee_i->id }}</td>
                                <td>{{ $employee_i->f_name }}</td>
                                <td>{{ $employee_i->l_name }}</td>
                                <td>{{ $employee_i->email }}</td>
                                <td>{{ $employee_i->phone }}</td>
                                <td>{{ $employee_i->created_at }}</td>
                                <td>
                                    <form method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button  class="btn btn-info">Update</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" >
                                        @csrf
                                        @method("PUT")
                                        <button  class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center">
        </div>
    </div>
</div>
@endsection
