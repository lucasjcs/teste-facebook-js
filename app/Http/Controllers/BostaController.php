<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Intervention\Image\Response;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;

class BostaController extends Controller
{
    public function index()
    {
        $img = Image::canvas(800, 600, '#ff0000');

        // create response and add encoded image data
        $response = Response::make($img->encode('png'));

        // set content-type
        $response->header('Content-Type', 'image/png');

        // output
        return $response;
    }
}
