<?php

namespace Webzera\Slider\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Webzera\Slider\Models\Slider;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      // if(auth("admin"))
      //   { 
      //    dd('cons');
      // }
      // else
      // {
      //  dd('no');
      // }
        // $this->middleware('auth:admin');
        // $this->middleware('checkrole');
    }

	public function index(){
        // $allslider=Slider::orderBy('created_at', 'desc')->paginate(10);        
        $allslider = 'Vanitha';
      return view('admin::slider.index')->with('allslider', $allslider);
      // return view('admin::slider.index');
	}

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
      // dd($request->all());
        $this->validate($request, [
      'name'=> 'required',
      'link_url'=> 'required|url',
      'slider_image' => 'required',
      ]);

      $slider= new Slider;
      if ($request->slider_image) {
        $image = $request->file('slider_image');
        $slug = Str::of($request->name)->slug('-');
        $name = uniqid().'-'.$slug.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/slider');
        // $destinationPath = '/home/megha/public_html/storage/slider';
        $imagePath = $destinationPath. "/".  $name;
        if(!$image->move($destinationPath, $name))
        {
          echo "file not upload"; die();
        }
        $slider->slider_image = $name;
      }

       $slider->name=$request->input('name');
       $slider->caption=$request->input('caption');
       $slider->sub_caption=$request->input('sub_caption');
       $slider->slider_image=$name;
       $slider->link_url= $request->input('link_url');
       $slider->status=1;
       $slider->save();

       $lastid=$slider->id;
       // $result=DB::table('latestissue')
       //        ->whereNotIn('id',$lastid)
       //        ->get();
       // $result->save();
       flash('Slider Caption and image Created Sucessfully');
       return redirect('/admin/slider')->with('success', 'Slider image Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $slider = Slider::findOrFail($id);
      return view('admin.slider.edit')->with('slider', $slider);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
      'name'=> 'required',
      'link_url'=> 'required|url',
      // 'issue_image' => 'required',
      ]);

      $slider = Slider::findOrFail($id);
      if ($request->slider_image) {
        $image = $request->file('slider_image');
        $slug = Str::of($request->name)->slug('-');
        $name = uniqid().'-'.$slug.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/slider');
        // $destinationPath = '/home/megha/public_html/storage/slider';
        $imagePath = $destinationPath. "/".  $name;
        if(!$image->move($destinationPath, $name))
        {
          echo "file not upload"; die();
        }
        $slider->slider_image = $name;
      }

       $slider->name=$request->input('name');
       $slider->caption=$request->input('caption');
       $slider->sub_caption=$request->input('sub_caption');
       $slider->link_url= $request->input('link_url');
       $slider->status=1;
       $slider->save();

       $lastid=$slider->id;
       // $result=DB::table('latestissue')
       //        ->whereNotIn('id',$lastid)
       //        ->get();
       // $result->save();
       flash('Slider Caption and image Sucessfully Updated');
       return redirect('/admin/slider')->with('success', 'Slider image Created');
    }

    public function destroy($id)
    {
        Slider::destroy($id); 
        flash('Slider Caption and image Deleted');
        return redirect('/admin/slider')->with('success', 'Ads Has Been Deleted');
    }
}