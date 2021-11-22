<div class="box box-info padding-1">
    <div class="box-body">
   
    <div class="form-group">
    {{ Form::label('tahun') }}
    {{ Form::number('tahun', date('Y'), ['class' => 'form-control' . ($errors->has('tahun') ? '
    is-invalid' : '')]) }}
    {!! $errors->first('tahun',
    '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group">
    {{ Form::label('bulan') }}
    {{ Form::number('bulan', date('m'), ['class' => 'form-control' . ($errors->has('bulan') ? '
    is-invalid' : '')]) }}
    {!! $errors->first('bulan',
    '<div class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
   </div>
   