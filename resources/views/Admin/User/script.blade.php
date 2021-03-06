@include('Admin.includes.scripts.dataTableHelper')

<script type="text/javascript">

    var table = $('#datatable').DataTable({
        bLengthChange: false,
        searching: true,
        responsive: true,
        'processing': true,
        'language': {
            'loadingRecords': '&nbsp;',
            'processing': '<div class="spinner"></div>',
            'sSearch' : 'بحث :',
            "paginate": {
                "next": "التالي",
                "previous": "السابق"
            },
            "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
        },
        serverSide: true,

        order: [[0, 'desc']],

        buttons: ['copy', 'excel', 'pdf'],

        ajax: "{{ route('User.allData')}}",

        columns: [
            {data: 'checkBox', name: 'checkBox'},
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'gender', name: 'gender'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    function showFunction(id) {

        save_method = 'edit';

        $('#err').slideUp(200);

        $('#loadShow_' + id).css({'display': ''});

        $.ajax({
            url: "/Admin/User/show/" + id,
            type: "GET",
            dataType: "JSON",

            success: function (data) {

                $('#loadShow_' + id).css({'display': 'none'});

                $('#showData').modal();

                $('#first_name').text(data.first_name);
                $('#last_name').text(data.last_name);
                $('#email').text(data.email);
                $('#phone').text(data.phone);
                $('#gender').text(data.gender);
                $('#city').text(data.city);
                $('#height').text(data.height);
                $('#weight').text(data.weight);
                $('#desired_weight').text(data.desired_weight);
                $('#current_lifestyle').text(data.current_lifestyle);
                $('#medications').text(data.medications);
                $('#id').text(data.id);
            }
        });
    }

    function deleteFunction(id,type) {
        if (type == 2 && checkArray.length == 0) {
            alert('لم تقم بتحديد اي عناصر للحذف');
        } else if (type == 1){
            url =  "/Admin/User/destroy/" + id;
            deleteProccess(url);
        }else{
            url= "/Admin/User/destroy/" + checkArray + '?type=2';
            deleteProccess(url);
            checkArray=[];
        }
    }

</script>

