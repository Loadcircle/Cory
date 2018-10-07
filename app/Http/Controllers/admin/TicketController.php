<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Local;

class TicketController extends Controller
{
    function index($pages = 10)
    {
        $tickets = Ticket::join('locals', 'locals.id', '=', 'tickets.locals_id')
                            ->select('tickets.*', 'locals.name as l_name')
                            ->orderBy('id', 'DESC')->paginate($pages);

        $locals = Local::orderBy('name', 'ASC')->pluck('name', 'id');

        return [
            'paginate' => [
                'total' => $tickets->total(),
                'current_page' => $tickets->currentPage(),
                'per_page' => $tickets->perPage(),
                'last_page' => $tickets->lastPage(),
                'from' => $tickets->firstItem(),
                'to' => $tickets->lastItem(),
            ],
            'tickets' => $tickets
        ];
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

        return;
    }
}
