<?php

namespace App\Http\Controllers\homeopath;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeopathService;
use App\Models\HomeopathProfile;
use App\Models\HomeopathDocument;
use App\Models\HomeopathImage;
use App\Models\Setting;
use Auth;
use File;
use Crypt;

class SettingsController extends Controller
{
    public function index()
    {
        return view('homeopath.settings.index', get_defined_vars());
    }

    public function updateImages(Request $req)
    {

        if($req->action == 'images')
        {


            if(isset($req->image))
                {
                    if ($req->id==null) {
                        foreach($req->image as $image)
                        {

                            $_images = new HomeopathImage();
                            $_images->user_id = Auth::id();
                            $_images->image = uploadImage($image, 'uploads/homeopath/');
                            $_images->save();
                        }
                    }
                }

                if($req->removeimage)
                {
                    $myArray = explode(',', rtrim($req->removeimage, ','));
                    foreach($myArray as $item)
                    {
                        HomeopathImage::whereId($item)->delete();
                    }
                }

                if ($req->id) {
                    foreach($req->image as $image)
                    {
                        $_images =  HomeopathImage::find($req->id);
                        $_images->user_id = Auth::id();
                        $_images->image = uploadImage($image, 'uploads/homeopath/');
                        $_images->save();

                    }
                }


                return back()->withMessage('Images has been updated.');



        }
        else
        {

            if(isset($req->image))
            {

                foreach($req->image as $image)
                {

                    $_images = new HomeopathDocument();
                    $_images->user_id = Auth::id();
                    $_images->file = uploadImage($image, 'uploads/homeopath/documents/');
                    $_images->save();
                }
            }

            if($req->removeFiles)
            {
                $myArray = explode(',', rtrim($req->removeFiles, ','));
                foreach($myArray as $item)
                {
                    HomeopathDocument::whereId($item)->delete();
                }
            }

                if ($req->pdf)
                {

                    $pdf = uploadImage($req->pdf, 'uploads/documents/users/');

                    if($req->age_type == 'inner_doc')
                    {
                        HomeopathService::findOrfail($req->service_id)->update(
                                [
                                    'child_service_document' => $pdf
                                ]);
                    }
                    else
                    {
                         HomeopathService::findOrfail($req->service_id)->update(
                            [
                                'adult_service_document' => $pdf
                            ]);
                    }


                }

                if ($req->service_document_inner_heading || $req->service_document_heading)
                {


                    if($req->age_type == 'inner_doc')
                    {
                        HomeopathService::findOrfail($req->service_id)->update(
                                [
                                    'service_document_inner_heading' => $req->service_document_inner_heading ?? "" 
                                ]);
                    }
                    else
                    {
                         HomeopathService::findOrfail($req->service_id)->update(
                            [
                                'service_document_heading' => $req->service_document_heading ?? ""  
                            ]);
                    }



                }

                




            return back()->withMessage('Documents has been updated.');

        }






    }


    public function setHomeopathServiceTime(Request $request)
    {

        $homeopath=HomeopathProfile::where('user_id',$request->id)->first();
        $homeopath->service_time_interval =$request->set_time;
        $homeopath->save();
        return back()->with('message','Time has been set');
    }

    public function updateAdditionalDocuments(Request $req)
    {


        // $req->validate([
        //     'service_document_3_heading' => 'required',
        //     'service_document_4_heading' => 'required'
        // ]);
        
        $service = HomeopathService::findOrFail(Crypt::decrypt($req->service_id));


        $service->service_document_3_heading = $req->service_document_3_heading;
        $service->service_document_4_heading = $req->service_document_4_heading;


        if(isset($req->service_document_3_path))
        {
            $service->service_document_3_path = uploadImage($req->service_document_3_path, 'uploads/service/');
        }

        if(isset($req->service_document_4_path))
        {
            $service->service_document_4_path = uploadImage($req->service_document_4_path, 'uploads/service/');
        }

        $service->save();

        return back()->withMessage('Data has been updated.');
        
    }
    
    public function serviceDocumentRemove(Request $req)
    {

        $service = HomeopathService::findOrFail(base64_decode($req->service));


        switch ($req->form) 
        {
          
          case 1:
            $service->update(['service_document_heading' => '', 'adult_service_document' => '']);
            break;
          
          case 2:
            $service->update(['service_document_inner_heading' => '', 'child_service_document' => '']);
            break;
          
          case 3:
            $service->update(['service_document_3_heading' => '', 'service_document_3_path' => '']);
            break;

          case 4:
            $service->update(['service_document_4_heading' => '', 'service_document_4_path' => '']);
            break;
            
          default:
          return back();

        }

        return back()->withMessage('Document has been removed.');
    }


}
