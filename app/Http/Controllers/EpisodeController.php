<?php

namespace App\Http\Controllers;


use App\Models\Drama;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function create(Drama $drama)
    {
        return view('admin.episode.create', compact('drama'));
    }

    public function store(Request $request, Drama $drama)
    {
        // Validate the form data
        $request->validate([
            'episode_number' => 'required|integer',
            'duration' => 'required|integer',
            'type' => 'required|string',
            'sponsored_by' => 'nullable|string',
            'associated_by' => 'nullable|string',
        ]);

        // Create a new episode
        $episode = new Episode([
            'episode_number' => $request->input('episode_number'),
            'duration' => $request->input('duration'),
            'type' => $request->input('type'),
            'sponsored_by' => $request->input('sponsored_by'),
            'associated_by' => $request->input('associated_by'),
        ]);

        $drama->episodes()->save($episode);

        return redirect()->route('episode.manage', ['drama' => $drama->id]);
    }
    public function episodeManage(Drama $drama)
    {
        $episodes = $drama->episodes;

        return view('admin.episode.manage', compact('drama', 'episodes'));
    }

    public function edit(Drama $drama, $episodeId)
    {
        $episode = Episode::findOrFail($episodeId);
        return view('admin.episode.edit', compact('drama', 'episode'));
    }

    public function update(Request $request, Drama $drama, $episodeId)
    {
        $episode = Episode::findOrFail($episodeId);

        // Validate the form data
        $request->validate([
            'episode_number' => 'required|integer',
            'duration' => 'required|integer',
            'type' => 'required|string',
            'sponsored_by' => 'nullable|string',
            'associated_by' => 'nullable|string',
        ]);

        // Update the episode
        $episode->update([
            'episode_number' => $request->input('episode_number'),
            'duration' => $request->input('duration'),
            'type' => $request->input('type'),
            'sponsored_by' => $request->input('sponsored_by'),
            'associated_by' => $request->input('associated_by'),
        ]);

        // Redirect back to the manage page or wherever you want
        return redirect()->route('episode.manage', ['drama' => $drama->id])->with('success', 'Episode updated successfully');
    }

    public function destroy($episodeId)
    {
        $episode = Episode::findOrFail($episodeId);

        // Delete the episode
        $episode->delete();

        // Redirect back to the manage page or wherever you want
        return back()->with('success', 'Episode deleted successfully');
    }

}
