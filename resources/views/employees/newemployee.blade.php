@extends('layouts.Admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">Register a new Employe</h1>
        <div class="pull-right">
            <a href="{{ url('show-employes') }}" type="button" class="btn btn-danger">Back</a>
        </div>
    </div> 

    <form class="form-horizontal" method="post" action="{{url('store-employee')}}">
    
        @csrf()
        <div class="box-body">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name"  required="true">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="description" name="email" required="true">
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Address:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="address" name="address" required="true">
                </div>
            </div>
            <div class="form-group">
                <label for="phoneNumber" class="col-sm-2 control-label">Phone Number:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required="true">
                </div>
            </div>
             <div class="form-group">
                <label for="age" class="col-sm-2 control-label">Age:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="age" name="age" required="true">
                </div>
            </div>

            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" required="true">
                </div>
            </div>
            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label">Retype Password</label>
                <div class="col-sm-8">
                <input type="password" class="form-control" placeholder="Retype password">
              </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
            <button type="submit" class="btn btn-info pull-right">ADD</button>
        </div>
        <!-- /.box-footer -->
    </form>
    
  <!-- /.box -->
</div>
@endsection
