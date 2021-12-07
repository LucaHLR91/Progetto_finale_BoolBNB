<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Message;
use Illuminate\Support\Facades\Auth;




class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $apartments = Apartment::where('user_id', auth()->user()->id)->get();

        $messages = Message::whereIn('apartment_id', $apartments->pluck('id'))->get();

        //insert  new messages for id = 18
        
        $message->push([
            'apartment_id' => 18,
            
            'message' => 'Привет, как дела?',
            'email' => 'rbizoon',
         
        ]);


        dd($messages);

        // query message with user id

        $messages = Message::all();
        $apartment_id = $request->id;
        return view('admin.messages.index', compact('messages', 'apartment_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apartment_id = $request->id;
        $request->validate([
            'email' => 'required|string|max:100',
            /* 'message' => 'required|string|max:255' */
        ]);
        $form_data = $request->all();
        $now = Carbon::now()->toDateString();


        $new_message = new Message();
        $new_message->fill($form_data);
        $new_message->date = $now;
        $new_message->apartment_id = $form_data['apartment_id'];
        $new_message->save();
        return redirect()->back()->with('message', 'Messaggio inviato!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
