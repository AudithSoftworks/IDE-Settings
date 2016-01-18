<?php namespace App\Http\Controllers;

use App\Exceptions\Auth\Users\LoginRequiredException;
use App\Exceptions\Auth\Users\PasswordRequiredException;
use App\Models\User;
use App\Services\Registrar;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response
     */
    public function create()
    {
        return response()->json(['message' => 'Ready']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Registrar::class;


            if (!$request->has('email')) {
                throw new LoginRequiredException;
            } elseif (!$request->has('password')) {
                throw new PasswordRequiredException;
            }

            $user = new User();
            $user->email = $request->input("email");
            $user->password = $request->input("password");
            if ($user->save()) {
                return response()->json(['message' => 'Success'])->setStatusCode(201); // HTTP/1.1 201 Created
            }

            return response()->setStatusCode(500);
        } catch (\Exception $e) {
            return response()->json(['message' => get_class($e)])->setStatusCode(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return \Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Response
     */
    public function destroy($id)
    {
        //
    }

}
