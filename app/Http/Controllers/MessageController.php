<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Sent;
use App\User;
use App\Message;

class MessageController extends Controller
{

    /**
     * Delete a Message by ID
     *
     * @param  Request $request
     * @return Response HTTP status code 204 
     */
    public function deleteMessage(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return 204;
    }
    
    /**
     * Fetch all messages by both users IDs 
     *
     * @return Message
     */
    protected function getMessages(Request $request)
    {
        $from =  $request->fromUserID;
        $to =  $request->toUserID;

        //query the messages to be seen by who sent it and who received it
        $messages = Message::with('user')
			        ->where('to_user_id', $to)
					->where('from_user_id', $from)
					->orWhere(function ($query)use($from, $to) {
					    $query->where('to_user_id', $from)
					          ->where('from_user_id', $to);
					})->get();

		return response()->json($messages, 200);
    }


    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    protected function sendMessage(Request $request)
    {
        $message =  Message::create($request->all());
        
        //after a new message is inserted, now setup the pusher Websocket notification
        $from_user_id = $request->from_user_id;
    	$user = User::find($from_user_id);
        broadcast(new Sent($user, $message))->toOthers();

        return response()->json(['status' => 'Message Sent!'], 201);
    }


}
