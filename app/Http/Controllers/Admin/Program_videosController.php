<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program_videos;
use App\Models\Sections;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class Program_videosController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Program_videos::get();
        if($request->program_id)
            $data = Program_videos::where('program_id',$request->program_id)->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $program_id = $request->program_id;
        return view('Admin.Program_videos.index',compact('program_id'));
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->save_video($request,new Program_videos);
        return $this->apiResponseMessage(1,'تم اضافة الفيديو بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Program_videos = Program_videos::find($id);
        return $Program_videos;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $Program_videos = Program_videos::find($request->id);
        $this->save_video($request,$Program_videos);
        return $this->apiResponseMessage(1,'تم تعديل الفيديو بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_video($request,$Program_videos){
        if($request->video) {
            deleteFile('Program_videos',$Program_videos->video);
            $Program_videos->video=saveImage('Program_videos',$request->video);

        }
        $Program_videos->program_id = $request->program_id;

        $Program_videos->save();
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
            $Program_videos = Program_videos::whereIn('id', $ids)->get();
            foreach($Program_videos as $row){
                $this->deleteRow($row);
            }
        } else {
            $Program_videos = Program_videos::find($id);
            $this->deleteRow($Program_videos);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Program_videos){
        deleteFile('Program_videos',$Program_videos->video);
        $Program_videos->delete();
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
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('video', function ($data) {
            $image = '<a href="'. getImageUrl('Program_videos',$data->video).'" target="_blank">اضغط لرؤية الفيديو</a>';
            return $image;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','video'=>'video'])->make(true);
    }
}
