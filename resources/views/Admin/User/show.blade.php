<div class="modal fade" id="showData" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> تفاصيل الاشتراك</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-4 showDetilse">
                            <h5><i class="icon-Lock-User"></i>الاسم الاول</h5>
                            <p class="name_ar valueModal" id="first_name"></p>
                        </div>

                        <div class="col-md-4 showDetilse">
                            <h5><i class="icon-Lock-User"></i>الاسم الثاني</h5>
                            <p class="name_ar valueModal" id="last_name"></p>
                        </div>

                        <div class="col-md-4 showDetilse">
                            <h5><span class="btn-label"><i class=" icon-Hand-TouchSmartphone"></i></span> رقم الهاتف</h5>
                            <p class="name_en valueModal" id="phone"></p>
                        </div>
                        <div class="col-md-4 showDetilse">
                            <h5><i class="icon-Email"></i>البريد الالكتروني</h5>
                            <p class="main valueModal" id="email"></p>
                        </div>
                        <div class="col-md-4 showDetilse">
                            <h5><i class="icon-User"></i>الجنس</h5>
                            <p class="status valueModal" id="gender"></p>
                        </div>

                        <div class="col-md-4 showDetilse">
                            <h5><i class="icon-City-Hall"></i>المدينه</h5>
                            <p class="status valueModal" id="city"></p>
                        </div>

                        <div class="col-md-4 showDetilse">
                            <h5><i class="icon-Arrow-Up"></i>الطول</h5>
                            <p class="status valueModal" id="height"></p>
                        </div>

                        <div class="col-md-4 showDetilse">
                            <h5><i class="icon-weight-Lift"></i>الوزن</h5>
                            <p class="city_id valueModal" id="weight"></p>
                        </div>

                        <div class="col-md-4 showDetilse">
                            <h5><i class="icon-Numbering-List"></i>الوزن المطلوب تحقيقه</h5>
                            <p class="valueModal" id="desired_weight"></p>
                        </div>

                        <div class="col-md-6 showDetilse">
                            <h5><i class="icon-Numbering-List"></i>أسلوب الحياة الحالي</h5>
                            <p class="valueModal" id="current_lifestyle"></p>
                        </div>

                        <div class="col-md-6 showDetilse">
                            <h5><i class="icon-Medicine"></i>الادويه المتبعه</h5>
                            <p class="valueModal" id="medications"></p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main.close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

