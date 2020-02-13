<?php // dd($companies);        ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    <a href="{{ url('new_company') }}" class="btn btn-success">Add new Company</a>

                    <table class="text-center table-bordered table" >
                        <thead>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>website</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>employees</th>
                        </thead>
                        <tbody>
                            @foreach($companies as $company_i)
                            <tr>
                                <td>{{ $company_i->id }}</td>
                                <td>{{ $company_i->name }}</td>
                                <td>{{ $company_i->email }}</td>
                                <td>{{ $company_i->website }}</td>
                                <td>
                                    <form method="GET" action="{{url('open_update',['company'=>$company_i->id])}}">
                                        <button  class="btn btn-info">Update</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{url('delete_company',['company'=>$company_i->id])}}">
                                        @csrf
                                        @method("DELETE")
                                        <button  class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ url('employees',['company'=>$company_i->id]) }}">employees</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('new_company') }}" class="btn btn-success">Add new Company</a>
                </div>
            </div>
        </div>
        <div class="text-center">
            {{$companies->appends(request()->input())->links()}}
        </div>
    </div>
</div>
@endsection
