@extends('shared.header')

@section('title', "Home Page")

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">New Ticket</div>

        </div>

        <div>
            <form action="create" method="post">
                @foreach($errors->all() as $error)
                   <p class="alert alert-danger">{{ $error  }}</p>
                @endforeach

                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                @if(session('err'))
                    <div class="alert alert-success">{{ session('err') }}</div>
                @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="title" placeholder="Title" id="title" class="form-control">
                <textarea name="content" id="content" cols="30" rows="5" class="form-control"></textarea>
                <button class="submit">Submit</button>


            </form>
            <a href="index">
                <button> Cancel</button>
            </a>

        </div>

    </div>

@endsection

