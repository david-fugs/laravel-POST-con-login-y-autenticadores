<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct(){ //aca le ponemos restriccion a los metodos que ponemos dentro del only o el except es excluyendo y nos devuelve a la vista de login
        $this->middleware('auth',['except'=>['index','show']]);

    }
    public function index()
    {
        //esta es la manera local
//          $posts= [
//      ['title'=>'First post'],
//      ['title'=>'Second post'],
//      ['title'=>'Third post'],
//      ['title'=>'Fourth post'],
//  ];
//conexion a base de datos:
        // $posts = DB::table('posts')->get();
// ahora la conexion a base de datos desde un modelo, con el modelo no es necesario ponerle el nombre de la tabla si no nombre del modelo, IMPORATANTE
//que el nombre de la tabla sea plural y el modelo sea el mismo nombre sin plural y con la primera en mayuscula ejemplo modelo:Post y la tabla posts
        $posts = Post::get();
        return view('posts.index', ['posts' => $posts]);

    }
    public function show(Post $post)
    { //se recibe el post como la ruta que agara el get cuando se le da al link,
        return view('posts.show', ['post' => $post]); //retorna la vista y manda como parametro el post
    }
    public function welcome(){
        return view('posts.welcome');
    }
        public function create()
    {
        return view('posts.create',['post'=>new Post]);
    }
    public function store(SavePostRequest $request)
    {
        //ya no hay necesidad de validar con la forma de abajo por que ya creamos el ssavepostrequest 
        //$validated= $request->validate([ //esto es para validar el form
        //     'title' => ['required'],
        //     'body' => ['required'],
        // ]);
        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();
        //con elocuent en vez de hacer todo de crear new post y eso, creamos un array con los datos que se van a almacenar en la base de datos
        Post::create($request->validated());

        // session()->flash('status', 'Post Creado!'); Con el with se quita la necesidad de poner el session flash
        return to_route('posts.index')->with('status','Post Creado!');
    }
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }
    public function update(SavePostRequest $request, Post $post)
    {
        // $validated= $request->validate([ //esto es para validar el form
        //     'title' => ['required','min:4'],
        //     'body' => ['required'],
        // ]);

        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();
        
        $post ->update($request->validated());


        // session()->flash('status', 'Post Actualizado!');
        return to_route('posts.show',$post)->with('status', 'Post Actualizado!');;

    }
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')->with('status', 'Posst deleted');
    }

}