@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Companies</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('store_company') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter company name">
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email"  name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label >website</label>
                            <input type="url" name="website" class="form-control" placeholder="website">
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
