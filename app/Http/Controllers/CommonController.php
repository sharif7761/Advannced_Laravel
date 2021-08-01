<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\SendEmailMailable;
use App\Models\User;
use App\Notifications\TaskCompleted;
use App\Providers\TaskEvent;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommonController extends Controller
{
    public function localeIndex($lang=null){
        App::setlocale($lang);
        return view('locale.index');
    }

    public function queueIndex(){
        return view('queue.index');
    }

    public function sendMail(){
        $job = (new SendMailJob())->delay(now()->addSecond(5));
        $this->dispatch($job);
        return back()->with('message', 'Mail Sent Successfully');
    }

    public function event(){
        event(new TaskEvent('Hey how are you'));
    }

    public function subscribeGate(){
        if (Gate::allows('subscribers-only', Auth::user())) {
            return view('gates.index');
        }
    }

    public function premiumPolicies(){
        if (Gate::allows('premium_members_only', Auth::user())) {
            return view('policies.index');
        }
    }

    public function notification(){
        User::find(1)->notify(new TaskCompleted());
        return back()->with('message', 'Notification Mail Sent Successfully');
    }
}
