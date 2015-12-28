<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests;
use App\AddPhotoToFlyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPhotoRequest;

class FlyerPhotosController extends Controller
{
    public function store($zip, $street, AddPhotoRequest $request)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        $photo = $request->file('photo');

        (new AddPhotoToFlyer($flyer, $photo))->save();
    }
}
