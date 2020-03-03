<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\img_slider;

class ImgsliderController extends Controller
{
    public function slider()
    {
        $slider = img_slider::all();     
        return view('/admin/image_slider', ['slider' => $slider]);
    }

    public function updateslidercaption(Request $request)
    {
        $data=img_slider::find($request->id);
        $data->caption=$request->get('caption');
        $data->save();
        return redirect()->back()->with('successupdatecaption', true);
    }

    public function updatesliderimage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();        
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/slider_img';
        $namefile = 'a_'.$request->id.'.'.$ext;
        $file->move($tujuan_upload,$namefile);
        
        $data=img_slider::find($request->id);
        $data->img=$namefile;
        $data->save();

        return redirect()->back()->with('successuploadimg', true);
   
    }
}
