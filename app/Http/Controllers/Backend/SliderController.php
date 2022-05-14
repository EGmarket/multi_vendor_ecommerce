<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function SliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }
    public function SliderStore(Request $request){
        $request->validate([
            'slider_img' => 'required',
        ]);

        $img = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::insert([
            'title'=> $request->title,
            'description'=> $request->description,
            'slider_img'=> $save_url,
        ]);
        $notification = array(
            'message' => 'Brand Insert Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /*slider edit function*/
    public function EditSlider($id){
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    } /* end method*/

    /*Slider update function*/
    public function SliderUpdate(Request $request){
        $slider_id = $request->id;
        $old_img = $request->old_img;

        if ($request->file('slider_img')){
            unlink($old_img);
            $img = $request->file('slider_img');
            $img_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(870,370)->save('upload/slider/'.$img_name);
            $path_url = 'upload/slider/'.$img_name;

            Slider::findOrFail($slider_id)->update([
                'title'=> $request->title,
                'description'=> $request->description,
                'slider_img'=> $path_url,
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully done',
                'alert-type' => 'success'
            );
            return redirect()->route('slider-manage')->with($notification);

        }else{
            Slider::findOrFail($slider_id)->update([
                'title'=> $request->title,
                'description'=> $request->description,


            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully done',
                'alert-type' => 'success'
            );
            return redirect()->route('slider-manage')->with($notification);
        }

    }

    /* Slider active and inactive method started from here*/
    public function SliderInactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Deleted Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SliderActive($id){
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Deleted Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } /* Slider active and inactive method End here*/

    /* Slider Delete functions*/
    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img;
        unlink($img);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
