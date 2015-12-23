<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;

class FlyersController extends Controller
{
    public function create()
    {
        return view('flyers.create');
    }

    public function store(FlyerRequest $request)
    {
        Flyer::create($request->all());

        flash()->success('Success!', 'Your flyer has been created.');

        return redirect()->back();
    }

    public function show($zip, $street)
    {
        $flyer =  Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }

    public function addPhoto($zip, $street, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        $photo = Photo::fromForm($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);

        return "Done";
    }
}
