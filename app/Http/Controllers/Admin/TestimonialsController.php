<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Sections;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class TestimonialsController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Testimonial::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Admin.Testimonials.index');
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->save_testimonial($request,new Testimonial);
        return $this->apiResponseMessage(1,'تم اضافة الشهاده بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Testimonial = Testimonial::find($id);
        return $Testimonial;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $Testimonial = Testimonial::find($request->id);
        $this->save_testimonial($request,$Testimonial);
        return $this->apiResponseMessage(1,'تم تعديل الشهاده بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_testimonial($request,$Testimonial){
        if($request->image) {
            deleteFile('Testimonial',$Testimonial->image);
            $Testimonial->image=saveImage('Testimonial',$request->image);

        }
        $Testimonial->testimonial = $request->testimonial;
        $Testimonial->name = $request->name;
        $Testimonial->title = $request->title;
        $Testimonial->status = $request->status;

        $Testimonial->save();
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
            $Testimonial = Testimonial::whereIn('id', $ids)->get();
            foreach($Testimonial as $row){
                $this->deleteRow($row);
            }
        } else {
            $Testimonial = Testimonial::find($id);
            $this->deleteRow($Testimonial);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Testimonial){
        deleteFile('Testimonial',$Testimonial->image);
        $Testimonial->delete();
    }

    public function ChangeStatus($id,Request $request){
        $Sections = Testimonial::find($id);
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
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('Testimonial',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Testimonial',$data->image) . '" width="50px" height="50px"></a>';
            return $image;

        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" >معروضة</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut"  style="cursor:pointer !important" >غير معروضة</button>';
            return $status;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','image'=>'image','status'=>'status'])->make(true);
    }
}
