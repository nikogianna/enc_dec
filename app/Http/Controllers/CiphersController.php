<?php
namespace App\Http\Controllers;

ini_set('max_execution_time', 300);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use phpseclib\Crypt\RSA;

class CiphersController extends Controller
{
    public function test_view()
    {
        return view('ciphers');
    }

    public function get_ciphers()
    {
        $ciphers             = openssl_get_cipher_methods();
        $ciphers_and_aliases = openssl_get_cipher_methods(true);
        $cipher_aliases      = array_diff($ciphers_and_aliases, $ciphers);

        //ECB mode should be avoided
        // $ciphers = array_filter($ciphers, function ($n) {
        //     return stripos($n, "ecb")===false;
        // });
        //
        // //At least as early as Aug 2016, Openssl declared the following weak: RC2, RC4, DES, 3DES, MD5 based
        // $ciphers = array_filter($ciphers, function ($c) {
        //     return stripos($c, "des")===false;
        // });
        // $ciphers = array_filter($ciphers, function ($c) {
        //     return stripos($c, "rc2")===false;
        // });
        // $ciphers = array_filter($ciphers, function ($c) {
        //     return stripos($c, "rc4")===false;
        // });
        // $ciphers = array_filter($ciphers, function ($c) {
        //     return stripos($c, "md5")===false;
        // });
        // $cipher_aliases = array_filter($cipher_aliases, function ($c) {
        //     return stripos($c, "des")===false;
        // });
        // $cipher_aliases = array_filter($cipher_aliases, function ($c) {
        //     return stripos($c, "rc2")===false;
        // });
// dd($ciphers);

        return response()->json(['output'=>$ciphers]);

        // print_r($ciphers);
        // print_r($cipher_aliases);
    }

    // public function get_ciphers2()
    // {
    //     static $ciphers;
    //
    //     // Function has already run
    //     if ($ciphers !== null) {
    //         return $ciphers;
    //     }
    //
    //     $result = openssl_get_cipher_methods();
    //
    //     return $result;
    // }
}
