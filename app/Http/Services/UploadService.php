<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request){
        if ($request->hasFile('file')){
            try {
                $name = $request->file('file')->getClientOriginalName();
                //dd($name);
                $pathFull = 'uploads/' . date("Y/m/d");
                $path = $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );
                //dd($path);
                return '../storage/app/public/' . $pathFull . '/' . $name;
            } catch (\Exception $error){
                return false;
            }
        }

    }
}
