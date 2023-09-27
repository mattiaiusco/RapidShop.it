<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RevisorRequest;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()
            ->back()
            ->with('message', __('ui.announcementAccepted'));
    }
    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()
            ->back()
            ->with('message', __('ui.announcementRefused'));
    }
    public function annulAnnouncement()
    {

        $announcement = Announcement::where('is_accepted', true)
        ->orWhere('is_accepted', false)
        ->latest()
        ->first();
        if($announcement != null){
            $announcement->setAccepted(null);
            return redirect()
            ->back()
            ->with('message', __('ui.cancelAction'));
        }
        return redirect()
            ->back()
            ->with('message', __('ui.allToBeRevisioned'));

    }

    public function formRevisor()
    {
        return view('revisor.becomeRevisor');
    }

    public function becomeRevisor(RevisorRequest $request)
    {
        $coverLetter = $request->coverLetter;
        Mail::to('admin@rapidshop.com')->send(new BecomeRevisor(Auth::user(), $coverLetter));

        return redirect()
            ->route('welcome')
            ->with('message', __('ui.applicationSent'));
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('rapidshop:makeUserRevisor', ['email' => $user->email]);
        return redirect('/')->with('message', __('ui.becameRevisor'));
    }
}
