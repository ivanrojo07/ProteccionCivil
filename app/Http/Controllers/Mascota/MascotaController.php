<?php

namespace App\Http\Controllers\Mascota;

use App\DatoGeneral;
use App\Http\Controllers\Controller;
use App\Mascota;
use App\User;
use Alert;
use PDF;
use SnappyPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Mascota Controller
    |--------------------------------------------------------------------------
    |
    | Controlador que muestra formularios para agregar o modificar el registro
    | de una mascota.
    |
    */

    /**
     * @var array $rules serie de reglas de validación para el
     * formulario para agregar un familiar.
     * @var array $message serie de mensajes personalizados para las validaciones
     * de formulario.
     */

    public $rules,$messages;

    /**
     * Agregando valores a las variables y asignando rules y message de validación 
     * de formulario.
     *
     * @return void
     */

    public function __construct()
    {
        $this->rules = [
            'nombre_mascota'=>'required|string|max:25',
            'edad'=>'numeric|nullable',
            'raza'=>'string|nullable|max:25',
            'numero_registro'=>'string|nullable|max:25',
            'aviso_emergencia'=>'string|nullable|max:25',
            'telefono_emergencia'=>'string|nullable|max:25',
            'imagen'=> 'string|nullable',
            'sexo_mascota'=>'string|nullable|in:Macho,Hembra'
        ];
        $this->messages = [
            'required'=>'El campo :attribute es requerido.',
            'string'=>'El campo :attribute debe ser texto',
            'max'=>'El campo :attribute debe ser maximo de :max caracteres',
            'numeric'=>'El campo :attribute debe ser númerico',
            'in'=> 'El campo :attribute debe tener alguno de estos valores: :values',
        ];
    }

    /**
     * Listar todas las mascotas del usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Obtener el usuario logeado.
        $user = Auth::user();
        // obteniendo las mascotas del usuario
        $mascotas = $user->mascotas;
        // si no hay registro de mascotas
        if($mascotas->isEmpty()){
            // enviar directamente el formulario para crear una nueva mascota.
            return redirect()->route('mascotas.create');
        }
        else{
            // De lo contrario muestra la vista con las mascotas del usuario
            return view('mascotas.index',['mascotas'=>$mascotas]);
        }
    }



    /**
     * Muestra el formulario para crear una nueva mascota.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Regresamos la vista del formulario con la bandera create para guardar una nueva mascota.
        return view('mascotas.form',['create'=>true]);
    }

    /**
     * Crear una nueva mascota.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //obtener el usuario logeado.
        $user = Auth::user();
        // Validamos el formulario
        $request->validate($this->rules,$this->messages);
        // Una vez validado, creamos un modelo Mascota con los datos obtenidos.
        $mascota = new Mascota([
            'nombre_mascota'=>$request->nombre_mascota,
            'edad'=>$request->edad,
            'raza'=>$request->raza,
            'numero_registro'=>$request->numero_registro,
            'aviso_emergencia'=>$request->aviso_emergencia,
            'telefono_emergencia'=>$request->telefono_emergencia,
            'foto_mascota'=>$request->imagen,
            'sexo_mascota'=>$request->sexo_mascota
        ]);
        // Guardar la mascota en la relación de usuario.
        $user->mascotas()->save($mascota);
        // Crear una alerta al usuario confirmando la acción realizada.
        Alert::success('Mascota Agregada','Tu mascota ha sido registrada y ahora estan conectados con Protección Civil');
        // Redirigimos a la ruta index de mascotas.
        return redirect()->route('mascotas.index');
    }

    /**
     * Muestra el formulario para editar los datos de la mascota.
     *
     * @param  App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        // Obtener el usuario logeado.
        $user = Auth::user();
        // verificamos si la mascota tiene relación con el usuario logeado.
        if($user->id == $mascota->user_id){
            // mostramos la vista del formulario.
            return view('mascotas.form',['create'=>false,'mascota'=>$mascota]);
        }
        else{
            // Si la mascota no tiene relación con el usuario logeado
            // redirigimos a la pagina de mascotas index
            return redirect()->route('mascotas.index');
        }
    }

    /**
     * Actualizar los datos de la mascota.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Mascota $mascota)
    {
        // Obtener el usuario logeado
        $user = Auth::user();
        // Verificar que la mascota a editar tenga relación con el usuario logeado.
        if($user->id == $mascota->user_id){
            // Validar el formulario.
            $request->validate($this->rules,$this->messages);
            // actualizamos la mascota con los datos del formulario
            $mascota->update([
                'nombre_mascota'=>$request->nombre_mascota,
                'edad'=>$request->edad,
                'raza'=>$request->raza,
                'numero_registro'=>$request->numero_registro,
                'aviso_emergencia'=>$request->aviso_emergencia,
                'telefono_emergencia'=>$request->telefono_emergencia,
                'foto_mascota'=>$request->imagen,
                'sexo_mascota'=>$request->sexo_mascota
            ]);
        }
        // Crea una alerta para notificar al usuario que la acción se realizo correctamente.
        Alert::success('Mascota Actualizada','Tu registro ha sido actualizado y ahora estan conectados con Protección Civil');
        // Redirigimos a la lista de las mascotas
        return redirect()->route('mascotas.index');
    }

    /**
     * Eliminar la mascota.
     *
     * @param  App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        // Obtener el usuario logeado
        $user = Auth::user();
        // Verificar que la mascota tenga una relación con el usuario logeado 
        if($mascota->user_id == $user->id){
            // Si existe la relación damos paso a eliminar el registro.
            $mascota->delete();
            // lanzamos una alerta al usuario para confirmarle que la acción se realizo.
            Alert::success('Mascota eliminado','El registro se elimino correctamente');
            // Y redirigimos al index de las mascotas.
            return redirect()->route('mascotas.index');
        }
        else{
            // De lo contrario, si no existe una relación con el usuario 
            // lanzamos una alerta al usuario comentando que no puede realizar esta acción
            Alert::error('No puedes eliminar este registro');
            // Y redirigimos al index de las mascotas.
            return redirect()->route('mascotas.index');
        }
    }

    /**
     * Muestra las tarjetas de seguridad para el usuario con los datos de las mascotas
     * usando la libreria DomPDF (No utilizado actualmente).
     *
     * @return \Illuminate\Http\Response
     */
    public function showPDF()
    {
        // Obtenemos el usuario autenticado
        $user = Auth::user();
        // Obtenemos las mascotas de este usuario.
        $mascotas = $user->mascotas;
        // Creamos el pdf con la vista predefinida e inyectamos los datos.
        $pdf = PDF::loadView('pdf.mascotas',['mascotas'=>$mascotas]);
        // Mostramos el pdf en el navegador
        return $pdf->stream('mascotas.pdf');
    }

    /**
     * Muestra las tarjetas de seguridad para el usuario con los datos de las mascotas
     * usando la libreria Snappy con el plugin wkhtmltopdf-amd64 (Utilizado actualmente).
     *
     * @return \Illuminate\Http\Response
     */
    public function showSnappyPDF(){
        // Obtenemos el usuario autenticado.
        $user = Auth::user();
        // Obtenemos las mascotas de este usuario
        $mascotas = $user->mascotas;
        // Creamos el pdf con la vista predefinida e inyectamos los datos.
        $pdf_snappy = SnappyPDF::loadView('pdf.mascotas_snappy',['mascotas'=>$mascotas]);
        // Mostramos el pdf en el navegador
        return $pdf_snappy->stream('Mascotas.pdf');

    }

    /**
     * Muestra las tarjetas de seguridad para el usuario con los datos de las mascotas
     * usando la libreria Snappy con el plugin wkhtmltopdf-amd64 (No utilizado actualmente).
     *
     * @return \Illuminate\Http\Response
     */
    public function showEmptySnappyPDF(){
        // Se crea la plantilla con vista predefinida sin datos
        $pdf_snappy = SnappyPDF::loadView('pdf.mascotas_snappy');
        // Mostramos el pdf en el navegador.
        return $pdf_snappy->inline();

    }

    /**
     * Descarga el pdf con las tarjetas de seguridad para el usuario con los datos de las mascotas
     * usando la libreria Snappy con el plugin wkhtmltopdf-amd64 (Utilizado actualmente).
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadSnappyPDF()
    {
        // Obtenemos el usuario logeado
        $user = Auth::user();
        // Obtener las mascotas de ese usuario
        $mascotas = $user->mascotas;
        // Creamos la vista predefinida con los datos de las mascotas.
        $pdf_snappy = SnappyPDF::loadView('pdf.mascotas_snappy',['mascotas'=>$mascotas]);
        // Lanzamos la descarga del documento.
        return $pdf_snappy->download('tarjeta mascotas.pdf');
    }
    
}
