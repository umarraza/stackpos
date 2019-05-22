@extends('layouts.Admin')

@section('content')


<div class="box box-info">

    <div class="box-header">
        <h3 class="box-title">All Brands</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @php $count=1; @endphp
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <a href="{{url('/brand-delete/'.$brand->id)}}" type="button" class="btn btn-danger">Delete</a>
                                &nbsp;
                            <a href="{{url('/edit-brand-form/'.$brand->id)}}" type="button" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                    @php $count++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>


@endsection