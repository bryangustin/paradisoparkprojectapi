<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMessage;
use App\Mail\Contact;


class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::with(['orders'])->get());
    }

    public function login(Request $request)
    {
        $status = 401;
        $response = ['error' => 'Wrong password or user name please try again.'];

        if (Auth::attempt($request->only(['email', 'password']))) {
            $status = 200;
            $response = [
                'user' => Auth::user(),
                'check' => Auth::check(),
                'token' => Auth::user()->createToken('bigStore')->accessToken,
            ];
        }

        return response()->json($response, $status);
    }

    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols(),
            ],

        ]);

        if ($validator->fails()) {
            return response()->json( $validator->errors(), 401);
        }

        $data = $request->only(['name','email', 'password']);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->is_admin = 0;

        $token = $user->createToken('bigStore')->accessToken;
        
        $message = array('name' => $request->name, 'email' => $request->email);

        Mail::to($request->email)->send(new RegisterMessage($message));


        return response()->json(['token'=>$token],200);

    }

    public function contact(Request $request)
    {
        $data = $request->only(['name','email', 'phone', 'message']);
        Mail::to('info@paradisopark.com')->send(new Contact($data));
        
        $data2 = ['email' => $request->email, 'name' => $request->name, 'user'=>true];
        Mail::to($request->email)->send(new Contact($data2));

        return response()->json("Thank you for contacting us",200);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function showOrders(User $user)
    {
        return response()->json($user->orders()->with(['product','user','extras'])->get());
    }

    public function update(Request $request, User $user)
    {


        $status = $user->update(
            $request->only(
                [
                    'name',
                    'email',
                ]
            )
        );

        $user->where('id', $user->id)->update(array('is_admin' => $request->admin));


        return response()->json([
            'status' => $status,
            'message' => $status ? 'User Updated!' : 'Error Updating User'
        ]);
    }

    public function destroy($id)
    {
        return User::findOrFail($id)->delete();
    }

}
