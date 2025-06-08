@extends('admin.layouts')
@section('admin.content')
    <div class="container">
        {{ $users->links() }}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="d-flex gap-2">
                            
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <!--  -->
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
        </table>
    </div>
@endsection