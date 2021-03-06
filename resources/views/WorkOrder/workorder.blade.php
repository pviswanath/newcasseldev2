@extends('layouts.app')
<head xmlns="http://www.w3.org/1999/html">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

@section('content')


    {!! Form::open(['url' => '/workorder/storeData']) !!}

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-2">
                <br> <br>
                <div class="panel panel-default">
                    <div class="panel-heading"> Work Order Form</div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors-> all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="panel-body">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input type="hidden" name="supplyData" id="supplyData" value="">

                        {!! Form::label('requester', 'Requestor:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-3 col-md-6 col-md-pull-3">
                            {!! Form::text('requestor_name',null,['class'=>'form-control input-sm','placeholder' => 'Name','id' => 'requestername']) !!}
                        </div>

                        </br> </br>


                        {!! Html::decode(Form::label('cntr_name', '<span style="color: red;">*</span>Center Name:', ['class' => 'col-md-3 control-label'])) !!}
                        <div class="col-md-offset-3 col-md-6 col-md-pull-3">
                            <div class="form-group">
                                {{ Form::select('cntr_name', array_merge([0 => 'Please Select']) + $centers, 'default',
                                ['class' => 'col-md-offset-3 col-md-6 col-md-pull-3','required' => 'required','id' => 'center_dropdown']) }}
                            </div>
                        </div>

                        </br> </br>


                        {!! Form::label('apartment no', 'Apartment No:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-3 col-md-6 col-md-pull-3">
                            {{ Form::select('apt_id', array_merge([0 => 'Please Select']), 'default',
                            ['class' => 'col-md-offset-3 col-md-6 col-md-pull-3','id' => 'apartment_dropdown']) }}
                        </div>

                        </br> </br>

                        {!! Form::label('residentname', 'Resident Name:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-3 col-md-6 col-md-pull-3">
                            {{ Form::select('residentname', array_merge([0 => 'Please Select']),
                            'default', ['class' =>'col-md-offset-3 col-md-6 col-md-pull-3','id' => 'residentname_dropdown']) }}
                        </div>

                        </br> </br>

                        {!! Form::label('commonarea', 'Common Area/System:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-3 col-md-6 col-md-pull-3">
                            {{ Form::select('ca_id', array_merge([0 => 'Please Select']), 'default',
                            ['class' =>'col-md-offset-3 col-md-6 col-md-pull-3','id' => 'commonarea_dropdown']) }}
                        </div>


                        </br> </br>

                        {!! Form::label('resident_comments', 'Resident Comments:' ,['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-1 col-md-8 col-md-pull-1">
                            {!! Form::text('resident_comments',null,
                            ['class'=>'col-md-offset-1 col-md-8 col-md-pull-1 form-control','readonly','id' => 'resident_comments']) !!}
                        </div>

                        </br> </br>


                        {!! Form::label('status', 'Status:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-3 col-md-6 col-md-pull-3">
                            {!! Form::select('order_status', ['Open' => 'Open'],
                              'default', array('class' => 'col-md-offset-3 col-md-6 col-md-pull-3')) !!}
                        </div>

                        </br> </br>


                        {!! Form::label('priority', 'Priority:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-3 col-md-6 col-md-pull-3">
                            {!! Form::select('order_priority', ['Please Select' => 'Please Select', 'Low' => 'Low', 'Moderate' => 'Moderate', 'High' => 'High'],
                            'default', array('class' => 'col-md-offset-3 col-md-6 col-md-pull-3')) !!}
                        </div>


                        </br> </br>


                        {!!  Form::label('issuetype', 'Issue Type:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-3 col-md-6 col-md-pull-3">
                            {{ Form::select('issuetype', array_merge([0 => 'Please Select']) + $issuetypes, 'default',
                            ['class'=>'col-md-offset-3 col-md-6 col-md-pull-3','id' => 'issuetype_dropdown']) }}
                        </div>

                        </br> </br>

                        {!! Form::label('issuedescription', 'Issue Description:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-1 col-md-8 col-md-pull-1">
                            {!! Form::text('issuedescription',null,
                            ['class'=>'col-md-offset-1 col-md-8 col-md-pull-1 form-control','readonly','id' => 'issuedescription']) !!}
                        </div>

                        </br> </br>

                        {!! Form::label('wodescription', 'Work Order Description:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-1 col-md-8 col-md-pull-1">
                            {!! Form::text('order_description',null,
                            ['class'=>'form-control col-md-offset-1 col-md-8 col-md-pull-1','placeholder' => 'Briefly describe your issue']) !!}
                        </div>

                        </br> </br>

                        {!! Form::label('assigntype', 'Assign To:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-3 col-md-6 col-md-pull-3">
                            {{ Form::select('assign_user_id', array_merge([0 => 'Please Select']) + $workers, 'default',
                             ['class'=>'col-md-offset-3 col-md-6 col-md-pull-3','id' => 'assigntype_dropdown']) }}
                        </div>

                        </br> </br>


                        {!! Form::label('toolsused', 'Tools used:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-offset-1 col-md-8 col-md-pull-1">
                            {{ Form::select('toolsused_id[]', $toolsdata,
                              'default',
                              array('id' => 'tools_data[]', 'multiple'=>'multiple', 'class'=>'col-md-offset-1 col-md-8 col-md-pull-1')) }}
                        </div>

                        </br> </br>
                    </div>

                    <div class="row">
                        <!-- panel preview -->
                        <div class="col-md-5 col-md-offset-1">

                            <div class="panel panel-default">
                                <div class="panel-heading">Supply Information</div>
                                <div class="panel-body form-horizontal payment-form">
                                    <div class="form-group">
                                        <label for="concept" class="col-md-4 control-label">Supply Name</label>
                                        <div class="col-md-8">
                                            {{ Form::select('supply', array_merge([0 => 'Please Select']) + $suppliesdata,
                                           'default', ['class'=>'col-md-8 form-control','id' => 'supply_dropdown']) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount" class="col-md-4 control-label">Unit Price</label>
                                        <div class="col-md-7 col-md-offset-1 input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control" placeholder="unitprice"
                                                   id="unitprice" name="unitprice"
                                                   readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-md-4 control-label">Unit</label>
                                        <div class="col-md-8">
                                            <input type="text" class="col-md-8 form-control" id="unit" name="unit" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-md-4 control-label">Total</label>
                                        <div class="col-md-8">
                                            <input type="text" class="col-md-8 form-control" id="total" name="total" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 text-left">
                                            <button id="addDetails" type="button"
                                                    class="btn btn-default preview-add-button">
                                                <span class="glyphicon glyphicon-plus"></span> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-offset-1 col-md-5 col-md-pull-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Supply Summary</div>
                                    <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataSupplyTable" class="table preview-table">
                                            <thead>
                                            <tr>
                                                <th>Supply Name</th>
                                                <th>Unit</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <br><br><br><br>
                                    {!! Form::label('totalOrderAmountLabel', 'Work Order Total Cost:' ,['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('order_total_cost',null,
                                         ['class' => 'col-md-8 form-control','readonly','id' => 'totalOrderAmount']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group" style="text-align: center">
                        {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
                        {{--{!! Form::button('Reset', ['type' => 'reset', 'class' => 'btn btn-default']) !!}--}}
                    </div>

                </div>
            </div>
        </div>

    </div>

    {!! Form::close() !!}
@endsection

@section('footer')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function ($) {
            $('select').select2();
            $('#datetime').datepicker();

            $("#tools_data").select2({
                placeholder: "Please Select",
                tags: true
            })
        });

        function validateOnSave() {
            var rc = true;
            if ($("select#sb_id").val() === "") {
                alert("Please select a Type");
                rc = false;
            } else if ($("input#x_number").val() === "") {
                alert("Please input a X-number");
                rc = false;
            }
            return rc;
        }

        $('#center_dropdown').change(function () {
            // var selectedCenterIndex;
            data = {option: $(this).val()};
            selectedCenterIndex = data;
            //Apartment fetch
            $.get("/getAptDetails", data, function (data) {
                console.log(data);

                var apartment_data = $('#apartment_dropdown');
                $("#apartment_dropdown").empty();

                apartment_data.append($("<option></option>")
                    .attr("value", 0)
                    .text("Please Select"));

                $.each(data, function (key, value) {
                    apartment_data.append($("<option></option>")
                        .attr("value", key)
                        .text(value));
                });
                $('#apartment_dropdown').val(0).change();

            });
            // data = null;
            // data = selectedCenterIndex;
            //Common area fetch
            $.get("/getComAreaDetails", data, function (data) {
                var commonarea_data = $('#commonarea_dropdown');
                $("#commonarea_dropdown").empty();

                commonarea_data.append($("<option></option>")
                    .attr("value", 0)
                    .text("Please Select"));

                $.each(data, function (key, value) {
                    commonarea_data.append($("<option></option>")
                        .attr("value", key)
                        .text(value));
                });
                $('#commonarea_dropdown').val(0).change();

            });


        });

        $('#apartment_dropdown').change(function () {
            if ($("#apartment_dropdown").val() != 0) {
                //Disable commonarea dropdown
                $("#commonarea_dropdown").attr('disabled', true);

                data = {option: $(this).val()};
                $.get("/getResidentName", data, function (data) {
                    //Check if data is empty, then no need to store/display users, also clear any old values
                    var resident_data = $('#residentname_dropdown');
                    $("#residentname_dropdown").empty();
                    if (data.length != 0) {
                        $.each(data, function (key, value) {
                            resident_data.append($("<option></option>")
                                .attr("value", key)
                                .text(value));
                        });
                        //Show the first index upon change
                        $('#residentname_dropdown').val(Object.entries(data)[0][0]).change();
                    } else {
                        resident_data.append($("<option></option>")
                            .attr("value", 0)
                            .text("Resident not occupied"));
                        $('#residentname_dropdown').val(0).change();
                    }
                });
            } else {
                //Empty resident information
                $("#residentname_dropdown").empty();
                $("#residentname_dropdown").append($("<option></option>")
                    .attr("value", 0)
                    .text("Please Select"));
                $('#residentname_dropdown').val(0).change();

                //Disable commonarea dropdown
                $("#commonarea_dropdown").attr('disabled', false);
            }
        });

        $('#issuetype_dropdown').change(function () {
            data = {option: $(this).val()};

            $.get("/getIssueDesc", data, function (data) {
                $("#issuedescription").val(data);
            });
        });

        $('#residentname_dropdown').change(function () {
            data = {option: $(this).val()};

            $.get("/getresidentComments", data, function (data) {
                $("#resident_comments").val(data);
            });
        });

        $('#supply_dropdown').change(function () {
            data = {option: $(this).val()};


            $.get("/getUnitPrice", data, function (data) {
                $("#unitprice").val(data);
            });
            var selectedIndex = $('#supply_dropdown option:selected').val();
            if (selectedIndex == 0) {
                $("#unit").attr("disabled", true);
            } else {
                $("#unit").attr("disabled", false);
            }
        });


        //Commonarea condition
        $('#commonarea_dropdown').change(function () {
            var selectedIndex = $("#commonarea_dropdown option:selected").val();
            if (selectedIndex != 0) {
                $("#apartment_dropdown").attr("disabled", true);
                $('#residentname_dropdown').attr("disabled", true);
                $('#res_comments').attr("disabled", true);
                $('#res_comments').val("");
                $("#apartment_dropdown option:eq(0)").prop("selected", true).change();
                $("#residentname_dropdown option:eq(0)").prop("selected", true).change();

            } else {
                $("#apartment_dropdown").attr("disabled", false);
                $('#residentname_dropdown').attr("disabled", false);
                $('#res_comments').attr("disabled", false);
            }
        });


        $('#addDetails').click(function () {
            if ($("#supply_dropdown option:selected").val() != 0 && $("#unit").val() != '' && $("#unit").val() > 0) {

                var order_data = {};
                order_data["SupplyName"] = $("#supply_dropdown option:selected").text();
                order_data["unit"] = $("#unit").val();
                order_data["unitPrice"] = "$" + $("#unitprice").val();
                order_data["total"] = $("#total").val();
                order_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';

                var row = $('<tr></tr>');
                $.each(order_data, function (type, value) {
                    $('<td name =' + type + ' class="input-' + type + '"></td>').html(value).appendTo(row);
                });
                $('.preview-table > tbody:last').append(row);

                calculateTotalAmount();

                //Clear the supply information
                $('#total').val("");
                $('#unit').val("");
                $('#unitprice').val("");
                $("#unit").attr("disabled", true);
                $("#supply_dropdown option:eq(0)").prop("selected", true).change();


                var tableData = $.param($('#dataSupplyTable td').map(function () {
                    return {
                        name: $(this).attr('name'),
                        value: $(this).text().trim()
                    };
                }));

                $("#supplyData").val("" + tableData + "");
                console.log(tableData);
            }
        });

        $('#unit').change(function () {

            if ($('#unit').val() > 0) {

                var totalAmount = $('#unit').val() * $('#unitprice').val();
                totalAmount = totalAmount.toFixed(2);
                $('#total').val(totalAmount);
            }
        });

        $(document).on('click', '.input-remove-row', function () {
            var tr = $(this).closest('tr');
            tr.remove();
            calculateTotalAmount();
            var tableData = $.param($('#dataSupplyTable td').map(function () {
                return {
                    name: $(this).attr('name'),
                    value: $(this).text().trim()
                };
            }));

            $("#supplyData").val("" + tableData + "");
            console.log(tableData);
        });

        function calculateTotalAmount() {
            var totalSum = 0;
            $('.input-total').each(function () {
                totalSum += parseFloat($(this).text());
            });
            totalSum = totalSum.toFixed(2);
            $("#totalOrderAmount").val(totalSum);
        }

    </script>
@endsection