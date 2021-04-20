<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;



use App\Creation;

class ApiController extends Controller
{
   public function save(Request $request){

      //----- GET AND SET DATA------
      $data = $request -> all();
      $work_name = $data['processing_name']; //name from input text
      $encoded_img = $data['image'];   //get the base64 img string
      $onlyimg = explode(',', $encoded_img);//exploding string and getting only base 64 for decoding
      $decoded_img = base64_decode($onlyimg[1]); 
      $sizeInfo = getimagesizefromstring($decoded_img); //get width and height of DECODED image
      $original_width = $sizeInfo[0];
      $original_height = $sizeInfo[1];

      //------ SAVE RECORD IN DB--------
      $creation = Creation::make($data); //saving record in db
      $creation -> hash ='images'.$work_name;
 
      $creation -> save();
      
      $lastSaved = DB::table('creations') -> latest('created_at') -> get('id') -> first();
  
      
      //------RESIZE SET UP------

      $thumb = .2; //set the scaling ratio for thumbnail
      $mid = .6; //set the scaling ratio for middle
      $large = 1.5; //set the scaling ratio for large    

      $largeWidth = $original_width * $large;
      $largeHeight = $original_height * $large;
      $midWidth = $original_width * $mid;
      $midHeight = $original_height * $mid;
      $thumbWidth = $original_width * $thumb;
      $thumbHeight = $original_height * $thumb;



      // -----CREATE NEW DIR IN STORAGE PATH-----
      $last_created = $creation -> id;//get id to increment nextfolder
      $dir = storage_path('app/public/output/'. $last_created . '_images' );
      \File::makeDirectory($dir, 493, true); 
      

      // -----CREATE IMAGE, ADD WATERMARK, RESIZE AND SAVE-----
      $thumbnail = Image::make($decoded_img);
      $thumbnail -> insert('storage/watermark.png', 'bottom-right', 10, 10);
      $thumbnail -> resize($thumbWidth, $thumbHeight);
      $thumbnail -> save( $dir . '/'.$work_name.'_thumbnail.png');

      $middle = Image::make($decoded_img);
      $middle -> insert('storage/watermark.png', 'bottom-right', 10, 10);
      $middle -> resize($midWidth, $midHeight);
      $middle -> save( $dir . '/'.$work_name.'_midlle.png');

      $large = Image::make($decoded_img);
      $large -> insert('storage/watermark.png', 'bottom-right', 10, 10);
      $large -> resize($largeWidth, $largeHeight);
      $large -> save( $dir . '/'.$work_name.'_large.png');

   }

   public function delete($id){

      $creation = Creation::findOrFail($id);
      $creation -> delete($id);
      // return response()->json('creazione'. $id .'cancellata');
      return redirect() -> route('creation-index');


   }
}

