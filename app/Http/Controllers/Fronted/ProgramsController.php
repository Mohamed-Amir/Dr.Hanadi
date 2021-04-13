<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Program_videos;
use App\Models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Controllers\Manage\EmailsController;


class ProgramsController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function singleProgram($id)
    {
        $program = Programs::where('id',$id)->first();
        $singleProgram=1;
        if (!is_null($program)) {
            return view('Fronted.Programs.singleProgram',compact('program','singleProgram'));
        }
    }
}
