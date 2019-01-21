@extends('shared.header')

@section('title', "Home Page")

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">Ticket List</div>

        </div>

        <a href="/ticket/create">
            <button> New Ticket</button>
        </a>


        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if(session('err'))
            <div class="alert alert-success">{{ session('err') }}</div>
        @endif


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col"> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                 <tr>

                    <th scope="row">{{ $ticket->id  }}</th>
                    <td> <a href="{{ $ticket->id  }}/show"> {{ $ticket->title  }}  </a></td>
                    <td>{{ $ticket->content  }}</td>
                     <td>
                         <button><a href="{{ $ticket->id  }}/edit">Edit</a></button>
                         <button><a onclick="return confirm('Are you sure')" href="{{ $ticket->id  }}/del">Del</a></button>
                     </td>

                </tr>
            @endforeach

            </tbody>
        </table>



    </div>

@endsection

