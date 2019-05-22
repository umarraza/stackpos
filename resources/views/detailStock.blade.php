@extends('layouts.Admin')

@section('content')


<div class="box">

    <div class="box-header">
      <h3 class="box-title">Pulleys Data</h3>
    </div>
            <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        
        <thead>
          <tr>
            {{-- <th>Name</th> --}}
            <th>Size</th>
            <th>Belts</th>
            <th>Belt Type</th>
            <th>Naap</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Price Per Unit</th>
            <th>Total_Price</th>
            <th>Created_at</th>
          </tr>
        </thead>

        <tbody>
          @foreach($pulleys as $pulley)
          <tr>
            {{-- <th>{{ $pulley->size }}{{ $pulley->no_of_belts }}{{ $pulley->belt_type }}</th> --}}
            <th>{{ $pulley->size }}</th>
            <th>{{ $pulley->no_of_belts }}</th>
            <th>{{ $pulley->belt_type }}</th>
            <th>{{ $pulley->naap }}</th>
            <th>{{ $pulley->type }}</th>
            <th>{{ $pulley->quantity }}</th>
            <th>{{ $pulley->price }}</th>
            <th>{{ $pulley->total_price }}</th>
            <th>{{ $pulley->created_at }}</th>
          </tr>
          @endforeach
        </tbody>

        <tfoot>
          <tr>
            {{-- <th>Name</th> --}}
            <th>Size</th>
            <th>Belts</th>
            <th>Belt Type</th>
            <th>Naap</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Price Per Unit</th>
            <th>Total_Price</th>
            <th>Created_at</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>


@endsection