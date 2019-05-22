@extends('layouts.Admin')

@section('content')

	<div class="box box-primary">
        
        <div class="box-header with-border">
            <h3 class="box-title">Enter Data</h3>
        </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form role="form" action="{{url('savePulley')}}" method="post">
            
            {{ csrf_field() }}
            <div class="box-body">
                
                <div class="form-group">
                  	<label for="">Size:</label>
                  	<select class="form-control" name="size" style="width: 100%;">
		                {{-- <option selected="selected"></option>--}}
                   		<option value="2">2</option>
	                  	<option value="2(1/2)">2 (1/2)</option>
	                  	<option value="3(1/2)">3</option>
	                  	<option value="3(1/2)">3 (1/2)</option>
	                  	<option value="4(1/2)">4</option>
	                  	<option value="4(1/2)">4 (1/2)</option>
	                  	<option value="5(1/2)">5</option>
	                  	<option value="5(1/2)">5 (1/2)</option>
	                </select>
            	</div>
            
                <div class="form-group">
                  	<label for="">No. Of Belts:</label>
                  	<select class="form-control" name="no_of_belts" style="width: 100%;">
		                {{-- <option selected="selected"></option>--}}
                   		<option value="1">1</option>
	                  	<option value="2">2</option>
	                  	<option value="3">3</option>
	                  	<option value="4">4</option>
	                </select>
           		</div>
                
                <div class="form-group">
                  	<label for="">Belt Type:</label>
                  	<select class="form-control" name="belt_type" style="width: 100%;">
		                {{-- <option selected="selected"></option>--}}
                   		<option value="A">A</option>
	                  	<option value="B">B</option>
	                  	<option value="C">C</option>
	                  	<option value="D">D</option>
	                </select>
	            </div>
            	
            	<div class="form-group">
                  	<label for="">Naap:</label>
                  	<input type="text" class="form-control" name="naap">
            	</div>
            	
            	<div class="form-group">
                  	<label for="">Type:</label>
                  	<select class="form-control" name="type" style="width: 100%;">
		                {{-- <option selected="selected"></option>--}}
                   		<option value="aamm">Aamm</option>
	                  	<option value="thos">Thos</option>
	                  	<option value="plate">Plate</option>
	                  	<option value="danda">Danda</option>
	                </select>
            	</div>
            
                <div class="form-group">
                	<label for="">Quantity:</label>
                	<input type="text" class="form-control" name="quantity">
            	</div>

	            <div class="form-group">
	                <label for="">Price Per Unit:</label>
	                <input type="text" class="form-control" name="price">
	            </div>   

	        </div> 
              <!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>

        </form>
    </div>


@endsection