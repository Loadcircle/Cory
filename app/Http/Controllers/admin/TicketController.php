<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Local;
use App\Counter;

class TicketController extends Controller
{
    function index(Request $request)
    {
        $tickets = Ticket::join('locals', 'locals.id', '=', 'tickets.locals_id')
                            ->select('tickets.*', 'locals.name as l_name')
                            ->orderBy('id', 'DESC')->paginate($request->results);
        $local = Local::select('name', 'id')->get();

        $total_consume = Ticket::get()->sum('consume');

        return [
            'paginate' => [
                'total' => $tickets->total(),
                'current_page' => $tickets->currentPage(),
                'per_page' => $tickets->perPage(),
                'last_page' => $tickets->lastPage(),
                'from' => $tickets->firstItem(),
                'to' => $tickets->lastItem(),
            ],
            'tickets' => $tickets,
            'local' => $local,
            'total_consume' => $total_consume
        ];
    }

    function email(Request $request)
    {
        $tickets = Ticket::join('locals', 'locals.id', '=', 'tickets.locals_id')
                            ->select('tickets.*', 'locals.name as l_name')
                            ->where('tickets.email', '=', $request->email)
                            ->orderBy('id', 'DESC')->paginate($request->results);
        $local = Local::select('name', 'id')->get();
        $total_consume = $tickets->sum('consume');

        return [
            'paginate' => null,
            'tickets' => $tickets,
            'local' => $local,
            'total_consume' => $total_consume,
        ];
    }

    function rut(Request $request)
    {
        $tickets = Ticket::join('locals', 'locals.id', '=', 'tickets.locals_id')
                            ->select('tickets.*', 'locals.name as l_name')
                            ->where('tickets.rut', '=', $request->rut)
                            ->orderBy('id', 'DESC')->paginate($request->results);
        $local = Local::select('name', 'id')->get();
        $total_consume = $tickets->sum('consume');

        return [
            'paginate' => null,
            'tickets' => $tickets,
            'local' => $local,
            'total_consume' => $total_consume,
        ];
    }

    function local(Request $request)
    {
        $tickets = Ticket::leftJoin('locals', 'locals.id', '=', 'tickets.locals_id')
                            ->select('tickets.*', 'locals.name as l_name')
                            ->where('locals.id', '=', $request->id)
                            ->orderBy('id', 'DESC')->paginate($request->results);

        $local = Local::select('name', 'id')->get();

        $total_consume = $tickets->sum('consume');

        return [
            'paginate' => ['total' => $tickets->total()],
            'tickets' => $tickets,
            'local' => $local,
            'total_consume' => $total_consume,
        ];
    }

    function consume(Request $request, $id)
    {
        $this->validate($request, [
            'consume' => 'numeric',
        ]);

        Ticket::find($id)->update($request->all());

        return;
    }


    function store(Request $request)
    {
        $local_val = $request->ticket_number.'L-'.$request->locals_id;
        $request->merge(['local_val' => $local_val]);

        $this->validate($request, [
            'name' => 'required|max:30',
            'lastname' => 'required|max:30',
            'rut' => 'required|max:9',
            'email' => 'required|email',
            'phone' => 'required|max:12',
            'ticket_number' => 'required|max:6',
            'local_val' => 'required|unique:tickets,local_val',
            'locals_id' => 'required',
        ]);


        Ticket::create($request->all());

        $counter = Counter::where('rut', '=', $request->rut)->count();

        if($counter > 0){
            Counter::where('rut', '=', $request->rut)->increment('number');
        }else{
            Counter::create(['rut' => $request->rut, 'number' => '1']);
        }

        return;
    }

    function counter()
    {
        $counter = Counter::orderBy('number', 'DESC')->get();

        return $counter;
    }

}
