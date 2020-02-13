@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Companies</div>
                <div class="card-body">
                    <form method="POST" action="{{ url("update_company/$company->id") }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter company name" value="{{old('name',$company->name) }}">
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email"  name="email" class="form-control" placeholder="Email" value="{{old('email',$company->email) }}">
                        </div>
                        <div class="form-group">
                            <label >website</label>
                            <input type="url" name="website" value="{{old('website',$company->website) }}" class="form-control" placeholder="website">
                        </div>
                        <div class="form-group">
                            <label >Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
