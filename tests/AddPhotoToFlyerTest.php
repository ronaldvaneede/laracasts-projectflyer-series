<?php

namespace App;

use Mockery as m;
use App\AddPhotoToFlyer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddPhotoToFlyerTest extends \TestCase
{
    use DatabaseTransactions;
    
    /** @test */
    function it_processes_a_form_to_add_a_photo_to_a_flyer()
    {
        $flyer = factory(Flyer::class)->create();

        $file = m::mock(UploadedFile::class, [
            'getClientOriginalName' => 'foo',
            'getClientOriginalExtension' => 'jpg'
        ]);

        $file->shouldReceive('move')
             ->once()
             ->with('files/photos', 'nowfoo.jpg');

        $thumbnail = m::mock(Thumbnail::class);

        $thumbnail->shouldReceive('make')
                  ->once()
                  ->with('files/photos/nowfoo.jpg', 'files/photos/tn-nowfoo.jpg');

        (new AddPhotoToFlyer($flyer, $file, $thumbnail))->save();

        $this->assertCount(1, $flyer->photos);
    }
}

function time()
{
    return 'now';
}

function sha1($path)
{
    return $path;
}
