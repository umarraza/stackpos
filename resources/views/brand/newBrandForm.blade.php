@extends('layouts.Admin')

@section('content')


<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Brand</h1>
    </div>

    <form class="form-horizontal" method="post" action="{{url('new-brand-store')}}">
        @csrf()
        <div class="box-body">
            <div class="form-group">
                <label for="brandName" class="col-sm-2 control-label">Name:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Levis" required="true">
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