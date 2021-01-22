<?php

namespace App\Http\Controllers;
use App\Course;
use App\Instructor;
use App\Price;
use App\Syllabus;
use App\Benefit;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $cursos = Course::with(['instructor'])->paginate(5);
        return view('admin.courses.index',compact('cursos'));
    }
    public function create(){
        //
        $instructors=Instructor::all();
        return view('admin.courses.create', compact('instructors'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'type'=>'required|string|max:120',
            'title'=>'required|string|max:180',
            'fecha'=>'required|string|max:40',
            'duration'=>'required|string|max:30',
            'session'=>'required|integer',
            'objectives'=>'required|string',
            'public'=>'required|string',
            'url_platform'=>'string',
            'portrait'=>'required|mimes:jpg,png,jpeg|max:150',
            'description'=>'required|mimes:jpg,png,jpeg|max:150',
            'inversion'=>'required|mimes:jpg,png,jpeg|max:150',
            'url_thumbnail'=>'required|mimes:jpg,png,jpeg|max:150',
            'url_banner'=>'required|mimes:jpg,png,jpeg|max:150',
        ]);        
        //return response()->json($request);
        $sluggish=\Str::slug($request->title);
        $slug=$sluggish.'-'.date('dmY');
    	if($request->hasFile('portrait')){            
            $portrait = $request -> file('portrait');
            $portada = $this->str_unico(8).'.'.$portrait->getClientOriginalExtension();
            $destino = public_path('uploads');
            $request->portrait->move($destino, $portada);
            $data['portrait']=$portada;
        }
        if($request->hasFile('description')){            
            $description = $request -> file('description');
            $desc = $this->str_unico(8).'.'.$description->getClientOriginalExtension();
            $destino = public_path('uploads');
            $request->description->move($destino, $desc);
            $data['description']=$desc;
        }
        if($request->hasFile('inversion')){            
            $inversion = $request -> file('inversion');
            $inversor = $this->str_unico(8).'.'.$inversion->getClientOriginalExtension();
            $destino = public_path('uploads');
            $request->inversion->move($destino, $inversor);
            $data['inversion']=$inversor;
        }
        if($request->hasFile('url_banner')){            
            $url_banner = $request -> file('url_banner');
            $banner = $this->str_unico(8).'.'.$url_banner->getClientOriginalExtension();
            $destino = public_path('uploads');
            $request->url_banner->move($destino, $banner);
            $data['url_banner']=$banner;
        }
        if($request->hasFile('url_thumbnail')){            
            $url_thumbnail = $request -> file('url_thumbnail');
            $thumbnail = $this->str_unico(8).'.'.$url_thumbnail->getClientOriginalExtension();
            $destino = public_path('uploads');
            $request->url_thumbnail->move($destino, $thumbnail);
            $data['url_thumbnail']=$thumbnail;
        }

        $course=new Course();
        $course->portrait=$portada;
        $course->description=$desc;
        $course->inversion=$inversor;
        $course->url_thumbnail=$thumbnail;
        $course->url_banner=$banner;
        $course->type = $request->type;
        $course->title=$request->title;     
        $course->slug=$slug;                
        $course->is_active=$request->is_active;        
        $course->instructor_id=$request->instructor;
        $course->fecha=$request->fecha;        
        $course->date_start=$request->date_start;
        $course->duration=$request->duration;
        $course->schedule=$request->schedule;
        $course->session=$request->session;
        $course->objectives=$request->objectives;
        $course->public=$request->public;
        $course->url_platform=$request->url_platform;
        $course->save();
    	return redirect('panel/courses')->with('Mensaje','Curso agregado correctamente');
    }

    public function edit($id){
        $instructors=Instructor::all();
        $curso = Course::with(['instructor'])->findOrFail($id);
        return view('admin.courses.edit',compact('curso', 'instructors'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
    		'type'=>'required|string|max:120',
            'title'=>'required|string|max:180',
            'fecha'=>'required|string|max:40',
            'duration'=>'required|string|max:30',
            'session'=>'required|integer',
            'objectives'=>'required|string',
            'public'=>'required|string',
            'url_platform'=>'string'
        ]);
        $curso = Course::find($id);
        if($request->hasFile('portrait')){
            //Validando el archivo
            $this->validate($request,[
            'portrait'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            if(file_exists(public_path().'/uploads/'.$curso->portrait)){
                unlink(public_path().'/uploads/'.$curso->portrait);
            }
            //Recuperando extensión de la nueva imagen
            $portrait = $request->file('portrait');
            $portada = $this->str_unico(8).'.'.$portrait->getClientOriginalExtension();
            //Definiendo ruta de subida        
            $destino = public_path('uploads');
            $request->portrait->move($destino, $portada);
            //Asignando el nuevo nombre a guardar
            $curso->portrait=$portada;
        }
        if($request->hasFile('description')){
            //Validando el archivo
            $this->validate($request,[
            'description'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            if(file_exists(public_path().'/uploads/'.$curso->description)){
                unlink(public_path().'/uploads/'.$curso->description);
            }
            //Recuperando extensión de la nueva imagen
            $description = $request->file('description');
            $desc = $this->str_unico(8).'.'.$description->getClientOriginalExtension();
            //Definiendo ruta de subida        
            $destino = public_path('uploads');
            $request->description->move($destino, $desc);
            //Asignando el nuevo nombre a guardar
            $curso->description=$desc;
        }
        if($request->hasFile('inversion')){
            //Validando el archivo
            $this->validate($request,[
            'inversion'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            if(file_exists(public_path().'/uploads/'.$curso->inversion)){
                unlink(public_path().'/uploads/'.$curso->inversion);
            }
            //Recuperando extensión de la nueva imagen
            $inversion = $request->file('inversion');
            $inve = $this->str_unico(8).'.'.$inversion->getClientOriginalExtension();
            //Definiendo ruta de subida        
            $destino = public_path('uploads');
            $request->inversion->move($destino, $inve);
            //Asignando el nuevo nombre a guardar
            $curso->inversion=$inve;
        }
        if($request->hasFile('url_thumbnail')){
            //Validando el archivo
            $this->validate($request,[
            'url_thumbnail'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            if(file_exists(public_path().'/uploads/'.$curso->url_thumbnail)){
                unlink(public_path().'/uploads/'.$curso->url_thumbnail);
            }
            //Recuperando extensión de la nueva imagen
            $url_thumbnail = $request->file('url_thumbnail');
            $thumbnail = $this->str_unico(8).'.'.$url_thumbnail->getClientOriginalExtension();
            //Definiendo ruta de subida        
            $destino = public_path('uploads');
            $request->url_thumbnail->move($destino, $thumbnail);
            //Asignando el nuevo nombre a guardar
            $curso->url_thumbnail=$thumbnail;
        }
        if($request->hasFile('url_banner')){
            //Validando el archivo
            $this->validate($request,[
            'url_banner'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            if(file_exists(public_path().'/uploads/'.$curso->url_banner)){
                unlink(public_path().'/uploads/'.$curso->url_banner);
            }
            //Recuperando extensión de la nueva imagen
            $url_banner = $request->file('url_banner');
            $banner = $this->str_unico(8).'.'.$url_banner->getClientOriginalExtension();
            //Definiendo ruta de subida        
            $destino = public_path('uploads');
            $request->url_banner->move($destino, $banner);
            //Asignando el nuevo nombre a guardar
            $curso->url_banner=$banner;
        }
        if ($request->title !=$curso->title) {
            $sluggish=\Str::slug($request->title);
            $slug=$sluggish.'-'.date('dmY');
            $curso->slug=$slug;
        }        
        $curso->type=$request->type;
        $curso->title=$request->title;             
        $curso->is_active=$request->is_active;    
        $curso->instructor_id=$request->instructor;
        $curso->fecha=$request->fecha;        
        $curso->date_start=$request->date_start;
        $curso->duration=$request->duration;
        $curso->schedule=$request->schedule;
        $curso->session=$request->session;
        $curso->objectives=$request->objectives;
        $curso->public=$request->public;
        $curso->url_platform=$request->url_platform;
        $curso->save();
        return redirect('panel/courses')->with('Mensaje','Curso actualizado correctamente');
    }

    public function destroy($id){
        $curso = Course::find($id);
        //Eliminando el archivo
        if(file_exists(public_path().'/uploads/'.$curso->portrait)){
            unlink(public_path().'/uploads/'.$curso->portrait);
        }
        if(file_exists(public_path().'/uploads/'.$curso->description)){
            unlink(public_path().'/uploads/'.$curso->description);
        }
        if(file_exists(public_path().'/uploads/'.$curso->inversion)){
            unlink(public_path().'/uploads/'.$curso->inversion);
        }
        if(file_exists(public_path().'/uploads/'.$curso->url_thumbnail)){
            unlink(public_path().'/uploads/'.$curso->url_thumbnail);
        }
        if(file_exists(public_path().'/uploads/'.$curso->url_banner)){
            unlink(public_path().'/uploads/'.$curso->url_banner);
        }
        $curso->delete();
        return redirect('panel/courses')->with('Mensaje','Curso eliminado correctamente');
    }


    public function managePrice($id){

        $curso = Course::with(['prices'])->findOrFail($id);
        return view('admin.courses.add-price',compact('curso'));
    }

    public function addPrice(Request $request){
        $this->validate($request,[
    		'amount'=>'required',
            'info'=>'required|string|max:40'
        ]);
        $id=$request->course_id;
        $precio = Price::create([    		
            'amount'=>$request->amount,
            'dscto'=>$request->dscto,
            'info'=>$request->info,
            'promo'=>$request->promo,
            'course_id'=>$id
        ]);    
    	return redirect('panel/courses/'.$id.'/addprice')->with('Mensaje','Monto agregado correctamente');
    }
    public function destroyPrice($id, $precio_id){
        $price=Price::find($precio_id);
        $price->delete();
        return redirect('panel/courses/'.$id.'/addprice')->with('Mensaje','Monto eliminado correctamente');
    }

    public function manageModule($id){
        $curso = Course::with(['syllabus'])->findOrFail($id);
        return view('admin.courses.add-module',compact('curso'));
    }

    public function addModule(Request $request){
        $this->validate($request,[
            'module'=>'required|string|max:180',
            'info'=>'required|string',
        ]);
        $id=$request->course_id;
        $syllabus = Syllabus::create([    		
            'module'=>$request->module,            
            'info'=>$request->info,
            'course_id'=>$id
        ]);
    	return redirect('panel/courses/'.$id.'/addmodule')->with('Mensaje','Tema agregado correctamente');
    }

    public function destroyModule($id, $module_id){
        $module=Syllabus::find($module_id);      
        $module->delete();
        return redirect('panel/courses/'.$id.'/addmodule')->with('Mensaje','Tema eliminado correctamente');
    }

    public function manageBenefit($id){
        $curso = Course::with(['benefits'])->findOrFail($id);
        return view('admin.courses.add-benefit',compact('curso'));
    }

    public function addBenefit(Request $request){
        $this->validate($request,[
            'benefit'=>'required|string'
        ]);
        $id=$request->course_id;
        Benefit::create([
    		'benefit'=>$request->benefit,
            'course_id'=>$id
    	]);
    	return redirect('panel/courses/'.$id.'/addbenefit')->with('Mensaje','Beneficio agregado correctamente');  
    }

    public function destroyBenefit($id, $benefit_id){
        $benefit=Benefit::find($benefit_id);
        $benefit->delete();
        return redirect('panel/courses/'.$id.'/addbenefit')->with('Mensaje','Beneficio eliminado correctamente');
    }

    //Extras
    private function str_unico($l){
        $keychars = "0123456789";
        $length = $l;
        $randkey = "";
        $max=strlen($keychars)-1;
        for ($i=0;$i<$length;$i++) {
        $randkey .= substr($keychars, rand(0, $max), 1);
        }
        return time().$randkey;
    }
}


