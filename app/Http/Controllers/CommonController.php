<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\SendEmailMailable;
use App\Models\User;
use App\Notifications\TaskCompleted;
use App\Providers\TaskEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

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
        $when = Carbon::now()->addSecond(5);
        if(Auth::user()){
            $user = Auth::user();
            $user->notify((new TaskCompleted($user))->delay($when));
        } else {
            $user = User::find(1);
            Notification::route('mail', 'sharif@gmail.com')->notify((new TaskCompleted($user))->delay($when));
        }
        return back()->with('message', 'Notification Mail Sent Successfully');
    }

    public function markRead(){
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    }
}
