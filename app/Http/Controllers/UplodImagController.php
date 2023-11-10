<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\UplodImag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UplodImagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = UplodImag::get();
        return view('index', [
            'personal' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        // dd($req->all());
        // $input = $req->file();
        // dd($input);
        try {

            // dd($req->name);
            $name = $req->name;
            $mail = $req->mail;
            $pass = $req->pass;
            // dd($name,$mail,$pass);
            $uploadPath = "images/" . date('Y') . '/' . date('m');
            if (!file_exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }
            //  dd($uploadPath);
            $images = $req->file('img')[0];
            $imagesName = time() . '.' . $images->extension();
            $imagesPath = $uploadPath . '/' . $imagesName;

            if ($images) {
                $images->move($uploadPath, $imagesName);
                // return response(['upload succsess']);
            } else {
                return response([
                    'massage' => 'error',
                    'description' => 'image not upload !!'
                ], 400);
            }

            $create = new Profile();
            $create->name = $name;
            $create->email = $mail;
            $create->pass = Hash::make((string)$pass);
            // dd(Hash::make((string)$pass));
            $create->img = $imagesPath;
            $create->save();

            return response([
                'message' => 'ok',
                'status' => true,
                'description' => 'Create successfully'
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'error',
                'status' => false,
                'errorMessage' => $e->getMessage()
            ], 500);
        }



        //  dd($images,$name,$mail,$pass);
    }

    public function getProfile()
    {
        $profile = Profile::all();

        return view('profile', [
            'profile' => $profile,
        ]);
    }
    public function getID(Request $request)
    {

        try {
            // $get = $request->id;
            //    dd($get);
            //    $data = Profile::where('id',$get)->get()->first();
            //    dd($data);
            $where = array('id' => $request->id);
            // dd($where);
            $post = Profile::where($where)->first();
            return response([
                'message' => 'ok',
                'status' => true,
                'description' => 'Create successfully',
                'profile' => $post
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'error',
                'status' => false,
                'errorMessage' => $e->getMessage()
            ], 500);
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UplodImag  $uplodImag
    //  * @return \Illuminate\Http\Response
     */
    public function show(UplodImag $uplodImag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UplodImag  $uplodImag
    //  * @return \Illuminate\Http\Response
     */
    public function edit(UplodImag $uplodImag)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UplodImag  $uplodImag
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $name = $request->name;
            $mail = $request->mail;

            // $image = $request->file('img')[0];
            $img = '';
            //    dd( $image);
            if (isset($request->file('img')[0])) {

                $uploadPath = "images/" . date('Y') . '/' . date('m');
                if (!file_exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true, true);
                }
                //  dd($uploadPath);
                $image = $request->file('img')[0];
                $imagesName = time() . '.' . $image->extension();
                $imagesPath = $uploadPath . '/' . $imagesName;

                if ($image) {
                    $image->move($uploadPath, $imagesName);
                    // return response(['upload succsess']);
                } else {
                    return response([
                        'massage' => 'error',
                        'description' => 'image not upload !!'
                    ], 400);
                }
                $img = $imagesPath;
            } else {
                $img = $request->img_alt;
            }
            // dd($id,$name,$mail,$img);

            //    dd($img);
            $update = Profile::find($id);
            // dd($update);
            $update->name = $name;
            $update->email = $mail;
            $update->img = $img;
            //  dd($update);
            $update->save();
            return response([
                'message' => 'ok',
                'status' => true,
                'description' => 'Create successfully'
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'error',
                'status' => false,
                'errorMessage' => $e->getMessage()
            ], 500);
        }


        // return $this->sendResponse($update,'Updete success'); 
        // "images/2023/04/1680928994.png"
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UplodImag  $uplodImag
    //  * @return \Illuminate\Http\Response
     */
    public function destroy(UplodImag $uplodImag)
    {
        //
    }
}
// public function edit(Request $request, $id)
// {
//     // Get the image file from the request
//     $image = $request->file('image');

//     // Check if an image was uploaded
//     if ($image) {
//         // Check if the image already exists in the database
//         $existingImage = Image::where('filename', $image->getClientOriginalName())->first();

//         if ($existingImage) {
//             // If the image already exists, use the existing image ID
//             $imageId = $existingImage->id;
//         } else {
//             // If the image does not exist, add it to the database
//             $uploadPath = "images/" . date('Y') . '/' . date('m');
//             if (!file_exists($uploadPath)) {
//                 mkdir($uploadPath, 0777, true);
//             }

//             $imageName = time() . '_' . $image->getClientOriginalName();
//             $image->move($uploadPath, $imageName);

//             $newImage = new Image;
//             $newImage->filename = $imageName;
//             $newImage->save();

//             $imageId = $newImage->id;
//         }
//     } else {
//         // If no image was uploaded, use the existing image ID
//         $imageId = $request->input('image_id');
//     }

//     // Update the record with the new image ID
//     $record = Record::findOrFail($id);
//     $record->image_id = $imageId;
//     $record->save();

//     // Redirect to the updated record
//     return redirect()->route('records.show', $id);
// }