@extends('admin.layouts.base')

@push('styles')
<style>
#add_new_properties {
    height: 700px;
    overflow: auto;
    width: 700px !important;
    margin: 10px 0px 0 125px !important;
  }
</style>
@endpush

{{-- @section('admin_filter_form')
    {!! Form::open(['route' => 'admin.properties.download', 'method' => 'POST', 'id' => 'filter_data', 'class' => 'form mb-15']) !!}
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label
                class="col-lg-4 col-form-label required fw-bold fs-6">{{ trans_choice('content.properties.title', 1) }}</label>
<!--end::Label-->
<!--begin::Col-->
<div class="col-lg-8 fv-row">
    {!! Form::text('title', null, ['placeholder' => __('content.properties.title'), 'value' => 'Max', 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0 search_input']) !!}
</div>
<!--end::Col-->

</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-4 col-form-label fw-bold fs-6">
        <span class="required">{{ trans_choice('content.properties.id', 1) }}</span>
    </label>
    <!--end::Label-->
    <!--begin::Col-->
    <div class="col-lg-8 fv-row">
        {!! Form::text('properties_id', null, ['placeholder' => __('placeholder.property_id'), 'class' => 'form-control form-control-lg form-control-solid only_number search_input']) !!}
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-4 col-form-label fw-bold fs-6">{{ trans_choice('content.status_title', 1) }}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <div class="col-lg-8 fv-row">
        <select class="form-control form-control-lg form-control-solid search_input" data-control="select2" name="status">
            <option value="">{{ trans_choice('content.please_select', 1) }}</option>
            <option value="1">{{ trans_choice('content.active_title', 1) }}</option>
            <option value="0">{{ trans_choice('content.inactive_title', 1) }}</option>
        </select>
    </div>
    <!--end::Input-->
</div>
<!--end::Input group-->
<!--end::Input group-->
</div>
<!--end::Card body-->

<!--begin::Actions-->
<div class="d-flex justify-content-end">
    @include('admin.layouts.components.buttons.white_btn', [
    'type' => 'reset',
    'id' => 'searchReset',
    'attr' => 'data-kt-menu-dismiss="true"',
    'title' => trans_choice('content.reset', 1),
    'class' => 'btn-active-light-primary',
    ])
    @include('admin.layouts.components.buttons.primary_btn', [
    'id' => 'extraSearch',
    'attr' => 'data-kt-menu-dismiss="true"',
    'title' => __('content.search_title'),
    ])
    @include('admin.layouts.components.buttons.exportbtn')
</div>
<!--end::Actions-->
{!! Form::close() !!}
@endsection --}}

@section('content')
@include('admin.layouts.components.header', [
'title' => __('messages.list', [
'name' => trans_choice('content.sidebar.property', 2),
]),
'breadcrumbs' => Breadcrumbs::render('admin.properties.index'),
'filter' => true,
'create_btn' => [
'status' => true,
'route' => route('admin.properties.create'),
'name' => __('messages.create', [
'name' => trans_choice('content.sidebar.property', 1),
]),
],
'export' => [
'status' => true,
'route' => route('admin.properties.getdownload'),
],
'import' => [
'status' => true,
'route' => route('admin.properties.import'),
'format_file_route' => route('admin.properties.getfile'),
],

'add_new' => [
'status' => true,
'route' => route('admin.properties.add_property'),
// 'format_file_route' => route('admin.properties.getfile'),
],
])
@include('admin.layouts.components.datatable_header', [
'data' => [
['classname' => '', 'title' => trans_choice('content.id_title', 1)],
['classname' => 'min-w-125px', 'title' => trans_choice('content.title_title', 1)],
['classname' => 'min-w-125px', 'title' => trans_choice('content.rent_title', 1)],
['classname' => 'min-w-125px', 'title' => trans_choice('content.room_category_title', 1)],
['classname' => 'min-w-125px', 'title' => trans_choice('content.status_title', 1)],
['classname' => 'min-w-100px', 'title' => trans_choice('content.action_title', 1)],
],
])
@endsection

@push('scripts')
<script>
    var oTable;
    $(document).ready(function() {
        oTable = $('#kt_table_1').DataTable({
            responsive: true
            , searchDelay: 500
            , processing: true
            , serverSide: true
            , order: [
                [0, 'desc']
            ]
            , oLanguage: {
                sLengthMenu: "Show _MENU_"
            , }
            , createdRow: function(row, data, dataIndex) {
                // Set the data-status attribute, and add a class
                $(row).attr('role', 'row');
                $(row).find("td").last().addClass('text-danger');

            }
            , ajax: {
                "url": "{{ route('admin.properties.index') }}",
                // data: function(d) {
                //     d.name = $('input[name=name]').val();
                //     d.property_id = $('input[name=property_id]').val();
                //     d.status = $('select[name=status]').val();
                // },
            }
            , dom: `<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`
            , columnDefs: [{
                targets: [5]
                , orderable: false
                , searchable: false,
                // className: 'mdl-data-table__cell--non-numeric'
            }]
            , columns: [{
                    data: 'id'
                    , name: 'id'
                    , render: function(data, type, row, meta) {
                        return data;
                        // return "#" + serialNumberShow(meta);
                    }
                },

                {
                    data: 'title'
                    , name: 'title'
                    , render: function(data, type, row, meta) {
                        var show_url = `{{ url('/') }}/admin/properties/` + row['id'] +
                            `?tab=details`;
                        return ` <a href="${show_url}">
                                        <div class="font-medium whitespace-no-wrap">${data}</div>
                                    </a>`;
                    }
                }
                , {
                    data: 'rent'
                    , name: 'rent'
                    , render: function(data, type, row, meta) {
                        return `<div class="font-medium whitespace-no-wrap">${data}</div>`;
                    }
                }
                , {
                    data: 'room_category'
                    , name: 'room_category'
                    , render: function(data, type, row, meta) {
                        return `<div class="font-medium whitespace-no-wrap">${data}</div>`;
                    }
                }
                , {
                    data: 'is_active'
                    , name: 'is_active'
                    , render: function(data, type, row, meta) {
                        var attr = `data-id="${ row['id'] }" data-status="${ data }"`;
                        var avtive_data = actionActiveButton(data, attr);
                        return avtive_data;
                    }
                },

                {
                    data: 'id'
                    , name: 'id',
                    // visible:false,
                    render: function(data, type, row, meta) {

                        var edit_url = `{{ url('/') }}/admin/properties/` + row['id'] +
                            `/edit/?tab=edit`;
                        var show_url = `{{ url('/') }}/admin/properties/` + row['id'] +
                            `?tab=details`;
                        var button = actionButton(edit_url, row['id']);

                        // var edit_data = actionEditButton(edit_url, row['id']);
                        // var show_data = actionShowButton(show_url);
                        // // var show_home = actionHomeButton(row['id']);

                        // var del_data = actionDeleteButton(row['id']);
                        // return `<div class="flex justify-left items-center"> ${show_data} ${edit_data} ${del_data} </div>`;

                        return `<div class="flex justify-left items-center"> ${button} </div>`;

                    }
                }
            , ]
        , });
    });

    $(document).on('click', '.clsdelete', function() {
        var id = $(this).attr('data-id');
        var e = $(this).parent().parent();
        var url = `{{ url('/') }}/admin/properties/` + id;
        tableDeleteRow(url, oTable);
    });

    $(document).on('click', '.clsstatus', function() {
        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        var url = `{{ url('/') }}/admin/properties/status/` + id + `/` + status;
        tableChnageStatus(url, oTable);
    });

</script>



<script>
    $('#extraSearch').on('click', function() {
        //extraSearch is id of search button....
        oTable.draw();
    });

    $(document).on('click', '#searchReset', function(e) {
        $('#filter_data').trigger("reset");
        e.preventDefault();
        oTable.draw();
    });

    $(document).on('click', '.drawerReset', function(e) {
        $('#filter_data').trigger("reset");
        e.preventDefault();
        oTable.draw();
    });

    $(document).ready(function() {
        $('#filter_data').trigger("reset");
        oTable.draw();
    });

    $(document).on('click', '#search_filter_excel_download', function(e) {
        var export_type = $(this).attr('data-type');
        console.log(export_type);
        $('#export_type').val(export_type);
        $('#filter_data').submit();
    });

    // function resetForm() {
    //  document.getElementById("AddProperty").reset();
    // }

    // $(document).on('click', '#add_property_btn', function(e) {
    //     console.log('hello');
    // });


    $(document).ready(function() {
        $(document).on('click', '#add_property_btn', function(e) {
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var title = $("#title").val();
            var rent = $("#rent").val();
            var address = $("#address").val();
            var size = $("#size").val();
            var room_category = $("#room_category").val();
            var additional_facilities = $("#additional_facilities").val();
            var apt_overview = $("#apt_overview").val();
            var features = $("#features").val();

            $.ajax({
                url: "{{ route('admin.properties.add_property') }}"
                , type: 'POST'
                , data: {
                    _token: _token
                    , title: title
                    , rent: rent
                    , address: address
                    , size: size
                    , room_category: room_category
                    , additional_facilities: additional_facilities
                    , apt_overview: apt_overview
                    , features: features
                , }
                , success: function(response) {
                    // console.log(response.error)
                    if ($.isEmptyObject(response.error)) {

                        // alert(response.success);
                        // $("#AddProperty")[0].reset();

                        document.getElementById("AddProperty").reset();
                        $(".print-error-msg").css('display', 'none');
                        $(".error-text").css('display', 'none');

                        document.getElementById("add_new_properties").style.display = 'none';
                        oTable.draw();
                    } else {
                        $(".error-text").css('display', 'block');
                        printErrorMsg(response.error);
                        printErrorsMsg(response.error);
                        // printErrorMsg(response.error);
                    }
                },

            });

            function printErrorsMsg(msg) {

                $(".print-error-msg").find("ul").html('');

                $(".print-error-msg").css('display', 'block');

                $.each(msg, function(key, value) {

                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

                });

            }

            function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                // console.log(value);
                $('.' + key + '_err').text(value);
            });



            }
        });



    });

</script>
@endpush
