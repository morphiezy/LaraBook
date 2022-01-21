@extends('layout')
 
@section('content')
   
    @if ($message = Session::get('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="toast show">
                <div class="toast-header">
                    <img src="{{asset('image/icon.svg')}}" class="rounded me-2" alt="icon">
                    <strong class="me-auto">Larabook</strong>
                    <small>Baru Saja </small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    <p>{{$message}}</p>
                </div>
        </div>
    </div>
    @endif

    @if (!$bukus-> isEmpty())
    <div class="app-container">
        <div class="flex">
            <h1 class="book-total"><span class="highlight-text">{{$bukus->count()}}</span> Book in library</h1>
            <a class="cta-btn orange-btn add-more" href="{{ route('create') }}"> Add</a>
        </div>
        <table>
            <tr class="header-table">
                <th style="width:70px;">No</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
            @foreach ($bukus as $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->pengarang }}</td>
                <td>{{ $data->created_at }}</td>    
                <td>{{ $data->updated_at }}</td>
                <td>
                    <form action="{{ route('destroy',$data->id) }}" method="POST">
                        <a class="edit-btn" href="{{ route('edit',$data->id) }}">Edit</a>
    
                        @csrf
                        @method('delete')

                        <button class="delete-btn" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <!-- <table>
            <tr class="row">
                <th>No</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th width="280px">Action</th>
            </tr>
            
        </table> -->
    </div>

    {!! $bukus->links() !!}

    @else

    <div class="app-container empty-box">
        <h1 class="empty-alert-text">&lt;\library is null&gt;</h1>
        <a class="cta-btn orange-btn init-add" href="{{ route('create') }}"> Add Book !</a>
    </div>

    @endif

@endsection