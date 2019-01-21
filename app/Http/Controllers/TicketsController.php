<?php

namespace App\Http\Controllers;
use App\Http\Requests\TicketFormRequest;

use App\Ticket;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = DB::table('tickets')->get();

        return view("ticket/index", ['tickets' => $tickets]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ticket/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        $res = false;
        $msg = 'your ticket has been created with id: ';
        $slug = uniqid();
        $err = '';

        try {
            $ticket = new Ticket([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'slug' => $slug
            ]);
            $res = $ticket->save();

        } catch(Exception $e) {
            $err = getMessage();
            $e->getTraceAsString();
        }


        if($res) {
            return redirect('/ticket/index')->with('status', $msg . $slug);
        } else {
            return redirect('/ticket/index')->with('err', 'Unsuccessful! ' . $err);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = DB::table('tickets')->where('id', $id)->first();

        return view("ticket/show", ['ticket' => $ticket]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = DB::table('tickets')->where('id', $id)->first();

        return view("ticket/edit", ['ticket' => $ticket]);

        //echo $ticket->title;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $title = $request->get('title');
        $content = $request->get('content');

        $res = DB::update('update tickets set title=?, content=? where id=?', [$title, $content, $id]);

        return redirect('/ticket/index')->with('status', 'Update Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);

        $ticket->delete();

        return redirect('/ticket/index');


    }
}
