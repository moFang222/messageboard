<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\message;

class MessageController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {   
        //当按下showmessagebtn时，也是在index的界面上加载信息，故需要传入信息
        // $username=auth()->user()->name;
        $pagepernum=5;
        $messagenum=count(message::all());
    	$messages=message::latest()->limit($pagepernum)->get();
        $pagenum=$messagenum/$pagepernum;
        if($leftpage=$messagenum%$pagepernum)
        {
            $pagenum=intval($pagenum+1);
        }
        for($i=0;$i<$pagenum;$i++)
        {
            $pagenums[]=$i+1;
        }
        $pageid=1;//首页page为第一页
        return view('index')->with(compact(['messages','messagenum','pageid','pagenums']));
    }

    public function store()
    {
    	$username=auth()->user()->name;
        $userid=auth()->user()->id;
    	// dd($username);
    	message::create([
    		'body'=>request('newmessage'),
    		'username'=>$username, 
            'user_id'=>$userid
    		]);
    	return redirect()->home();
    }

    public function create()
    {
    	return message::all()->toArray();
    }

    public function show()
    {
        $pageid=request('pageid');
        $messagenum=count(message::all());
        $pagepernum=5;
        $messages=message::latest()->offset(($pageid-1)*$pagepernum)->limit($pagepernum)->get();
        return view('template')->with(compact(['messages','messagenum','pageid']));
    }
}
