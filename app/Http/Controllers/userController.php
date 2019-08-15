<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class userController extends Controller {

    function retrievedata() {
        $users = User::all();
        return view('user_view', compact('users'));
    }
    
    function datadetail() {
        $users = User::find(Input::get('id'));
        return view('user_viewdetail', compact('users'));
    }
    
    public function createUserXML(Request $request) {
        $rootNode = new\SimpleXMLElement("<?xml version='1.0' encoding='UTF-8' standalone='yes'?><campus></campus>");

        $users = User::all();
        foreach ($users as $users) {
            $itemNode = $rootNode->addChild('User');
            $itemNode->addChild('id', $users->id);
            $itemNode->addChild('name', $users->name);
            $itemNode->addChild('email', $users->email);
            $itemNode->addChild('create_at', $users->create_at);
            $itemNode->addChild('updated_at', $users->updated_at);
        }

        return response($rootNode->asXML())
                        ->withHeaders([
                            'Content-Type' => 'text/xml'
        ]);
    }
    
    function edit() {
        $users = User::find(Input::get('UserID'));
        return view('user_viewupdate', compact('users'));
    }
    
    public function update(Request $request, User $user) {
        if ($request->has('update')) {
            $request->validate([
                'id' => 'required',
                'name' => 'required',
                'email' => 'required',
            ]);
            $user->id = $request->get('id');
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->save();
            return redirect('user_view')->with('success', 'Detail updated');
        } else {
            return redirect('user_view');
        }
    }
    
    public function destroy(User $users) {
        $users->delete();
        return redirect('user_view')->with('success', 'Detail updated');
    }

}
