@extends('layouts.admin')
@section('content')
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Program Studi
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('program_studis.update',$programstudi->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('nama_program') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama_program" class="form-control" value="{{ $programstudi->nama }}" required>
			  			@if ($errors->has('nama_program'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_program') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('fasilitas_id') ? ' has-error' : '' }}">
					  <label class="control-label">Fasilitas</label>	
					  <select name="fasilitas_id" class="form-control">
						  @foreach($fasilitas as $data)
						  <option value="{{ $data->id }}" {{ $selectedFasilitas == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
						  @endforeach
					  </select>
					  @if ($errors->has('fasilitas_id'))
						<span class="help-block">
							<strong>{{ $errors->first('fasilitas_id') }}</strong>
						</span>
					@endif
				  </div>

			  		<div class="form-group {{ $errors->has('industris_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Industri</label>	
			  			<select name="industris_id" class="form-control">
			  				@foreach($industri as $data)
			  				<option value="{{ $data->id }}" {{ $selectedIndustri == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('industris_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('industris_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('struktur_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Guru</label>	
			  			<select name="industri_id" class="form-control">
			  				@foreach($struktur as $data)
			  				<option value="{{ $data->id }}" {{ $selectedIndustri == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('industri_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('industri_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Perbarui</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection