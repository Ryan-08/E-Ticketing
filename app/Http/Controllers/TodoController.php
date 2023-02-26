<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $input = $request->input();
        $input['user_id'] = $user->id;
        $todoStatus = Todo::create($input);
        if ($todoStatus) {
            // Add activity logs
            activity('todo')
                ->performedOn($todoStatus)
                ->causedBy($user)
                //->withProperties(['customProperty' => 'customValue'])
                ->log('Todo created by ' . $user->name);
            $request->session()->flash('success', 'Todo successfully added');
        } else {
            $request->session()->flash('error', 'Oops something went wrong, Todo not saved');
        }
        return redirect('todo');
    }
}
