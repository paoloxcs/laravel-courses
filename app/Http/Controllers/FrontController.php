<?php

namespace App\Http\Controllers;
use DB;
use App\Course;
use App\Picture;
use App\Price;
use App\Benefit;
use App\Social;
use App\Instructor;
use App\Entry;
use App\Syllabus;
use App\Mail\dataSender;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index(){      
        $curso=Course::first();
    	return redirect('curso/'.$curso->slug);
    }

    public function curso($slug){
        $curso=Course::where('slug',$slug)->first();
        $precios=Price::where('course_id',$curso->id)->orderBy('amount','desc')->get();
        $beneficios=Benefit::where('course_id',$curso->id)->orderBy('id','asc')->get();
        $sylabos=Syllabus::where('course_id',$curso->id)->orderBy('id','asc')->get();
        $docente=Instructor::where('id',$curso->instructor_id)->first();
        $redes=Social::where('instructor_id',$docente->id)->get();

        if (!$curso) {
            return redirect('https://dossierdearquitectura.com/workshops');
        }
        return view('curso',compact('curso','precios','beneficios','sylabos','docente','redes'));
    }

    public function dataSender(Request $request)
    {
    	// dd($request->all());
    	$this->validate($request,[
    		'name'=>'required|string|max:80',
    		'phone'=>'required|numeric',
    		'email'=>'required|email',
    		'message'=>'required|string'		
    	],[
    		'name.required'=>'Este campo es requerido',
    		'phone.required'=>'El teléfono es requerido',
    		'email.required'=>'El correo electrónico es requerido',
    		'message.required'=>'Escriba aqui su mensaje'
    	]);

    	$data=[
    		'name'=>$request->name,
    		'phone'=>$request->phone,
    		'email'=>$request->email,
            'message'=>$request->message,
            'curso'=>$request->curso,
    		'curso_id'=>$request->curso_id
        ];

        $entry=new Entry();
        $entry->fullname=$request->name;
        $entry->phone=$request->phone;
        $entry->email=$request->email;
        $entry->message=$request->message;
        $entry->course_id=$request->curso_id;
        $entry->save();
    	Mail::to('info2@constructivo.com')->cc('info@constructivo.com')
        //Mail::to('postmaster2@constructivo.com')
    	->send(new dataSender($data));
    	// Session::flash('msg', 'Su información fue enviada con éxito.'); //para otra vista/ruta
        return back()->with('msg', 'Su información fue enviada con éxito.');
    }

}
