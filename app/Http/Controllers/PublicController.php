<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\MailWorkRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;


class PublicController extends Controller 
{
   

    public function welcome() {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public static function middlewaere()
    {
        return[

            new Middleware('auth', except:['homepage'])
        ];
    }
    
    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(request $request){
        $request->validate([
            'role'=>'required',
            'email'=>'email',
            'message'=>'required'
            ]);

            $user = Auth::user();
            $role = $request->role;
            $email = $request->email;
            $message = $request->message;
            $info = compact('role', 'email', 'message');

            Mail::to('admin@email.it')->send(new MailWorkRequest($info));
           
            switch ($role){

                case 'admin':
                    $user->is_admin = NULL;
                    break;

                    case 'revisor':
                        $user->is_revisor = NULL;
                        break;

                        case 'writer':
                            $user->is_writer = NULL;
                            break;
            }
            $user->update();
            return redirect (route('welcome'))->with('message', 'Mail inviata con successo XD');
         }

         
    }
