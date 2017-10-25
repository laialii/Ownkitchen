<!--http://www.core45.com/using-database-to-store-images-in-laravel-5-1/-->
<?php

namespace App\Http\Controllers;

use App\Imagem;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Image;

class PictureController extends Controller
{
    public function showPictureList()
    {
        $pictures = Imagem::all();
        return view('picturelist')->with('pictures', $pictures);
    }

    public function addPicture()
    {
        return view('addpicture');
    }

    public function savePicture(Request $request)
    {

         $file = Input::file('imagem');
         $img = Image::make($file);
         Response::make($img->encode('jpeg'));

         $picture = new Imagem;
         $picture->imagem = $img;
         $picture->save();

         return Redirect::to('list');
    }

    /*
     * Extracts picture's data from DB and makes an image
     */
    public function showPicture($id)
    {
        $picture = Imagem::findOrFail($id);
        $pic = Image::make($picture->imagem);
        $response = Response::make($pic->encode('jpeg'));

        //setting content-type
        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }
}
