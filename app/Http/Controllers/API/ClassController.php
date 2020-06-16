<?php

namespace App\Http\Controllers\API;

use App\ClassModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use function PHPSTORM_META\type;

class ClassController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //si l'utilisateur est un admin donc il peut voir tous les classes
        if(auth('api')->user()->type == 'admin'){

            return ClassModel::latest()->paginate(20);

        }else{
            //l'utilisateur connecté actuellement
            $user = auth('api')->user();

            //SELECT CLASS WHERE USER.ID == ID(user)
            $classes = ClassModel::latest()->where('user_id', $user->id)->paginate(20);
        
            return $classes;
        }
        
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
