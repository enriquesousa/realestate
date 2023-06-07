<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\PropertyType;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;


class PropertyController extends Controller
{
    // All Property / Despliega todas las Propiedades
    public function AllProperty(){

        // Recuperar todos los datos de la tabla properties
        $property = Property::latest()->get();
        return view('backend.property.all_property', compact('property'));
    }

    // Añadir Una Propiedad
    public function AddProperty(){

        $propertytype = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

        return view('backend.property.add_property',compact('propertytype','amenities','activeAgent'));
    }

    // Store Property, Almacenar una Propiedad a la DB
    public function StoreProperty(Request $request){

        $amen = $request->amenities_id;
        // dd($amen);
        $comodidades_str = implode(",", $amen);
        // dd($comodidades);

        // Generar un código unique de 5 dígitos con un prefix property code (PC)
        $pcode = IdGenerator::generate([
                        'table' => 'properties',
                        'field' => 'property_code',
                        'length' => 5,
                        'prefix' => 'PC'
                    ]);

        $image = $request->file('property_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // crear un unique id para la imagen
        Image::make($image)->resize(370,250)->save('upload/property/thambnail/'.$name_gen);
        $save_url = 'upload/property/thambnail/'.$name_gen;

        // Insertar datos a tabla 'properties'
        $property_id = Property::insertGetId([

            'ptype_id' => $request->ptype_id,
            'amenities_id' => $comodidades_str,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_code' => $pcode,
            'property_status' => $request->property_status,

            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,

            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,

            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'agent_id' => $request->agent_id,
            'status' => 1,
            'property_thambnail' => $save_url,
            'created_at' => Carbon::now(),

        ]);


        // Insertar datos a tabla 'multi_images', Multiple Image Upload From Here
        $images = $request->file('multi_img');
        foreach ($images as $img) {

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(770, 520)->save('upload/property/multi-image/' . $make_name);
            $uploadPath = 'upload/property/multi-image/' . $make_name;

            MultiImage::insert([
                'property_id' => $property_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);

        }

        // Insertar datos a tabla 'facilities', Instalaciones cercanas - Facilities Add From Here
        $facilities = Count($request->facility_name);
        if ($facilities != NULL) {
           for ($i=0; $i < $facilities; $i++) {
               $fcount = new Facility();
               $fcount->property_id = $property_id;
               $fcount->facility_name = $request->facility_name[$i];
               $fcount->distance = $request->distance[$i];
               $fcount->save();
           }
        }

        $notification = array(
            'message' => 'La Propiedad fue añadida con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.property')->with($notification);

    } // End Método StoreProperty


    // Editar Datos de la Propiedad
    public function EditProperty($id){

        // Cargar solo los datos de la tabla 'facilities' donde el 'property_id' es igual al $id de la Propiedad
        $facilities = Facility::where('property_id',$id)->get();

        // Cargar todos los datos de la tabla 'properties' donde el id es igual al $id pasado por la función
        $property = Property::findOrFail($id);

        $type = $property->amenities_id;
        $property_ami = explode(',', $type);

        // Cargar las imágenes de la tabla 'multi_images' que correspondan con el $id de la propiedad editada
        $multiImage = MultiImage::where('property_id',$id)->get();

        $propertytype = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

        return view('backend.property.edit_property',compact('property','propertytype','amenities','activeAgent', 'property_ami', 'multiImage', 'facilities'));

    }

    // Update Property
    public function UpdateProperty(Request $request){

        $amen = $request->amenities_id;
        $comodidades_str = implode(",", $amen);

        $property_id = $request->id;

        Property::findOrFail($property_id)->update([

            'ptype_id' => $request->ptype_id,
            'amenities_id' => $comodidades_str,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_status' => $request->property_status,

            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,

            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,

            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'agent_id' => $request->agent_id,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'La propiedad se actualizo con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.property')->with($notification);

    }

    // Update Property Thumbnail
    public function UpdatePropertyThumbnail(Request $request){

        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('property_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // crear un unique id para la imagen
        Image::make($image)->resize(370,250)->save('upload/property/thambnail/'.$name_gen);
        $save_url = 'upload/property/thambnail/'.$name_gen;

        // Remover la imagen anterior
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        Property::findOrFail($pro_id)->update([

            'property_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'La imagen miniatura fue actualizada con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Update Property Multi Image
    public function UpdatePropertyMultiImage(Request $request){

        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            // get img que vamos a unlink (reemplazar)
            $imgDel = MultiImage::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(770, 520)->save('upload/property/multi-image/' . $make_name);
            $uploadPath = 'upload/property/multi-image/' . $make_name;

            MultiImage::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        } //End foreach

        $notification = array(
            'message' => 'La multi-imagen fue actualizada con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Eliminar una imagen de las de Multi Image de una propiedad
    public function DeleteMultiImageProperty($id){
        $oldImg = MultiImage::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'La multi-imagen fue eliminada con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Store New Multi Image
    public function StoreNewMultiImage(Request $request){

        $new_multi = $request->imageId;
        $image = $request->file('multi_img');


        if (!empty($image)) {

            $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 520)->save('upload/property/multi-image/' . $make_name);
            $uploadPath = 'upload/property/multi-image/' . $make_name;

            MultiImage::insert([
                'property_id' => $new_multi,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Multi-Imagen fue añadida con éxito!',
                'alert-type' => 'success'
            );

        } else {

            $notification = array(
                'message' => 'No hay Imagen para Añadir!',
                'alert-type' => 'warning'
            );
        }

        return redirect()->back()->with($notification);
    }

    // Update Property Facilities
    public function UpdatePropertyFacilities(Request $request){

        $pid = $request->id;

        if ($request->facility_name == NULL) {
            return redirect()->back();
        }else{
            // Borrar registro
            Facility::where('property_id', $pid)->delete();

            // Si queda algún registro Insertar datos a tabla 'facilities'
            $facilities = Count($request->facility_name);
            for ($i=0; $i < $facilities; $i++) {
                $fcount = new Facility();
                $fcount->property_id = $pid;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->distance = $request->distance[$i];
                $fcount->save();
            }
        }

        $notification = array(
            'message' => 'Instalaciones cercanas actualizadas con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
