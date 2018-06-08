@extends('layouts.admin')
@section('content')
<br>
<br>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"> prestasi
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('prestasis.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
					<div class="form-group {{ $errors->has('tgl_peroleh') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Peroleh</label>	
			  			<input type="text" name="tgl_peroleh" class="form-control" required>
			  			@if ($errors->has('tgl_peroleh'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_peroleh') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('ekskuls_id') ? ' has-error' : '' }}">
			  			<label class="control-label">eskul</label>	
			  			<select name="ekskuls_id" class="form-control">
			  				@foreach($ekskul as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('ekskuls_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ekskuls_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection