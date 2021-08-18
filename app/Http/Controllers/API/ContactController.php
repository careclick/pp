<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\NewMessage;


class ContactController extends Controller
{
    public function getContacts(){
        $contacts = User::where('id','!=', auth()->id())->get();

        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
                ->where('to', auth()->id())
                ->where('read', false)
                ->groupBy('from')
                ->get();
        $contacts = $contacts->map(function($contact) use($unreadIds){
					$contactUnread  = $unreadIds->where('sender_id', $contact->id)->first();
					$contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
					return $contact;
				});

        return response()->json($contacts,200);
    }

    public function getConversation(Request $request){

				$id = $request->id;
				Message::where('from', $id)->where('to', auth()->id())->update(['read'=>true]);
        $messages = Message::where(function($q) use($id){
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use($id){
            $q->where('to', auth()->id());
            $q->where('from', $id);
        })->get();
        return response()->json($messages, 200);
    }
    
    public function postConversation(Request $request){

        $message = Message::create([

            'from'=>auth()->id(),
            'to'=>$request->contact_id,
            'text'=>$request->text
        ]);

				broadcast(new NewMessage($message));
            
        return response()->json($message, 200);

    }

}
