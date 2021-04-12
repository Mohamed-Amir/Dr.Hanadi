<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Programs;
use App\Models\Sections;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class ProgramsController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Programs::get();
        if($request->section_id)
            $data = Programs::where('section_id',$request->section_id)->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $title = 'البرامج';
        $section_id = $request->section_id;
        return view('Admin.Programs.index',compact('title','section_id'));
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|image',
                'program_name' => 'required',
            ],
            [
                'image.required' =>'من فضلك ادخل صوره البرنامج ',
                'image.image' =>'هذا الحقل يجب ان يكون صوره',
                'program_name.required' =>'من فضلك ادخل اسم البرنامج'
            ]
        );
        $this->save_program($request,new Programs);
        return $this->apiResponseMessage(1,'تم اضافة البرنامج بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Programs = Programs::find($id);
        return $Programs;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Programs = Programs::find($request->id);
        $this->save_program($request,$Programs);
        return $this->apiResponseMessage(1,'تم تعديل البرنامج بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_program($request,$Programs){
        $Programs->program_name=$request->program_name;
        $Programs->about_program=$request->about_program;
        $Programs->section_id=$request->section_id;
        $Programs->status=$request->status;
        if($request->image) {
            deleteFile('Programs_images',$Programs->image);
            $Programs->image=saveImage('Programs_images',$request->image);
        }
        $Programs->save();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy($id,Request $request)
    {
        if ($request->type == 2) {
            $ids = explode(',', $id);
            $Programs = Programs::whereIn('id', $ids)->get();
            foreach($Programs as $row){
                $this->deleteRow($row);
            }
        } else {
            $Programs = Programs::find($id);
            $this->deleteRow($Programs);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Programs){
        deleteFile('Programs_images',$Programs->image);
        $Programs->delete();
    }

    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function ChangeStatus($id,Request $request){
        $Sections = Programs::find($id);
        $Sections->status=$request->status;
        $Sections->save();
        return 1;
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    private function mainFunction($data)
    {
        return Datatables::of($data)->addColumn('action', function ($data) {
            $options = '<td class="sorting_1"><button  class="btn btn-info waves-effect btn-circle waves-light" onclick="editFunction(' . $data->id . ')" type="button" ><i class="fa fa-spinner fa-spin" id="loadEdit_' . $data->id . '" style="display:none"></i><i class="sl-icon-wrench"></i></button>';
            $options .= ' <button type="button" onclick="deleteFunction(' . $data->id . ',1)" class="btn btn-dribbble waves-effect btn-circle waves-light"><i class="sl-icon-trash"></i> </button></td>';
            $options .= ' <a href="/Admin/Program_videos/index?program_id='.$data->id.'" title="الفيديوهات " class="btn btn-success waves-effect btn-circle waves-light"><i class="icon-Add"></i> </a></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('Programs_images',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Programs_images',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" >معروضة</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut"  style="cursor:pointer !important" >غير معروضة</button>';
            return $status;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','image'=>'image','status'=>'status'])->make(true);
    }
}
