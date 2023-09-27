<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $announcements = Announcement::take(4)->where('is_accepted', true)->orderBy('created_at','desc')->get();
        return view('welcome',compact('announcements'));
    }

    public function show(Announcement $announcement){
        return view('announcements.show',compact('announcement'));
    }

    public function bycategory(Category $category){
        $category = Category::findOrFail($category->id);
        $announcements = $category->announcements()->where('is_accepted', true)->orderBy('created_at','desc')->get();;
        return view('bycategory' , compact('category', 'announcements'));
    }

    public function searchAnnouncements(Request $request){
        $category = Category::where('name', $request->searched)->first();
        if($category) {
            $announcements = $category->announcements;
            return view('bycategory', compact('category', 'announcements'));
        }
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(8);
        $announcements->appends(['searched' => $request->searched]);
        return view('announcements.index', compact('announcements'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
