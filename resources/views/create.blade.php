@extends('layout')
  
@section('content')

<div class="app-container">

    @if ($errors->any())

        <div class="toast-container position-absolute top-0 end-0 p-3">
            @foreach ($errors->all() as $error)
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                    <img src="{{asset('image/icon.svg')}}" class="rounded me-2" alt="icon">
                    <strong class="me-auto">Larabook</strong>
                    <small class="text-muted">Baru saja</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                    {{$error}}
                    </div>
                </div>
            @endforeach
        </div>
   
    @endif

    <form class="lara-form" action="{{ route('store') }}" method="POST">
        @csrf
        <input type="text" name="judul" class="form-control" placeholder="Book Title">
        <input type="text" name="pengarang" class="form-control" placeholder="Author">
        <div class="container-button">
            <button type="submit" class="cta-btn orange-btn large-btn">Add Book</button>
            <a class="cta-btn gray-btn large-btn" href="{{ route('index') }}"> Cancel</a>
        </div>
    </form>
</div>

@endsection