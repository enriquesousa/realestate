<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\State;
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
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\PackagePlan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PropertyMessage;
use App\Models\Schedule;
use App\Mail\ScheduleMail;
use Illuminate\Support\Facades\Mail;


class AgentPropertyController extends Controller
{

    /**************************
     * Agente Propiedades: CRUD
     **************************/

    // Despliega todas las Propiedades para el Agente
    public function AgentAllProperty(){
        $id = Auth::user()->id;
        $property_count = Property::where('agent_id', $id)->count();
        $property = Property::where('agent_id', $id)->latest()->get();
        $user_agent = User::findOrFail($id);
        return view('agent.property.all_property', compact('property', 'property_count', 'user_agent'));
    }

    // Añadir Una Propiedad
    public function AgentAddProperty(){

        $propertytype = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $estado = State::latest()->get();

        $id = Auth::user()->id;
        $property_count = Property::where('agent_id', $id)->count();
        $user_agent = User::where('role','agent')->where('id',$id)->first();

        // dd($user_agent->credit, $user_agent->max_credit);

        if ($property_count >= $user_agent->max_credit ) {
            return redirect()->route('buy.package');
        }else{
            return view('agent.property.add_property',compact('propertytype','amenities', 'estado'));
        }

    }

    // Store Property, Almacenar una Propiedad a la DB
    public function AgentStoreProperty(Request $request){

        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;

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
            'agent_id' => Auth::user()->id,
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

        // Auto incrementar el campo 'credit' en la tabla de 'users'
        User::where('id',$id)->update([
            'credit' => DB::raw('1 + '. $nid),
        ]);


        $notification = array(
            'message' => 'La Propiedad fue añadida con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('agent.all.property')->with($notification);
    }

    // Editar Datos de la Propiedad
    public function AgentEditProperty($id){

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
        $estado = State::latest()->get();

        return view('agent.property.edit_property',compact('property','propertytype','amenities', 'property_ami', 'multiImage', 'facilities', 'estado'));

    }

    // Update Property
    public function AgentUpdateProperty(Request $request){

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
            'agent_id' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'La propiedad se actualizo con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('agent.all.property')->with($notification);
    }

    // Update Property Thumbnail
    public function AgentUpdatePropertyThumbnail(Request $request){

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
    public function AgentUpdatePropertyMultiImage(Request $request){

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
    public function AgentDeletePropertyMultiImage($id){
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
    public function AgentStoreNewMultiImage(Request $request){

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
    public function AgentUpdatePropertyFacilities(Request $request){

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

    // Details Property - Desplegar solo los detalles de una propiedad en una sola pagina
    public function AgentDetailsProperty($id){

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

        return view('agent.property.details_property',compact('property','propertytype','amenities', 'property_ami', 'multiImage', 'facilities'));
    }

    // Delete Property
    public function AgentDeleteProperty($id){

        // Identificar al agente de esta propiedad
        // Encontrar el registro en la tabla 'properties' y eliminarlo con todo y foto de thumbnail
        $property = Property::findOrFail($id);
        $uid = $property->agent_id;

        $user_agent = User::findOrFail($uid);
        $user_credit = $user_agent->credit;
        $update_credit = $user_credit - 1;
        // dd($user_credit, $update_credit);

        // Decrement en 1 el campo 'credit' en la tabla de 'users'
        User::where('id',$uid)->update([
            'credit' => DB::raw($update_credit),
        ]);

        // Encontrar el registro en la tabla 'properties' y eliminarlo con todo y foto de thumbnail
        $property = Property::findOrFail($id);
        unlink($property->property_thambnail);
        Property::findOrFail($id)->delete();

        // Ahora eliminar todas las multi fotos relacionadas con este registro $id
        $images = MultiImage::where('property_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImage::where('property_id',$id)->delete();
        }

        // Ahora eliminar todos los facilities de tabla 'facilities' donde 'property_id' sea igual al $id
        $comodidades = Facility::where('property_id',$id)->get();
        foreach ($comodidades as $item) {
            $item->facility_name;
            Facility::where('property_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Propiedad Eliminada con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**************************
     * Agente Buy Package
     **************************/

     public function BuyPackage(){
        return view('agent.package.buy_package');
     }

    //  Plan de Negocios - Buy Business Plan
     public function BuyBusinessPlan(){
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        return view('agent.package.business_plan',compact('data'));
     }

    //  Store Business Plan
     public function StoreBusinessPlan(Request $request){

        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;

        PackagePlan::insert([
            'user_id' => $id,
            'package_name' => 'Business',
            'package_credits' => '3',
            'invoice' => 'ERS'.mt_rand(10000000,99999999),
            'package_amount' => '20.00',
            'created_at' => Carbon::now(),
        ]);

        // Auto incrementar el campo 'credit' en la tabla de 'users'
        User::where('id',$id)->update([
            'max_credit' => DB::raw('3 + '. $nid),
        ]);

        $notification = array(
            'message' => 'Haz comprado el paquete Negocio con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('agent.all.property')->with($notification);
     }

    //  Comprar Paquete Profesional - Buy Professional Plan
     public function BuyProfessionalPlan(){
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        return view('agent.package.professional_plan',compact('data'));
     }

     //  Store professional Plan
     public function StoreProfessionalPlan(Request $request){

        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;

        PackagePlan::insert([
            'user_id' => $id,
            'package_name' => 'Professional',
            'package_credits' => '10',
            'invoice' => 'ERS'.mt_rand(10000000,99999999),
            'package_amount' => '50.00',
            'created_at' => Carbon::now(),
        ]);

        // Auto incrementar el campo 'credit' en la tabla de 'users'
        User::where('id',$id)->update([
            'credit' => DB::raw('10 + '. $nid),
        ]);

        $notification = array(
            'message' => 'Haz comprado el paquete Profesional con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('agent.all.property')->with($notification);
     }

    //  Package History - Historial de Pagos
     public function PackageHistory(){
        $id = Auth::user()->id;
        $packageHistory = PackagePlan::where('user_id',$id)->get();
        return view('agent.package.package_history', compact('packageHistory'));
     }

    //  Agent Package Invoice - Descargar Recibo en PDF
     public function AgentPackageInvoice($id){
        $packageHistory = PackagePlan::where('id', $id)->first();

        // Convertir la Vista a PDF con el paquete pdf que ya instalamos
        $pdf = Pdf::loadView('agent.package.package_history_invoice', compact('packageHistory'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path()
        ]);
        return $pdf->download('recibo.pdf');
     }

     /**************************
     * Agente Ver Mensajes
     **************************/

     // AgentPropertyMessage
     public function AgentPropertyMessage(){

        $id = Auth::user()->id;
        $userMessage = PropertyMessage::where('agent_id', $id)->get();

        return view('agent.message.all_message', compact('userMessage'));

     }

     // AgentMessageDetails - Ver los detalles del mensaje
     public function AgentMessageDetails($id){

        $uid = Auth::user()->id;
        $userMessage = PropertyMessage::where('agent_id', $uid)->get();
        $msgDetails = PropertyMessage::findOrFail($id);
        // dd($userMessage,$msgDetails);

        return view('agent.message.message_details', compact('userMessage','msgDetails'));

     }

     // AgentScheduleRequest
     public function AgentScheduleRequest(){

        $id = Auth::user()->id;
        $user_message = Schedule::where('agent_id',$id)->get();

        return view('agent.message.schedule_request', compact('user_message'));
     }

     // AgentDetailsSchedule
     public function AgentDetailsSchedule($id){

        $schedule = Schedule::findOrFail($id);
        return view('agent.message.schedule_details', compact('schedule'));

     }

     // AgentUpdateSchedule
     public function AgentUpdateSchedule(Request $request){

        $schedule_id = $request->id;

        Schedule::findOrFail($schedule_id)->update([
            'status' => '1',
        ]);

        // Enviar correo electrónico, send mail
        $sendMail = Schedule::findOrFail($schedule_id);
        $data = [
            'tour_date' => $sendMail->tour_date,
            'tour_time' => $sendMail->tour_time,
            'nombre' => $sendMail->user->name,
        ];
        Mail::to($request->email)->send(new ScheduleMail($data));
        // End Enviar correo

        /* Enviar Mensaje de WhatsUp */

        $url = "`https://graph.facebook.com/v17.0/102952322873460/messages `
        -H 'Authorization: Bearer EAAELeKuZAlaQBANO2Sz2p08So1OADTpPIezdDPENYIlVt6QFE6G57NAJicKbniZAq4f9NEeUyq6FLtLIzz9hfLtBHgkMxhynkmIoptwVrgHOgsbLHv7gXvwaKZAVmUTXolnubWRpz6XDczWaiqLkVWn6mrnc1da1wwe2sVCCfwzuur1JnuZAT9v9MdtBZCWDvuSGkMuzaCQZDZD' `
        -H 'Content-Type: application/json' `
        -d '{ \"messaging_product\": \"whatsapp\", \"to\": \"526641880604\", \"type\": \"template\", \"template\": { \"name\": \"hello_world\", \"language\": { \"code\": \"en_US\" } } }'";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        /* End - Enviar Mensaje de WhatsUp */

        $notification = array(
            'message' => 'Cita confirmada con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('agent.schedule.request')->with($notification);

     }

     // AgentDeleteSchedule
     public function AgentDeleteSchedule($id){

        Schedule::findOrFail($id)->delete(); // eliminar el registro de la tabla

        $notification = array(
            'message' => 'Cita eliminada con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }

}
