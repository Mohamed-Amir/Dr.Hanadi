<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DrHanadi;
use App\Models\Sections;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class DrHanadiController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = DrHanadi::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Admin.DrHanadi.index');
    }


    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $DrHanadi = DrHanadi::find($id);
        return $DrHanadi;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $DrHanadi = DrHanadi::find($request->id);
        $this->save_info($request,$DrHanadi);
        return $this->apiResponseMessage(1,'تم تعديل المعلومات بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_info($request,$DrHanadi){
        $DrHanadi->about=$request->about;
        if($request->image) {
            deleteFile('DrHanadi_images',$DrHanadi->image);
            $DrHanadi->image=saveImage('DrHanadi_images',$request->image);
        }
        if($request->latest_video) {
            deleteFile('DrHanadi_videos',$DrHanadi->latest_video);
            $DrHanadi->latest_video=saveImage('DrHanadi_videos',$request->latest_video);
        }
        $DrHanadi->save();
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
            $DrHanadi = DrHanadi::whereIn('id', $ids)->get();
            foreach($DrHanadi as $row){
                $this->deleteRow($row);
            }
        } else {
            $DrHanadi = DrHanadi::find($id);
            $this->deleteRow($DrHanadi);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($DrHanadi){
        deleteFile('DrHanadi_images',$DrHanadi->image);
        deleteFile('DrHanadi_videos',$DrHanadi->latest_video);
        $DrHanadi->delete();
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
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('DrHanadi_images',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('DrHanadi_images',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->editColumn('latest_video', function ($data) {
            $image = '<a href="'. getImageUrl('DrHanadi_videos',$data->latest_video).'" target="_blank">اضغط لرؤية الفيديو</a>';
            return $image;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','image'=>'image','latest_video'=>'latest_video'])->make(true);
    }
}
