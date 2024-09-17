<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\LoginMail;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class LoginController extends Controller
{

    public function index()
    {
        return view('loginView');
    }
    public function requestCode(Request $request){
        $email = $request->post('email');
        $code = $this->generateCode(6);

        $_SESSION['email'] = $email;

        $user = Client::where('email', $email)->first();
        if($user){
            $user->code = $code;
            $user->save();
        }
        else{
            Client::create([
                'email' => $email,
                'code' => $code
            ]);
        }

        $data = ['email' => $email, 'code' => $code];

        $this->sendMail($email, $data);

        return view('loginView');

    }

    public function sendMail($to, $data)
    {

        $mail = new LoginMail($data);

        Mail::to($to)
            ->send($mail);

        return 'Custom email sent successfully!';
    }

    public function checkCode(Request $request){
        $inputedCode = $request->post('code');

        $email = $_SESSION['email'];

        if(!isset($_SESSION['email']))
            return view('loginView');

        $code = Client::where('email', $email)->first()->code;

        if($inputedCode == $code){
            $_SESSION['status'] = 1;
            return view('index');
        }
        else{
            unset($_SESSION['email']);
            return view('loginView');
        }
    }

    public function generateCode(int $n){
        $code = '';
        for ($i = 0; $i < $n; $i++) {
            $code .= rand(0, 9);
        }
        return $code;
    }
}
