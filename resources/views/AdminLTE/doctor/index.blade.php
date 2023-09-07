@extends('AdminLTE.inc.master')
@section('container')
<div class="content-wrapper">
<img src="" alt="" >
    <section class="content">
        <div class="row mb-3"><div class="col-sm-12"  >
            <a class="btn btn-success" href="{{ route('doctor.create') }}">create</a>
        </div></div>
        
<div class="row">
<div class="col-12">
      <div class="card">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
<!-- /.card-header -->
    <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                    <th>Reason</th>
                </tr>
            </thead>
            @foreach ( $doctors as $doctor)
                <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{asset('doctor/images/'.$doctor->image)}}"width="70px"  height="auto"  alt="{{ $doctor->image }}"> </td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->major->title }}</td>
                    <td><span class="tag tag-success">Approved</span></td>
                <td>
                <a href="{{ route('doctor.edit',$doctor->id) }}">edit</a>
                <form action="{{ route('doctor.destroy',$doctor->id) }}" method="post">
                    @csrf
                @method('DELETE')
                <input type="submit" value="destroy">
                </form>
                
                </td>
            </tr>
            
            </tbody>
            @endforeach
            
        </table>
        {{ $doctors->links() }}
    </div>
    <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>

</section>
</div>
@endsection