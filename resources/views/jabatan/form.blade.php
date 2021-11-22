<div class="box box-info padding-1">
    <div class="box-body">
   
    <div class="form-group">
    {{ Form::label('nama_jabatan') }}
    {{ Form::text('nama_jabatan', $jabatan->nama_jabatan,
    ['class' => 'form-control' . ($errors->has('nama_jabatan') ? '
    is-invalid' : ''), 'placeholder' => 'Nama Jabatan']) }}
    {!! $errors->first('nama_jabatan',
    '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group">
    {{ Form::label('tunjangan') }}
    {{ Form::text('tunjangan', $jabatan->tunjangan,
    ['class' => 'form-control' . ($errors->has('tunjangan') ? '
    is-invalid' : ''), 'placeholder' => 'Tunjangan']) }}
    {!! $errors->first('tunjangan',
    '<div class="invalid-feedback">:message</p>') !!}
    </div>
    </div>
    <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
   </div>
   