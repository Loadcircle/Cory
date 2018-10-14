<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Local;
use App\Counter;
use App\Exports\TicketExport;
use Maatwebsite\Excel\Facades\Excel;
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


    function counter()
    {
        $counter = Counter::orderBy('number', 'DESC')->get();

        return $counter;
    }

    public function export()
    {
        return Excel::download(new TicketExport, 'boletas.xlsx');
    }

}
