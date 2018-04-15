<?php

namespace App\Http\Controllers;

use App\Group;
use App\Conversation;
use App\User;
use Illuminate\Http\Request;

class MsngrController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = auth()->user()->groups->reverse();
        $conversations = array();
        foreach ($groups as $group) {
            $conv = Conversation::with('user')->where('group_id', '=', $group->id)->get();
            // array_push($conversations, $conv);
            $conversations[$group->id] = $conv;
        }
        // $conversations = Conversation::where('user_id', '=', auth()->user()->id)->get();
        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();

        return view('msngr', ['conversations' => $conversations, 'groups' => $groups, 'users' => $users, 'user' => $user]);
    }

    public function searchusersbyname(Request $request)
    {
      $search = $request->search;
      $users = User::where('name','LIKE','%' .$search. '%')->paginate(5);
      return $users;
    }

    public function getmessagesforgroup(Request $request)
    {
        $group_id = $request->group_id;
        $conversations = Conversation::where('group_id', '=', $group_id)->get();
        return $conversations;
    }
}
