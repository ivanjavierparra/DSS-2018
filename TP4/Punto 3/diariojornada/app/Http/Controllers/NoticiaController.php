<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Devuelvo todas las noticias
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $noticias = Noticia::all(); 
        return response()->json(
             $noticias
        );
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
     * Guardo una noticia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();

        try{
            $noticia = new Noticia;
            $noticia->titulo = $data['titulo'];
            $noticia->subtitulo = $data['subtitulo'];
            $noticia->fecha_creacion = $data['fecha_creacion'];
            $noticia->seccion = $data['seccion'];
            $noticia->visitas = $data['visitas'];
            $noticia->noticias_relacionadas = $data['noticias_relacionadas'];
            $noticia->tags = $data['tags'];
            $noticia->cantidad_comentarios = $data['cantidad_comentarios'];
            $noticia->cantidad_megusta = $data['cantidad_megusta'];
            $noticia->primer_parrafo = $data['primer_parrafo'];
            $noticia->texto = $data['texto'];
            $noticia->save();
        }catch(Exception $e){
            print( $e->getMessage());
        }
                

        return response()->json(
            $noticia
         );
    }

   
    /**
     * Muestra datos de una noticia.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(
            Noticia::find($id)
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Actualiza datos de una noticia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $noticia = Noticia::find($id);

        if (!empty($noticia)) {
            $noticia->titulo = $data['titulo'];
            #$noticia->subtitulo = $data['subtitulo'];
            #$noticia->fecha_creacion = $data['fecha_creacion'];
            $noticia->seccion = $data['seccion'];
            #$noticia->visitas = $data['visitas'];
            #$noticia->noticias_relacionadas = $data['noticias_relacionadas'];
            #$noticia->tags = $data['tags'];
            #$noticia->cantidad_comentarios = $data['cantidad_comentarios'];
            #$noticia->cantidad_megusta = $data['cantidad_megusta'];
            #$noticia->primer_parrafo = $data['primer_parrafo'];
            #$noticia->texto = $data['texto'];
            $noticia->update();
        }
        return response()->json(
            $noticia
        );
    }

    /**
     * Elimina una noticia.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        $resultado = $noticia;
        if(!empty($noticia)){
            $noticia->delete();
        }

        return response()->json(
            $resultado
        );
    }

    /**
     * Devuelve todas las noticias de una Seccion.
     */
    public function getNoticiasSeccion($seccion)
    {
        $noticias = Noticia::all()->where("seccion",$seccion); 
        
        return response()->json(
            $noticias
        );
    }


    /**
     * Devuelve las 10 noticias mas vistas de una seccion.
     */
    public function getNoticiasSeccionVisitas($seccion)
    {
        $noticias = Noticia::where("seccion", $seccion)
                    ->orderBy('visitas', 'desc')
                    ->take(10)
                    ->get();
       
        return response()->json(
            $noticias
        );
    }


    /**
     * Devuelve las 10 noticias mas vistas del diario.
     */
    public function getNoticiasTopTen()
    {
        $noticias = Noticia::orderBy('visitas', 'desc')
                    ->take(10)
                    ->get();

       
        return response()->json(
            $noticias
        );
    }

    
    /**
     * Devuelve una noticia a partir de su titulo.
     */
    public function getNoticiasByTitulo($titulo)
    {
        $noticias = Noticia::where("titulo", $titulo)->first();
        return response()->json(
            $noticias
        );
    }


    /**
     * Devuelve los tags de una noticia.
     */
    public function getNoticiasTags($id)
    {
        $noticia = Noticia::find($id);
        $tags = "";

        if (!empty($noticia)) {
            $tags = $noticia->tags;
        }

        return response()->json(
            $tags
        );
            
    }


    /**
     * Devuelve las noticias relacionadas a una noticia especifica.
     */
    public function getNoticiasRelacionadas($id)
    {
        $noticia = Noticia::find($id);
        $noticias_relacionadas = "";

        if (!empty($noticia)) {
            $noticias_relacionadas = $noticia->noticias_relacionadas;
        }

        return response()->json(
            $noticias_relacionadas
        );
    }


    /**
     * Devuelve todo el contenido de una noticia.
     */
    public function getNoticiasContenido($id)
    {
        $noticia = Noticia::find($id);
        $texto = "";

        if (!empty($noticia)) {
            $texto = $noticia->texto;
        }

        return response()->json(
            $texto
        );
    }



}
