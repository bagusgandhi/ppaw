<div class="box box-info padding-1">
    <div class="box-body">
   
    <div class="form-group">
    {{ Form::label('nama_pangkat') }}
    {{ Form::text('nama_pangkat', $mstPangkat->nama_pangkat,
    ['class' => 'form-control' .
    ($errors->has('nama_pangkat') ? ' is-invalid' : ''),
    'placeholder' => 'Nama Pangkat']) }}
    {!! $errors->first('nama_pangkat',
    '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group">
    {{-- {{ Form::label('pangkat_golongan') }} --}}
    {{ Form::label('pangkat_gol') }}
    {{ Form::text('pangkat_gol', $mstPangkat->pangkat_gol,
    ['class' => 'form-control' .
    ($errors->has('pangkat_gol') ? ' is-invalid' : ''),
    'placeholder' => 'Pangkat Gol']) }}
    {!! $errors->first('pangkat_gol',
    '<div class="invalid-feedback">:message</p>') !!}
    </div>
    </div>
    <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
   </div>