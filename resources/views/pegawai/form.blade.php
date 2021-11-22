<div class="box box-info padding-1">
    <div class="box-body">
    
    <div class="form-row">
    {{ Form::label('nip','Nomor Induk Pegawai (NIP)',
    ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">
    {{ Form::text('nip', $pegawai->nip, ['class' => 'form-control' .
    ($errors->has('nip') ? ' is-invalid' : ''), 'placeholder' => 'NIP']) }}
    {!! $errors->first('id', '<div class="invalid-feedback">
    :message</p>') !!}
    </div>
    </div>
   
   
    <div class="form-row">
    {{ Form::label('Nama','Nama',
    ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">
    {{ Form::text('nama', $pegawai->nama, ['class' => 'form-control' .
    ($errors->has('nama') ? ' is-invalid' : ''), 'placeholder' => 'Nama']) }}
    {!! $errors->first('nama', '<div class="invalid-feedback">
    :message</p>') !!}
    </div>
    </div>
   
    <div class="form-row">
    {{ Form::label('Alamaat','Alamat',
    ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">
    {{ Form::text('alamat', $pegawai->alamat, ['class' => 'form-control' .
    ($errors->has('alamat') ? ' is-invalid' : ''),
    'placeholder' => 'Alamat']) }}
    {!! $errors->first('alamat',
    '<div class="invalid-feedback">:message</p>') !!}
    </div>
    </div>
   
    {{-- <div class="form-row">
    {{ Form::label('tanggal_lahir','Tanggal Lahir',
    ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">
    {{ Form::date('tanggal_lahir', $pegawai->tanggal_lahir,
    ['class' => 'form-control' .
    ($errors->has('tanggal_lahir') ? ' is-invalid' : ''),
    'placeholder' => 'Alamat']) }}
    {!! $errors->first('tanggal_lahir',
    '<div class="invalid-feedback">:message</p>') !!}
    </div>
    </div> --}}
   
    <div class="form-row">
    {{ Form::label('jenis_kel','Jenis Kelamin',
    ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">
    {!! Form::radio('jenis_kel','L',
    $pegawai->jenis_kel=="L" ? true : false) !!} Laki-laki
    {!! Form::radio('jenis_kel','P',
    $pegawai->jenis_kel=="P" ? true : false) !!} Perempuan
    {!! $errors->first('jenis_kel', '<div class="invalid-feedback">
    :message</define_syslog_variables>') !!}
    </div>
    </div>
   
    <div class="form-row">
    {{ Form::label('agama','Agama',
    ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">
    {{ Form::select('agama',\App\Models\Pegawai::listAgama(),
    $pegawai->agama, ['id'=>'agama','class' => 'form-control' .
    ($errors->has('agama') ? 'is-invalid' : ''),
    'placeholder' => '--- pilih ---']) }}
    {!! $errors->first('agama', '<div class="invalid-feedback">
    :message</div>') !!}
    </div>
    </div>
   
    <div class="form-row">
    {{ Form::label('telepon','Telepon',['class' => 'col-sm-3 col-form-label',
    'style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">
    {{ Form::text('telepon', $pegawai->telepon, ['class' => 'form-control' .
    ($errors->has('telepon') ? ' is-invalid' : ''),
    'placeholder' => 'Telepon']) }}
    {!! $errors->first('telepon', '<div class="invalid-feedback">
    :message</p>') !!}
    </div>
    </div>
   
    <div class="form-row">
    {{ Form::label('email','Email',['class' => 'col-sm-3 col-form-label',
    'style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">
    {{ Form::text('email', $pegawai->email, ['class' => 'form-control' .
    ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
    {!! $errors->first('email',
    '<div class="invalid-feedback">:message</p>') !!}
    </div>
    </div>
   
   
    <div class="form-row">
    {{ Form::label('jabatan_id','Jabatan Struktural',
    ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">

    {{ Form::select('jabatan_id', $jabatan, $pegawai->jabatan_id ,
    ['id'=>'jabatan_id','class' => 'form-control' .
    ($errors->has('jabatan_id') ? 'is-invalid' : ''), 'placeholder' => '--- pilih ---']) }}
    {!! $errors->first('jabatan_id',
    '<div class="invalid-feedback">:message</div>') !!}
    </div>
    </div>
   
    <div class="form-row">
    {{ Form::label('file_foto','Foto File (jpg)',
    ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
    <div class="col-sm-9">
    {{ Form::file('file_foto', null, ['class' => 'form-control' .
    ($errors->has('file_foto') ? ' is-invalid' : ''),
    'placeholder' => 'Foto']) }}
    {!! $errors->first('file_foto', '<div class="invalid-feedback">
    :message</div>') !!}
    </div>
    </div>
    <div class="col-sm-9">
    @if($pegawai->file_foto)
    <img id="original" src="{{ url('/foto/'.$pegawai->file_foto) }}">
    @endif
    </div>
    </div>
    </div>
    <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
   </div>
   