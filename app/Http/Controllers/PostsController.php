<?php

namespace App\Http\Controllers;

use App\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*******************************************************************************************************************************************
        ADDED DUE TO EXCEPTION WARNING
        **********************************************************************************************************************************************/
              if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    /*****************************************************************************************************************************************************/
}
        //
        // $posts = Post::latest()->get();
     // $posts = Post::orderBy('id', 'asc')->get();
        $posts = Post::latest();
        return view('posts.index', compact('posts'));     //compact ->takes any name of var and converts to var=> addts "$" to it
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //
        return view('posts.create');  //checked from php srtisan route:list
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreatePostRequest $request)
    {
        
     //  return $request->all(); //to check the data input

     //   return $request->get('title'); //returns title only 

    //    return $request->title;    //same as above but here used as property

       /***********************************************************************************************                 
       Persisting data to DB
       ***********************************************************************************************/


       /***********************VALIDATE FUNCTION****************/
       // $this->validate($request, [

       //  'title'=> 'required|max:4'
       //  // 'content'=> 'required'        //, before next parameter

       // ]);


       /********************************************************/


      // Post::create($request->all());       // 1) first way
      // return redirect('/posts');


       // $input = $request->all();            // 2) Second way
       // $input['title'] = $request->title;
       // Post::create($request->all());        //  Ends Here <-


       // $post = new Post;                    // 3) Third Way
       // $post->title = $request->title;
       // $post->save();                       // Ends Here <-


        /***********************************************************************************************                 
       retrieving file to DB
       ***********************************************************************************************/

       // return $request->file('file');

        // $file = $request->file('file');
        // echo "<br>";

        // echo $file->getClientOriginalName();    //gets real name of the pic

        // echo "<br>";

        // echo $file->getClientSize();        //gets size of file

       /***********************************************************************************************                 
       persist or cmmit file to DB
       ***********************************************************************************************/
       $input = $request->all();

       if($file = $request->file('file')){

        $name = $file->getClientOriginalName();
        $file->move('images', $name);     //images folder will be created if not available

        $input['path'] = $name;      //path is col name


       }
       Post::create($input);

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
        $post = Post::findOrFail($id);
        return view('posts.show', compact(('post')));
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
         $post = Post::findOrFail($id);

         return view('posts.edit', compact('post'));


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
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('posts');
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


        /*******************************************************************************************************************************************
        ADDED DUE TO EXCEPTION WARNING
        **********************************************************************************************************************************************/
              if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
                error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
    /*****************************************************************************************************************************************************/

    
        // $post = Post::findOrFail($id);
        // $post->delete();


        $post = Post::whereId($id)->delete();       //summed up 2 lines in one

        return redirect('/posts');
    }


    public function contact() 
    {
    	$people = ['Karen', 'Peter', 'Tony', 'Arya', 'Jon'];

    	return view('contact', compact('people'));

    }

    public function show_post($id, $name, $password)
    {
    	// return view('post')->with('id',$id); //with = open post view and pass that data

    	return view('post', compact('id', 'name', 'password')); //compact = convert this 'id'  var into the var passed at the top  $id and pass into view 
    }
}
