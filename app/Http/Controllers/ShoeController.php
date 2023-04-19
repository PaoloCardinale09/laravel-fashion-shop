<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shoes = Shoe::all();
        return view('admin.shoes.index', compact('shoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->validation($request->all());

        if (Arr::exists($data, 'image')) {
            $img_path = Storage::put('uploads/shoes', $data['image']);
            $data['image'] = $img_path;
        } else {
            $data['image'] = 'images/no-image.webp';
        }

        $shoe = new Shoe;
        $shoe->fill($data);
        $shoe->save();
        return to_route('backoffice');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function show(Shoe $shoe)
    {
        return view('guest.shoes.show', compact('shoe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoe $shoe)
    {
        return view('admin.shoes.edit', compact('shoe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoe $shoe)
    {


        $data = $this->validation($request->all());
        if (Arr::exists($data, 'image')) {
            $img_path = Storage::put('uploads/shoes', $data['image']);
            $data['image'] = $img_path;
        } else {
            $data['image'] = 'images/no-image.webp';
        }
        $shoe->update($data);

        return redirect()->route('shoes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoe $shoe)
    {
        $shoe->delete();
        return redirect()->route('shoes.index');
    }


    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'manufacturer' => 'required|max:40',
                'model' => 'required|max:40',
                'material' => 'max:100',
                'description' => 'max:1000',
                'price' => 'required|decimal:2',
                'size' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg'
            ],

            [
                'manufacturer.required' => 'Il produttore è obbligatorio ',
                'manufacturer.max' => 'Il produttore deve avere massimo 40 caratteri ',

                'model.required' => 'Il modello è obbligatorio',
                'model.max' => 'Il modello deve avere massimo 40 caratteri',

                'material.max' => 'Il materiale è obbligatorio',

                'description.max' => 'La descrizione deve avere massimo 1000 caratteri',

                'price.required' => 'Il prezzo è obbligatorio',
                'price.decimal' => 'Il prezzo deve avere un massimo di due cifre dopo la virgola',

                'size.required' => 'La taglia è obbligatoria',



                'image.image' => 'Deve essere un\'immagine',
                'image.mimes' => 'L\'immagine deve essere in formato JPG, PNG, JPEG, GIF o SVG.'


            ]
        )->validate();
        return $validator;
    }

    public function trash()
    {
        $shoes = Shoe::onlyTrashed()->get();

        return view('admin.shoes.trash', compact('shoes'));
    }
}