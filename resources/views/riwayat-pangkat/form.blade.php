<div class="box box-info padding-1">
<div class="box-body">
{{ Form::hidden('pegawai_id',$peg->id) }}
<div class="form-group">
{{ Form::label('Nomor SK') }}
{{ Form::text('no_sk_jabatan', $rw->no_sk_jabatan,['class' => 'form-control' .
($errors->has('no_sk_jabatan') ? ' is-invalid' : ''), 'placeholder' => '']) }}
{!! $errors->first('no_sk_jabatan','<div class="invalid-feedback">:message</p>') !!}
<div class="form-group">
{{ Form::label('Tanggal Terhitung Mulai') }}
{{ Form::date('tanggal', $rw->tanggal,['class' => 'form-control' .
($errors->has('tanggal') ? ' is-invalid' : ''), 'placeholder' => ''])
}}
{!! $errors->first('tanggal','<div class="invalid-feedback">:message</p>') !!}
</div>
</div>
<div class="form-group">
{{ Form::label('pangkat_golongan') }}
{{ Form::select('mst_pangkat_id',$pangkat, $rw->mst_pangkat_id ,
['id'=>'mst_pangkat_id','class' => 'form-control' .
($errors->has('mat_pangkat_id') ? ' is-invalid' : ''), 'placeholder' =>
'--- pilih ---']) }}
<!-- {!! $errors->first('mst_jabatan_id', '<div class="invalidfeedback">:message</div>') !!} -->
{!! $errors->first('mst_pangkat_id','<div class="invalid-feedback">:message</p>')
!!}
</div>
</div>
<div class="form-group">
{{ Form::label('Gaji Pokok') }}
{{ Form::number('gaji_pokok', $rw->gaji_pokok,['class' => 'form-control' .
($errors->has('gaji_pokok') ? ' is-invalid' : ''), 'placeholder' => '']) }}
{!! $errors->first('gaji_pokok','<div class="invalid-feedback">:message</p>') !!}
</div>
<div class="form-group">
{{ Form::label('Status') }}
{{ Form::select('status',\App\Models\RiwayatPangkat::listStatus(),
$rw->status, ['id'=>'status','class' => 'form-control' .
($errors->has('status') ? 'is-invalid' : ''), 'placeholder' => '--- pilih -
--']) }}
{!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="box-footer mt20">
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</div>