@extends('Posts\layout')

@section('content')
    <div class="row"> 
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>USER</h2>
            </div>
            <div class="pull-right mb-4">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Nama</th>
            <th>Role User</th>
            <th>Jadwal Kerja</th>
            <th>Gaji</th>
            <th width="220px">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <!-- <td>{{ ++$i }}</td> -->
            <!-- <td><img src="/images/{{ $post->image }}" width="100px"></td> -->
            <td>{{ $post->id }}</td>
            <td>{{ $post->email }}</td>
            <td>{{ $post->password }}</td>
            <td>{{ $post->nama }}</td>
            <td>{{ $post->role_user }}</td>
            <td>{{ $post->jadwal_kerja }}</td>
            <td>{{ $post->gaji }}</td>
            <td>
                <form action="{{ route('post.destroy',$post->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('post.show',$post->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('post.edit',$post->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    <!-- {!! $posts->links() !!} -->
        
@endsection