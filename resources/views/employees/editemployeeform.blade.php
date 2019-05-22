@extends('layouts.Admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">Edit Employe</h1>
        <div class="pull-right">
            <a href="{{ url('show-employes') }}" type="button" class="btn btn-danger">Back</a>
        </div>
    </div> 

    <form class="form-horizontal" method="post" action="{{url('employee-update')}}">
        @csrf()
        <div class="box-body">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name:</label>
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="id" name="id" required="true" value="{{$employee->id}}">
                    <input type="text" class="form-control" id="name" name="name" placeholder="" required="true" value="{{$employee->name}}">
                  </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email"  placeholder="" required="true" value="{{$employee->email}}">
                  </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-info pull-right">Update</button>
        </div>
    </form>
</div>
@endsection
