@extends('shared.header')

@section('title', "Home Page")

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">Show Ticket</div>

        </div>

        <div>
                @foreach($errors->all() as $error)
                   <p class="alert alert-danger">{{ $error  }}</p>
                @endforeach

                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                @if(session('err'))
                    <div class="alert alert-success">{{ session('err') }}</div>
                @endif

                <input type="text" name="title" value="{{$ticket->title}}" placeholder="Title" id="title" class="form-control" disabled="disabled">
                <textarea name="content" id="content" cols="30" rows="5" class="form-control" disabled="disabled">{{$ticket->content}}</textarea>


            <a href="/ticket/index">
                <button>Back</button>
            </a>

            <a href="/ticket/{{$ticket->id}}/edit">
                <button>Edit</button>
            </a>

        </div>

    </div>

@endsection

