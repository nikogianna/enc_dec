<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoprocessorController extends Controller
{
    public function proc_view()
    {
        return view('coprocessor');
    }

    public function encrypt()
    {

        // dd (request()->all());
        if (ctype_xdigit(request()->input_bits1)) {
            $input1 = str_pad(request()->input_bits1, 8, '0', STR_PAD_LEFT);
        } else if (request()->input_bits1 == null) {
           $input1 = '00000000';
         } else {
            dd('asdsa');
        };
        if (ctype_xdigit(request()->input_bits2)) {
            $input2 = str_pad(request()->input_bits2, 8, '0', STR_PAD_LEFT);
        } else if (request()->input_bits2 == null) {
           $input2 = '00000000';
         } else {
            dd('asdsa');
        };
        if (ctype_xdigit(request()->input_bits3)) {
            $input3 = str_pad(request()->input_bits3, 8, '0', STR_PAD_LEFT);
        } else if (request()->input_bits3 == null) {
           $input3 = '00000000';
         } else {
            dd('asdsa');
        };
        if (ctype_xdigit(request()->input_bits4)) {
            $input4 = str_pad(request()->input_bits4, 8, '0', STR_PAD_LEFT);
        } else if (request()->input_bits4 == null) {
           $input4 = '00000000';
         } else {
            dd('asdsa');
        };

        $input = $input1.$input2.$input3.$input4;
        $enc_key = request()->encryption_key;
        $iv = request()->iv;

        // dd($enc_key);
        // dd ($input1.$input2.$input3.$input4);

        if (request()->action === 'cipher') {
          $data = openssl_encrypt($input, request()->block_cipher, $enc_key, 0, $iv);
        }
        else if (request()->action === 'public') {
         openssl_public_encrypt ( $input , $data, $enc_key);

          $data = base64_encode($data);
        }
        else if (request()->action === 'hash') {
          $data = hash ( request()->hash_select , $input);
        }

        return response()->json(['output'=>$data]);
        // dd($data);

    }
}
