<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{

    private $validator;
    protected $upload_directory = 'uploads';

    public function __construct()
    {
    }

    public function upload(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('file') && $request->file('file') != null) {
            $file           = $request->file('file');
            $origin_name    = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $type       = $request->has('type') ? $request->get('type') : 'images';
            $uploadType = $request->has('uploadType') ? $request->get('uploadType') : 'default';

            if (!is_null($file_extension)) {
                $file_name = snake_case(str_replace('.' . $file_extension, '', $origin_name));
                $path      = $this->upload_directory . "/" . $uploadType . "/" . $type . "/" . time() . "_{$file_name}.{$file_extension}";
            } else {
                $path = $this->upload_directory . "/" . $uploadType . "/" . $type . "/" . time() . "_{$file_name}";
            }
            $path = strtolower($path);

            $success = Storage::disk('local')->put($path, File::get($file));

            if ($success) {
                return url($path);
            } else {
                return false;
            }
        } 
        return null;
    }

    public function delete($path)
    {
        try {
            if (Storage::disk('local')->has($path)) {
                if (is_dir($path)) {
                    Storage::disk('local')->deleteDirectory($path);
                } else {
                    Storage::disk('local')->delete($path);
                }
            }
            return true;
        } catch (\Exception $e) {
            throw new \Exception($e, 1);
        }
    }
}
