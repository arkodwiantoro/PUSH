@extends('Posts\layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('post.index') }}"> Back</a>
        </div>
    </div>
</div>
     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
    
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                <input type="string" name="id" class="form-control" placeholder="Id (Isi dengan Angka)", value="{{ $post->id }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="string" name="email" class="form-control" placeholder="Email", value="{{ $post->email }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="string" name="password" class="form-control" placeholder="Password", value="{{ $post->password }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="string" name="nama" class="form-control" placeholder="Nama", value="{{ $post->nama }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role User:</strong>
                <input type="string" name="role_user" class="form-control" placeholder="Role", value="{{ $post->role_user}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jadwal Kerja:</strong>
                <input type="string" name="jadwal_kerja" class="form-control" placeholder="Jadwal Kerja", value="{{ $post->jadwal_kerja}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gaji:</strong>
                <input type="integer" name="gaji" class="form-control" placeholder="gaji", value="{{ $post->gaji }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 mt-3 mb-3 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
@endsection