<?php

namespace App\Http\Controllers;

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


        // query message with user id
        $apartment_id = $request->id;
        $messages = Message::where('apartment_id',$apartment_id)->get();

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
        $messages = Message::all();
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

        foreach ($messages as $message) {
            if ($new_message->email == $message['email'] && $new_message->apartment_id == $message->apartment_id){
                return redirect()->back()->with('error', 'Hai già inviato un messaggio!');
            }
        }


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

