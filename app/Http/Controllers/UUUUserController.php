<?php

namespace App\Http\Controllers;

use App\Models\PrImage;
use App\Models\Property;
use App\Models\PropertyRooms;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class UUUUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.index');
        //
    }
    // public function disp()
    // {
    //     return view('pages.about');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $property=new Property();
        $property->property_description=$request->property_description;
        $property->property_name=$request->property_name;
        $property->property_location=$request->property_location;
        $property->save();
        if($request->property_image){
            $images=new PrImage();
            $name = $request->property_image->getClientOriginalName();
            $request->property_image->storeAs('public/attachments', $name);
            $images->property_id=$property->id;
            $images->property_room_id=null;
            $images->property_image=$name;
            $images->save();
        }
        return redirect()->back();
    }
    public function getproperty(){
        $propertylist=Property::first();
        return response()->json($propertylist);
    }
    public function addPropertyRoom(Request $request){
        $rooms=new PropertyRooms();
        $rooms->room_type_id=$request->room_type_id;
        $rooms->room_name=$request->room_name;
        $rooms->room_description=$request->room_description;
        $rooms->save();
        if($request->room_image !=''){
            for ($i=0; $i <count($request->room_image) ; $i++) { 
                # code...
            $images=new PrImage();
            $name = $request->room_image->getClientOriginalName();
            $request->room_image->storeAs('public/attachments', $name);
            $images->property_id=$request->property_id;
            $images->property_room_id=$rooms->id;
            $images->property_image=$name;
            $images->save();
            }
            
        }
        return redirect()->back();
    }
    public function addRoomTypes(Request $request){
        $roomtype=new PropertyType();
        $roomtype->type_name=$request->type_name;
        $roomtype->save();
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
