<?php

namespace App\Http\Controllers;
use App\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = Instructor::orderBy('name','asc')->paginate(10);
        return view('admin.instructor.index',compact('instructors'));
        //return response()->json($instructors);
    }

    public function create()
    {
        return view('admin.instructor.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255|unique:instructors',
            'jobtitle'=>'required|string|max:85',
            'company'=>'required|string|max:85',
            'bio'=>'required|string|',
            'url_profile'=>'required|mimes:jpg,png,jpeg|max:150'
        ]);

        //return response()->json($request);

        $slug=\Str::slug($request->name);
        if($request->hasFile('url_profile')){
            $url_profile = $request -> file('url_profile');
            $nombrefinal = $this->str_unico(8).'.'.$url_profile->getClientOriginalExtension();
            $destino = public_path('uploads');
            $request->url_profile->move($destino, $nombrefinal);
        }
        $instructor=new Instructor();
        $instructor->name=$request->name;
        $instructor->url_profile=$nombrefinal;
        $instructor->jobtitle=$request->jobtitle;
        $instructor->company=$request->company;
        $instructor->bio=$request->bio;
        
        $instructor->save();
        return redirect('panel/instructor')->with('Mensaje','Docente agregado correctamente');
    }

    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('admin.instructor.edit',compact('instructor'));
    }
    public function update(Request $request, $id)
    {
         //Validación
         $this->validate($request,[
            'name'=>'required|string|max:255',
            'jobtitle'=>'required|string|max:85',
            'company'=>'required|string|max:85',
            'bio'=>'required|string|'   
        ]);
        $instructor = Instructor::find($id);
        if($request->hasFile('url_profile')){
            //Validando el archivo
            $this->validate($request,[
            'url_profile'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior

            if(file_exists(public_path().'/uploads/'.$instructor->url_profile)){
                unlink(public_path().'/uploads/'.$instructor->url_profile);   
            }           
            //Recuperando extensión de la nueva imagen
            $url_profile = $request->file('url_profile');
            $nombrefinal = $this->str_unico(8).'.'.$url_profile->getClientOriginalExtension();
            //Definiendo ruta de subida            
            $destino = public_path('uploads');
            $request->url_profile->move($destino, $nombrefinal);
            //Asignando el nuevo nombre a guardar
            $instructor->url_profile=$nombrefinal;
        }
        $instructor->name=$request->name;
        $instructor->jobtitle=$request->jobtitle;
        $instructor->company=$request->company;
        $instructor->bio=$request->bio;
        //return response()->json($instructor); 
        $instructor->save();
        return redirect('panel/instructor')->with('Mensaje','Docente actualizado correctamente');
    }
    public function destroy($id)
    {
        $instructor = Instructor::find($id);
        //Eliminando el archivo
        if(file_exists(public_path().'/uploads/'.$instructor->url_profile)){
            unlink(public_path().'/uploads/'.$instructor->url_profile);   
        }
        $instructor->delete();
        return redirect('panel/instructor')->with('Mensaje','Docente eliminado correctamente');
    }

    //Extras
    private function str_unico($l){
        $keychars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $length = $l;
        $randkey = "";
        $max=strlen($keychars)-1;
        for ($i=0;$i<$length;$i++) {
        $randkey .= substr($keychars, rand(0, $max), 1);
        }
        return time().$randkey;
    }


}
