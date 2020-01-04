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
        } elseif (request()->input_bits1 == null) {
            $input1 = '00000000';
        } else {
            dd('asdsa');
        };
        if (ctype_xdigit(request()->input_bits2)) {
            $input2 = str_pad(request()->input_bits2, 8, '0', STR_PAD_LEFT);
        } elseif (request()->input_bits2 == null) {
            $input2 = '00000000';
        } else {
            dd('asdsa');
        };
        if (ctype_xdigit(request()->input_bits3)) {
            $input3 = str_pad(request()->input_bits3, 8, '0', STR_PAD_LEFT);
        } elseif (request()->input_bits3 == null) {
            $input3 = '00000000';
        } else {
            dd('asdsa');
        };
        if (ctype_xdigit(request()->input_bits4)) {
            $input4 = str_pad(request()->input_bits4, 8, '0', STR_PAD_LEFT);
        } elseif (request()->input_bits4 == null) {
            $input4 = '00000000';
        } else {
            dd('asdsa');
        };

        $enc_key1 = request()->encryption_key1;
        $enc_key2 = request()->encryption_key2;
        $enc_key3 = request()->encryption_key3;
        $enc_key4 = request()->encryption_key4;


        $iv1 = request()->iv1;
        $iv2 = request()->iv2;
        $iv3 = request()->iv3;
        $iv4 = request()->iv4;


        if (strpos(request()->block_cipher, 'des') !== false) {
            // $iv1 = $iv2 = $iv3 = $iv4 = null;
            $iv1 = substr($iv1, 0, 8);
            $iv2 = substr($iv2, 0, 8);
            $iv3 = substr($iv3, 0, 8);
            $iv4 = substr($iv4, 0, 8);

        }

        if (request()->block_cipher == 'aes-128-ecb') {
            $iv1 = $iv2 = $iv3 = $iv4 = null;
        }

        if (request()->block_cipher == 'des-ecb') {
            $iv1 = $iv2 = $iv3 = $iv4 = null;
        }

        if (request()->action === 'cipher') {
            $data1 = openssl_encrypt($input1, request()->block_cipher, $enc_key1, 0, $iv1);
            $data2 = openssl_encrypt($input2, request()->block_cipher, $enc_key2, 0, $iv2);
            $data3 = openssl_encrypt($input3, request()->block_cipher, $enc_key3, 0, $iv3);
            $data4 = openssl_encrypt($input4, request()->block_cipher, $enc_key4, 0, $iv4);
        } elseif (request()->action === 'public') {
            openssl_public_encrypt($input1, $data1, $enc_key1);
            openssl_public_encrypt($input2, $data2, $enc_key2);
            openssl_public_encrypt($input3, $data3, $enc_key3);
            openssl_public_encrypt($input4, $data4, $enc_key4);

            $data1 = base64_encode($data1);
            $data2 = base64_encode($data2);
            $data3 = base64_encode($data3);
            $data4 = base64_encode($data4);
        } elseif (request()->action === 'hash') {
            $data1 = hash(request()->hash_select, $input1);
            $data2 = hash(request()->hash_select, $input2);
            $data3 = hash(request()->hash_select, $input3);
            $data4 = hash(request()->hash_select, $input4);
        }

        return response()->json(['output1'=>$data1, 'output2'=>$data2,'output3'=>$data3,'output4'=>$data4]);
    }
}
