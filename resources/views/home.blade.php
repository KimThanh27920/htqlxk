@extends('page master.page_master')

@section('title', 'HOME')

@section('heading', 'QLXK')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        @if (session('status'))
                            
                            {{ session('status') }}
                            
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
