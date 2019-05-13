<?php
namespace App\Http\Controllers;

ini_set('max_execution_time', 300);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use phpseclib\Crypt\RSA;

class TestController extends Controller
{
    public function test_view()
    {
        return view('test');
    }

    public function to_binary()
    {
        if (request()->has('input_bits')) {
            request()->validate([
           'input_bits'          => 'required|string|min:1|max:750',
          ]);
        }
        $input = request()->input_bits;
        $input = str_split($input);

        for ($i = 0; $i < sizeof($input); $i++) {
            $input[$i] = str_pad(decbin(ord($input[$i])), 8, '0', STR_PAD_LEFT);
        }
        $inp = implode(' ', $input);
        if (request()->has('cipher_select')) {
            request()->validate([
             'cipher_select'          => 'required',
            ]);
        }
        $cipher = request()->cipher_select;
        $cipher = decbin($cipher);

        $cipher = str_pad($cipher, 8, '0', STR_PAD_LEFT);

        return response()->json(['output'=>$inp, 'cipher'=>$cipher]);
    }

    public function upload()
    {
        $choice = request()->choice;
        $ciphers = $this->get_ciphers();

        if ($choice == 'ciphers_only') {
            return response()->json(['output'=>$ciphers]);
        }
        if (request()->has('binary_input')) {
            request()->validate([
             'binary_input'          => 'required',
            ]);
        }
        $input = substr(request()->binary_input, 0, -9);
        $cipher = bindec(substr(request()->binary_input, -8));

        $input = str_replace(' ', '', $input);

        $input = str_split($input, 8);

        for ($i = 0; $i < sizeof($input); $i++) {
            $input[$i] = chr(bindec($input[$i]));
        }
        $input = implode('', $input);

        if (request()->has('key')) {
            request()->validate([
             'key'          => 'required',
            ]);
        }

        $encryption_key = request()->key;
        $iv = request()->iv;
        $cipher_name = (($cipher - 1) < 0 ? "No cipher chosen" : $ciphers[$cipher - 1]);
        $data = openssl_encrypt($input, $cipher_name, $encryption_key, 0, $iv);
        $value = str_split($data);

        for ($i = 0; $i < sizeof($value); $i++) {
            $dec[$i] = str_pad(ord($value[$i]), 3, '0', STR_PAD_LEFT);
            $bin[$i] = str_pad(decbin(ord($value[$i])), 8, '0', STR_PAD_LEFT);
        }
        $dec = implode(' ', $dec);
        $bin = implode(' ', $bin);

        return response()->json(['raw_output'=>$data, 'hex_output'=>$dec, 'bin_output'=>$bin]);
    }

    public function decrypt()
    {
        // dd(request()->all());
        $ciphers = $this->get_ciphers();
        $mode = request()->get('output_choice');

        if ($mode == 'option1') {
            $input = request()->out_bit;
        } elseif ($mode == 'option2') {
            $input = request()->out_bit2;
            $input = str_replace(' ', '', $input);
            $input = str_split($input, 3);
            for ($i = 0; $i < sizeof($input); $i++) {
                $input[$i] = chr($input[$i]);
            }
            $input = implode('', $input);
        } elseif ($mode == 'option3') {
            $input = request()->out_bit3;
            $input = str_replace(' ', '', $input);
            $input = str_split($input, 8);
            for ($i = 0; $i < sizeof($input); $i++) {
                $input[$i] = chr(bindec($input[$i]));
            }
            $input = implode('', $input);
        }

        // dd($input);

        $cipher = request()->get('cipher_select');
        // dd($cipher);
        // $cipher = bindec(substr(request()->binary_input, -8));
        $encryption_key = request()->key;
        $iv = request()->iv;
        $cipher_name = (($cipher - 1) < 0 ? "No cipher chosen" : $ciphers[$cipher - 1]);
        $data = openssl_decrypt($input, $cipher_name, $encryption_key, 0, $iv);
        // dd($data);
        $value = str_split($data);
        for ($i = 0; $i < sizeof($value); $i++) {
            $bin[$i] = str_pad(decbin(ord($value[$i])), 8, '0', STR_PAD_LEFT);
        }
        $bin = implode(' ', $bin);
        $cipher = str_pad(decbin($cipher), 8, '0', STR_PAD_LEFT);


        return response()->json(['output'=>$data, 'cipher'=>$cipher, 'bin_output'=>$bin]);
    }

    public function get_ciphers()
    {
        static $ciphers;

        // Function has already run
        if ($ciphers !== null) {
            return $ciphers;
        }

        $result = openssl_get_cipher_methods();

        return $result;
    }

    public function random_number_gen()
    {
           $size = $_POST['size'];
        $data = bin2hex(openssl_random_pseudo_bytes($size/2));
        return response()->json(['output'=>$data]);
    }
}
