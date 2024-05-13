<?php

namespace App\Services;
use App\File;

class FileService
{
    protected $image_path;
    protected $document_path;

	public function __construct($file_path)
    {
        //Local
        // $this->image_path    = public_path().$file_path.'images/';
        // $this->document_path = public_path().$file_path.'documents/';

        //Server
        $this->image_path    = '/home/fxhkxrpx/public_html'.$file_path.'images/';
        $this->document_path = '/home/fxhkxrpx/public_html'.$file_path.'documents/';
    }

    public function storeImage($request, $field_file, $module, $id)
    {   
        if($request->hasFile($field_file))
        {
            $images = $request->file($field_file);
            $this->storeFile($images, 'image', $this->image_path, $module, $id);
        }
    }

	public function storeDocument($request, $field_file, $module, $id)
	{	
        if($request->hasFile($field_file))
        {
            $documents = $request->file($field_file);
            $this->storeFile($documents, 'document', $this->document_path, $module, $id);
        }
	}

    public function storeFile($files, $type, $path, $module, $id)
    {   
        foreach ($files as $file)
        {
            $file_bd               = new File;
            $ext                   = $file->getClientOriginalExtension();
            $name                  = $file->getClientOriginalName();
            $size                  = $file->getClientSize();
            $timestamp             = time() . rand();
            $file->move($path, $timestamp . '.' . $ext);
            $file_bd->name         = $timestamp . '.' . $ext;
            $file_bd->module       = $module;
            $file_bd->type         = $type;
            $file_bd->reference_id = $id;
            $file_bd->save();
        }
    }

    public function removeImage($module, $id)
    {
        $images = File::where('type', 'image')->where('module', $module)->where('reference_id', $id)->get();
        $this->removeFile($this->image_path, $images);        
    }

    public function removeDocument($module, $id)
    {
        $documents = File::where('type', 'document')->where('module', $module)->where('reference_id', $id)->get();
        $this->removeFile($this->document_path, $documents);
    }

    public function removeFile($path, $files)
    {
        foreach ($files as $file) {
            File::destroy($file->id);
            \File::delete($path.$file->name);
        }
    }

    public function getFilesFomServer($type, $module, $id)
    {
        $files      = File::where('type', $type)->where('module', $module)->where('reference_id', $id)->get();
        $fileAnswer = [];

        foreach ($files as $file) {
            $fileAnswer[] = [
                'id'       => $file->id,
                'original' => $file->original_name,
                'server'   => $file->name,
                'size'     => $file->fs
            ];
        }

        return $fileAnswer;
    }

    public function deleteFile($type, $id)
    {
        $uploaded_file = File::where('id', $id)->first();
        $file_path     = $type == 'image' ? $this->image_path : $this->document_path;
        $message       = 'Archivo eliminado correctamente.';
        $status        = 200;

        if (empty($uploaded_file)) {
            $message = 'Lo sentimos, el archivo no existe!';
            $status  = 400;
        }else {
            $file_path = $file_path . '/' . $uploaded_file->name;
 
            if (file_exists($file_path)) {
                unlink($file_path);
            }
     
            if (!empty($uploaded_file)) {
                $uploaded_file->delete();
            }
        }

        $result = [
            'body'   => [
                            'message' => $message
                        ],
            'status' => $status
        ];

        return $result;
    }

    public function saveFiles($type, $module, $id, $files)
    {
        //Ruta que usan en el servidor
        //$path = '/home/fxhkxrpx/public_html/assets/reports/';
        
        $path = $type == 'image' ? $this->image_path : $this->document_path;

        if (!is_array($files)) {
            $files = [$files];
        }
        
        if (!is_dir($path)) {
            mkdir($path, 0777);
        }
 
        for ($i = 0; $i < count($files); $i++) {
            $file        = $files[$i];
            $name        = sha1(date('YmdHis') . str_random(30));
            $save_name   = $name . '.' . $file->getClientOriginalExtension();
            $resize_name = $name . str_random(2) . '.' . $file->getClientOriginalExtension();
            
            //$file->move($files, $save_name);
  
            $file_bd   = new File;
            $ext       = $file->getClientOriginalExtension();
            $name      = $file->getClientOriginalName();
            $size      = $file->getClientSize();
            $timestamp = time() . rand();
            $file->move($path, $timestamp . '.' . $ext);
            $file_bd->original_name = $name;
            $file_bd->fs            = filesize ($path . $timestamp . '.' . $ext);
            $file_bd->name          = $timestamp . '.' . $ext;
            $file_bd->module        = $module;
            $file_bd->type          = $type;
            $file_bd->reference_id  = $id;
            $file_bd->save();
            
            /*$upload = new Upload();
            $upload->filename      = $save_name;
            $upload->resized_name  = $resize_name;
            $upload->original_name = basename($image->getClientOriginalName());
            $upload->save();*/
        }

        $result = [
            'body'   => [
                            'message' => 'Archivo guardado correctamente.'
                        ],
            'status' => 200
        ];

        return $result;
    }
}
