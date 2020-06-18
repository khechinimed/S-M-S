<?php

namespace App\Http\Controllers\API;

use App\ClassModel;
use App\Http\Controllers\Controller;
use App\User;
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

            $classes = ClassModel::latest()->paginate(20);
            $profs = User::all();
            return ['classes'=>$classes, 'profs'=>$profs];

        }else{
            //l'utilisateur connecté actuellement
            $user = auth('api')->user();

            //SELECT CLASS WHERE USER.ID == ID(user)
            $classes = ClassModel::latest()->where('user_id', $user->id)->paginate(20);
            $profs = User::all();
            return ['classes'=>$classes, 'profs'=>$profs];
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
        $user = auth('api')->user();
        //
        $this->validate($request, [
            'className' => 'required|string|max: 191',
            'user_id' => 'sometimes',
        ]);

        return ClassModel::create([
            'className' => $request['className'],
            'user_id' => $request['user_id']
        ]);
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
        $user = ClassModel::findOrFail($id);

        $this->validate($request, [
            'className' => 'required|string|max: 191',
            'user_id' => 'sometimes',
        ]);

        $user->update($request->all());
        return ['message' => 'hadchi t updata'];
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
        $class = ClassModel::findOrFail($id);

        $class->delete();
        return ['message' => 'User Deleted'];
    }

    public function search(){
        if($search = \Request::get('q')){
            $classes = ClassModel::where(function($query) use ($search){
                $query->where('className','LIKE',"%$search%");
            })->paginate(10);
        }else{
            $classes = ClassModel::latest()->paginate(10);
        }

        return $classes;
    }
}
