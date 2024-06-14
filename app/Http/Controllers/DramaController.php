<?php

namespace App\Http\Controllers;

use App\Models\Drama;

use App\Models\Mail as Mails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class DramaController extends Controller
{

    public function index()
    {
        return view("drama.index");
    }

    public function show()
    {
        $dramas = Drama::all();
        return view("drama.display", compact('dramas'));
    }

    public function subscribe()
    {
        return view("drama.subscribe");
    }
    public function subscribeStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        Mails::firstOrCreate(['email' => $request->email]);

        return redirect()->route('drama.display');

    }

    public function getDramaDetails($id)
    {

        $drama = Drama::find($id);
        $episodes = $drama->episodes;
        return view('drama.details', compact('drama', 'episodes'));
    }


    public function adminDramaStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'day' => 'required|string',
            'time' => 'required|string',
            'male_lead' => 'required|string',
            'female_lead' => 'required|string',
            'writter' => 'required|string',
            'producer' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('pro'), $filename);

        $drama = new Drama();
        $drama->name = $request->input('name');
        $drama->day = $request->input('day');
        $drama->time = $request->input('time');
        $drama->male_lead = $request->input('male_lead');
        $drama->female_lead = $request->input('female_lead');
        $drama->writter = $request->input('writter');
        $drama->producer = $request->input('producer');
        $drama->image = $filename;
        $drama->save();

        $this->sendDramaEmail($request->input('name'), $drama);

        return redirect()->route('admin.drama.display')->with('success', 'Drama updated successfully.');
    }

    private function sendDramaEmail($dramaName, Drama $drama)
    {
        $subscribers = Mails::all();

        foreach ($subscribers as $subscriber) {
            $to = $subscriber->email;
            $subject = $dramaName;

            $dramaDetails = 'This drama will premiere on ' . $drama->day . ' in the night at ' . $drama->time . '. ';
            $dramaDetails .= 'Starring ' . $drama->male_lead . ' as the male lead and ' . $drama->female_lead . ' as the female lead. ';
            $dramaDetails .= 'It is written by ' . $drama->writter . ' and produced by ' . $drama->producer . '.';

            $attachment = public_path('pro') . '/' . $drama->image;

            Mail::to($to)->send(new SendMail($subject, $dramaDetails, $attachment));
        }
    }
    public function getDramaByDayAndTime($day, $time)
    {
        $dramas = Drama::where('day', $day)->where('time', $time)->get();
        return response()->json($dramas);
    }
    public function adminDramaDisplay()
    {
        $dramas = Drama::all();
        return view("admin.drama.display", compact('dramas'));
    }
    public function adminDramaManage()
    {
        $dramas = Drama::all();
        return view("admin.drama.manage", compact('dramas'));
    }
    public function adminDramaCreate()
    {
        return view('admin.drama.create');
    }
    public function adminDramaEdit($id)
    {
        $drama = Drama::find($id);
        return view('admin.drama.edit', compact('drama'));
    }
    public function adminDramaUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'day' => 'required|string',
            'time' => 'required|string',
            'male_lead' => 'required|string',
            'female_lead' => 'required|string',
            'writter' => 'required|string',
            'producer' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $drama = Drama::find($id);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('pro'), $filename);
            $drama->image = $filename;
        }

        $drama->name = $request->input('name');
        $drama->day = $request->input('day');
        $drama->time = $request->input('time');
        $drama->male_lead = $request->input('male_lead');
        $drama->female_lead = $request->input('female_lead');
        $drama->writter = $request->input('writter');
        $drama->producer = $request->input('producer');
        $drama->save();
        return redirect()->route('admin.drama.display')->with('success', 'Drama updated successfully.');
    }
    public function adminDramaDestroy($id)
    {
        $drama = Drama::find($id);
        $drama->delete();
        return back()->with('success', 'Drama deleted successfully');
    }
}
