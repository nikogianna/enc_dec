<?php
namespace App\Http\Controllers;

ini_set('max_execution_time', 300);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpseclib\Crypt\RSA;

class DecryptController extends Controller
{
    public function decrypt_view()
    {
        return view('decrypt');
    }
    public function decrypt_text_view()
    {
        return view('decrypt_text');
    }
    public function decrypt_file_view()
    {
        return view('decrypt_file');
    }
    public function upload()
    {
        if (request()->has('textToUpload')) {
            request()->validate([
             'textToUpload'          => 'required|string|min:1|max:750',
             'userDecryptionKeyText' => 'required_without:userDecryptionKeyFile|string|nullable|max:512',
             'userDecryptionKeyFile' => 'file|max:10',
             'encOptions' => 'string|nullable|min:10|max:10',
             'encChoiceAES' => 'string|nullable|min:4|max:5',
             'encChoiceRSA' => 'string|nullable|min:4|max:5',
            ]);
            $filename = 'ecnrypted_text.txt';
        } else {
            request()->validate([
             'userDecryptionKeyText' => 'required_without:userDecryptionKeyFile|string|nullable|max:512',
             'userDecryptionKeyFile' => 'file|max:10',
             'encOptions' => 'string|nullable|min:10|max:10',
             'encChoiceAES' => 'string|nullable|min:4|max:5',
             'encChoiceRSA' => 'string|nullable|min:4|max:5',
            ]);
            if (request()->encChoiceAES == 'true') {
                request()->validate([
            'fileToUpload'      => 'required|file|max:2048',
           ]);
            } elseif (request()->encChoiceRSA == 'true') {
                request()->validate([
          'fileToUpload'      => 'required|file|max:10',
         ]);
            }
            // $filename = 'ecnrypted_img.png';
            $filename = 'ecnrypted';
        }

        $this->handle_req();
        return response()->download(storage_path().'/app/image/out', $filename)->deleteFileAfterSend();
    }
    public function handle_req()
    {
        if (request()->has('textToUpload')) {
            $in = request()->textToUpload;
        } elseif (request()->has('fileToUpload')) {
            $in = file_get_contents(request()->fileToUpload);
        }
        if (request()->userDecryptionKeyText != null) {
            if (request()->userDecryptionKeyFile != null) {
                if (request()->encOptions == 'manualText') {
                    $enc_key = request()->userDecryptionKeyText;
                } elseif (request()->encOptions == 'manualFile') {
                    $enc_key = file_get_contents(request()->userDecryptionKeyFile);
                }
            } else {
                $enc_key = request()->userDecryptionKeyText;
            }
        } else {
            $enc_key = file_get_contents(request()->userDecryptionKeyFile);
        }
        if (request()->encChoiceRSA == 'true') {
            $out = $this->decrypt_RSA($in, $enc_key);
        } elseif (request()->encChoiceAES == 'true') {
            $out = $this->decrypt_AES($in, $enc_key);
        } else {
            $out = null;
        }
        Storage::put('/image/out', $out);
    }
    public function decrypt_AES($in, $enc_key)
    {
        $iv = hex2bin('000102030405060708090a0b0c0d0e0f');
        $out  = openssl_decrypt($in, 'aes-128-ctr', $enc_key, 0, $iv);
        return $out;
    }
    public function decrypt_RSA($data, $privatekey)
    {
        $rsa = new RSA();
        $rsa->loadKey($privatekey);
        $out = $rsa->decrypt($data);
        return $out;
    }
}
