<?php

namespace App\Http\Controllers;

use Auth;
use App\Flyer;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;

class FlyersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);

        parent::__construct();
    }

    public function create()
    {
        return view('flyers.create');
    }

    public function store(FlyerRequest $request)
    {
        $flyer = Auth::user()->publish(
            new Flyer($request->all())
        );

        flash()->success('Success!', 'Your flyer has been created.');

        return redirect(flyer_path($flyer));
    }

    public function show($zip, $street)
    {
        $flyer =  Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }
}
