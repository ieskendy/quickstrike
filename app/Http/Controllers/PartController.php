<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\Part;

class PartController extends Controller
{
    private $styleObject;
    private $partObject;

    public function __construct()
    {
    	$this->styleObject = new Style;
    	$this->partObject = new Part;
    }

    public function showCreatePartForm()
    {
    	$styles = $this->styleObject->pluckStyles();

        return view('parts/create', ['styles' => $styles]);
    }

    public function createPart(Request $request)
    {

        $this->validate($request, [
            'style_id' => 'required',
            'part_name' => 'required|min:5|max:35',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'style_id' => $request->style_id,
            'part_name' => $request->part_name 
        ];
        
        if ($request->hasFile('image')) {
            $destinationPath = public_path('images');
            $image = $request->file('image');
            $url = $destinationPath."/".$image->getClientOriginalName();
            $image->move($destinationPath, $image->getClientOriginalName());
            $data['url'] = $url;    
        }

        if ($this->partObject->createNewPart($data)) {
            flash('Successfully created!');
            return back();
        }
        return back()->withInput($reqeust->all());

    }
}
