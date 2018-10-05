<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Local;

class TicketController extends Controller
{
    function index()
    {
        $tickets = Ticket::join('locals', 'locals.id', '=', 'tickets.locals_id')
                            ->select('tickets.*', 'locals.name as l_name')
                            ->orderBy('id', 'DESC')->paginate(10);

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

    }
}
