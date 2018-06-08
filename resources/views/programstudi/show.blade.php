@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Program Studi
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group {{ $errors->has('nama_program') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama_program" class="form-control" value="{{ $programstudi->nama_program }}" readonly>
			  			@if ($errors->has('nama_program'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_program') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('fasilitas_id') ? ' has-error' : '' }}">
					  <label class="control-label">Fasilitas</label>
					<input type="text" name="fasilitas_id" class="form-control" value="{{ $programstudi->fasilitas->nama }}"  readonly>
					  @if ($errors->has('fasilitas_id'))
						<span class="help-block">
							<strong>{{ $errors->first('fasilitas_id') }}</strong>
						</span>
					@endif
				  </div>

				  <div class="form-group {{ $errors->has('industris_id') ? ' has-error' : '' }}">
				  <label class="control-label">Industri</label>
				<input type="text" name="industris_id" class="form-control" value="{{ $programstudi->industri->nama }}"  readonly>
				  @if ($errors->has('industris_id'))
					<span class="help-block">
						<strong>{{ $errors->first('industris_id') }}</strong>
					</span>
				@endif
			  </div>

			  		<div class="form-group {{ $errors->has('stukturs_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Guru</label>
						<input type="text" name="strukturs_id" class="form-control" value="{{ $programstudi->industri->nama }}"  readonly>
			  			@if ($errors->has('strukturs_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('strukturs_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection