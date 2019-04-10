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

    public function upload() {
      // dd(request()->all());
              $input = request()->in_bit;
              // return response()->json(['success'=>'Got Simple Ajax Request.']);
              // if (request()->has('in_bit')) {
                // return response()->json([request()->in_bit]);
                // return response()->json(['success'=>"ueah"]);

                $value = bindec($input);
// dd($value);
$value2 = sprintf('%08d', decbin($value));
$value = bindec($value2);

// $value = hex2bin($value);

                $encryption_key = '2b7e151628aed2a6abf7158809cf4f3c';
                $iv = hex2bin('000102030405060708090a0b0c0d0e0f');

                $data = openssl_encrypt($value, 'aes-128-ctr', $encryption_key, 0, $iv);

                // $data = openssl_decrypt($data, 'aes-128-ctr', $encryption_key, 0, $iv);

                $value = unpack('H*', $data);
                $data2 = base_convert($value[1], 16, 2);
               // dd (sprintf('%016d',decbin(unpack('s', $data)[1])));

                 // $data = pack('H*', base_convert($data2, 2, 16));
              // dd(implode("",$input));
               // }
              // return response()->json(['success'=>$input]);
              return response()->json(['raw_output'=>$data, 'hex_output'=>$value[1], 'bin_output'=> $data2]);
              // return response()->json($data);


    }

}
