<?php
namespace App\Services;

use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\Storage;



class FileManager {
    private $availableImageExtensions = array('jpeg', 'jpg', 'png', 'bmp', 'ico', 'pjpeg', 'svg');
    private $maxImageSize = "9992867"; // 8000

    private function testImageSize($myImage) {
        // Method to check that the image is an actual & real image file
        try {
            list($width, $height) = getimagesize($myImage); 
            $passImageSize = (is_numeric($width) && is_numeric($height));
        }
        catch (Exception $e) {
            $passImageSize = false;
        }
        return $passImageSize;
    }

    public function validateImage($file, $nullable)
    {
        $data = ["file" => $file];
        $mimes = implode(",", $this->availableImageExtensions);
        return Validator::make($data, [
            'file' => "$nullable|file|max:{$this->maxImageSize}|mimes:$mimes",
            //"phone" => ['nullable', 'numeric', "size:15"],


        ]);
    }

    public function uploadImage($file, $nullable, $path, $filename=null) {
        $valid = $this->validateImage($file, $nullable);
        if($valid) {
            $fileExt = $file->getClientOriginalExtension();
            $passSizeTest = $this->testImageSize($file);
            if ($passSizeTest) {
                $fileName = $filename ?? \uniqid() . "." . $fileExt;
                $store = $file->storeAs($path, $fileName);
                return $fileName;
            }
        }
        return null;
        
    } 


}