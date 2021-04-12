<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Models\Sections;
use App\Http\Controllers\Manage\EmailsController;


class SectionsController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function singleSection($id)
        {
        $program = Programs::where('section_id',$id)->get();
        if (!is_null($program)) {
            return view('Fronted.Programs.allPrograms',compact('program'));
        }
    }
}
