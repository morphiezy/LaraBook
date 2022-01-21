@extends('layout')
   
@section('content')
   
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
  
    <div class="app-container">
        <form class="lara-form" action="{{ route('update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="judul" value="{{ $data->judul }}" class="form-control" placeholder="Judul">
            <input type="text" name="pengarang" value="{{ $data->pengarang }}" class="form-control" placeholder="Pengarang">
            <div class="container-button">
                <button type="submit" class="cta-btn orange-btn large-btn">simpan</button>
                <a class="cta-btn gray-btn large-btn" href="{{ route('index') }}"> Cancel</a>
            </div>
        </form>
    </div>

@endsection