<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Local;
use App\Ticket;
use App\Counter;

class LandingController extends Controller
{
    function index()
    {
        //$locals = Local::orderBy('name', 'ASC')->pluck('name', 'id');
        $locals = Local::select('name', 'id')->get();

        return view('welcome', compact('locals'));
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

        // if ($validator->fails()) {
        //   return response()->json(['errors'=>$validator->errors()]);

        // }else{

            $ticket = Ticket::create($request->all());

            $counter = Counter::where('rut', '=', $request->rut)->count();

            if($counter > 0){
                Counter::where('rut', '=', $request->rut)->increment('number');
            }else{
                Counter::create(['rut' => $request->rut, 'number' => '1']);
            }

            return response()->json(['ok' => 'ok']);;

        //}

    }
}
