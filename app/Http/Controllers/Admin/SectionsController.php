<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sections;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class SectionsController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Sections::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Admin.Sections.index');
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
                'icon' => 'required|image',
                'name' => 'required',
            ],
            [
                'icon.required' =>'من فضلك ادخل شعار القسم ',
                'icon.image' =>'شعار القسم يجب ان يكون صوره',
                'name.required' =>'من فضلك ادخل اسم القسم'
            ]
        );
        $this->save_section($request,new Sections);
        return $this->apiResponseMessage(1,'تم اضافة القسم بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Sections = Sections::find($id);
        return $Sections;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Sections = Sections::find($request->id);
        $this->save_section($request,$Sections);
        return $this->apiResponseMessage(1,'تم تعديل القسم بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_section($request,$Sections){
        $Sections->name=$request->name;
        $Sections->status=$request->status;
        if($request->icon) {
            deleteFile('Sections',$Sections->icon);
            $Sections->icon=saveImage('Sections',$request->icon);
        }
        $Sections->save();
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
            $Sections = Sections::whereIn('id', $ids)->get();
            foreach($Sections as $row){
                $this->deleteRow($row);
            }
        } else {
            $Sections = Sections::find($id);
            $this->deleteRow($Sections);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Sections){
        deleteFile('Sections',$Sections->icon);
        $Sections->delete();
    }

    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function ChangeStatus($id,Request $request){
        $Sections = Sections::find($id);
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
            $options .= ' <a href="/Admin/Programs/index?section_id='.$data->id.'" title="البرامج " class="btn btn-success waves-effect btn-circle waves-light"><i class="icon-Add"></i> </a></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('icon', function ($data) {
            $image = '<a href="'. getImageUrl('Sections',$data->icon).'" target="_blank">'
                .'<img  src="'. getImageUrl('Sections',$data->icon) . '" width="50px" height="50px"></a>';
            return $image;
        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" >معروضة</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut"  style="cursor:pointer !important" >غير معروضة</button>';
            return $status;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','icon'=>'icon','status'=>'status'])->make(true);
    }
}
