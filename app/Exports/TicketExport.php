<?php

namespace App\Exports;

use App\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class TicketExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function query()
    {
        return Ticket::query()->join('locals', 'locals.id', '=', 'tickets.locals_id')
        ->select('tickets.id','tickets.name', 'tickets.lastname', 'tickets.rut', 'tickets.email', 'tickets.phone','tickets.ticket_number','tickets.consume', 'locals.name as l_name');
    }

    // public function collection()
    // {
    //     return Ticket::all();
    // }
}
