<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        //
        //si l'utilisateur est un admin donc il peut voir tous les classes
        if(auth('api')->user()->type == 'admin'){

            $students = Student::latest()->paginate(20);
            return $students;

        }else{
            //l'utilisateur connecté actuellement
            $user = auth('api')->user();

            //SELECT CLASS WHERE USER.ID == ID(user)
            $students = Student::latest()->where('user_id', $user->id)->paginate(20);
            return $students;
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
        $user = auth('api')->user();
        //
        $this->validate($request, [
            'first_name' => 'required|string|max: 20',
            'last_name' => 'required|string|max: 20',
            'age' => 'required|Integer',
        ]);

        return Student::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'age' => $request['age'],
            'user_id' => $user->id
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
    }

    public function search(){
        if($search = \Request::get('q')){
            $students = Student::where(function($query) use ($search){
                $query->where('first_name','LIKE',"%$search%")
                      ->orWhere('last_name', 'LIKE', "%$search%");
            })->paginate(10);
        }else{
            $students = Student::latest()->paginate(10);
        }

        return $students;
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
        $student = Student::findOrFail($id);

        $student->delete();
    }
}
