<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    //
    // public function create()
    // {
    // 	User::createNewuser(request('user'),request('email'),request('password'));
    // }
    public function store()
    {
        request()->flash();//取得输入表单的当前值
        $rememberme=request('remember-me')?true:false;//check if the user click the remember me 
    	if(! auth()->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme))
    	{
    		return back()->withInput()->withErrors([
    			'message'=>'Please check your credentials and try again'
    			]);
    	}
    	$userid=User::where('email',request('email'))->get()->pluck('id')[0];
    	$user=User::find($userid);
    	auth()->login($user);
    	return redirect()->home();
    }

    public function destroy()
    {
    	auth()->logout();
    	return redirect('/login');
    }

    public function verify()
    {
        if (request()->getMethod() == 'POST')
        {
            $rules = ['captcha' => 'required|captcha'];
            $message=[
                'captcha'=>'Something goes wrong',
            ];
            $validator = Validator::make(request()->all(),$rules,$message)/*->validate()*/;
            // if ($validator->fails())
            // {
            //     echo '<p style="color: #ff0000;">Incorrect!</p>';
            // }
            // else
            // {
            //     echo '<p style="color: #00ff30;">Matched :)</p>';
            // }
            return redirect('captcha-test')->withErrors($validator)->withInput(['captcha'=>1]);
        }
        return view('verify');
    }
}
