<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;


class StyleController extends Controller
{
	private $styleObject;

	public function __construct()
	{
		$this->styleObject = new Style;
	}

	public function index()
	{
		$styles = $this->styleObject->getAllStyle();
		return view('styles/index', ['styles' => $styles]);
	}

	// public function showSingleStyle($id)
	// {
	// 	$style = $this->styleObject->findStyle($id)
	// }

	public function showStyleForm()
	{
		return view('styles/create');
	}

	public function create(Request $request)
	{
		
		$this->validate($request, [
			'style_name' => 'required|min:5|max:35',
			'description' => 'required|min:5|max:255'
		]);

		$data = [
			'style_name' => $request->style_name,
			'description' => $request->description
		];

		if ($this->styleObject->createNewStyle($data)) {
			flash('Style successfully created!');
			return redirect('/styles');
		}

		flash('Something went wrong! Please try again')->error();
		return back()->withInput($request->all());
	}

	public function showUpdateForm($id)
	{
		$style = $this->styleObject->findStyle($id);
		return view('styles/update', ['style' => $style]);
	}

	public function updateStyle($id, Request $request)
	{
		$this->validate($request, [
			'style_name' => 'required|min:5|max:35',
			'description' => 'required|min:5|max:255'
		]);

		$data = [
			'style_name' => $request->style_name,
			'description' => $request->description
		];

		if ($this->styleObject->updateStyle($id, $data)) {
			flash('Style successfully updated!');
			return redirect('/styles');
		}
		flash('Something went wrong! Please try again')->error();
		return back()->withInput($request->all());
	}

	public function destroyStyle($id)
	{
		if ($this->styleObject->deleteStyle($id)) {
			flash('Style successfully deleted!');
			return redirect('/styles');
		}
		flash('Something went wrong!')->error();
		return redirect('/styles');
	}
}
