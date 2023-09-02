@extends('../includes.header')

@section('content')
    <script>
        $(document).ready(function() {


            var branch_name_code = ['One', 'Two'];


            var theme = 'classic';
            jQuery("#case_type").jqxComboBox({
                theme: theme,
                autoOpen: false,
                autoDropDownHeight: false,
                dropDownHeight: 100,
                promptText: "",
                source: branch_name_code,
                width: "250px",
                height: 25
            });

            jQuery("#branch_name_code").jqxComboBox({
                theme: theme,
                autoOpen: false,
                autoDropDownHeight: false,
                dropDownHeight: 100,
                promptText: "",
                source: branch_name_code,
                width: "250px",
                height: 25
            });

            jQuery("#hc_division").jqxComboBox({
                theme: theme,
                autoOpen: false,
                autoDropDownHeight: false,
                dropDownHeight: 100,
                promptText: "",
                source: branch_name_code,
                width: "250px",
                height: 25
            });

            jQuery("#case_category").jqxComboBox({
                theme: theme,
                autoOpen: false,
                autoDropDownHeight: false,
                dropDownHeight: 100,
                promptText: "",
                source: branch_name_code,
                width: "250px",
                height: 25
            });


            jQuery("#present_status").jqxComboBox({
                theme: theme,
                autoOpen: false,
                autoDropDownHeight: false,
                dropDownHeight: 100,
                promptText: "",
                source: branch_name_code,
                width: "250px",
                height: 25
            });
            jQuery("#request_type").jqxComboBox({
                theme: theme,
                autoOpen: false,
                autoDropDownHeight: false,
                dropDownHeight: 100,
                promptText: "",
                source: branch_name_code,
                width: "250px",
                height: 25
            });

            jQuery("#district").jqxComboBox({
                theme: theme,
                autoOpen: false,
                autoDropDownHeight: false,
                dropDownHeight: 100,
                promptText: "",
                source: branch_name_code,
                width: "250px",
                height: 25
            });


            jQuery('#case_type,#branch_name_code').focusout(function() {
                commbobox_check(jQuery(this).attr('id'));
            });


            function initGrid() {
                var source = {
                    datatype: "json",
                    datafields: [{
                            name: 'id',
                            type: 'int'
                        },
                        {
                            name: 'proposed_type',
                            type: 'string'
                        },
                        {
                            name: 'cb_number',
                            type: 'string'
                        },
                        {
                            name: 'account_number',
                            type: 'string'
                        },
                        {
                            name: 'petitioner',
                            type: 'string'
                        },
                        {
                            name: 'account_name',
                            type: 'string'
                        },
                        {
                            name: 'accused_name',
                            type: 'string'
                        },
                        {
                            name: 'branch_name_code',
                            type: 'string'
                        },
                        {
                            name: 'case_filing_date',
                            type: 'string'
                        },
                        {
                            name: 'case_number',
                            type: 'string'
                        },
                        {
                            name: 'hc_division',
                            type: 'string'
                        },
                        {
                            name: 'case_category',
                            type: 'string'
                        },
                        {
                            name: 'case_type',
                            type: 'string'
                        },
                        {
                            name: 'present_status',
                            type: 'string'
                        },
                        {
                            name: 'request_type',
                            type: 'string'
                        },
                        {
                            name: 'district',
                            type: 'string'
                        },
                        {
                            name: 'suit_value',
                            type: 'string'
                        },
                        {
                            name: 'created_at',
                            type: 'string'
                        },


                    ],
                    addrow: function(rowid, rowdata, position, commit) {
                        commit(true);
                    },
                    deleterow: function(rowid, commit) {
                        commit(true);
                    },
                    updaterow: function(rowid, newdata, commit) {
                        commit(true);
                    },

                    url: "{{ route('grid') }}",
                    cache: false,
                    filter: function() {
                        // update the grid and send a request to the server.
                        jQuery("#jqxgrid").jqxGrid('updatebounddata', 'filter');
                    },
                    sort: function() {
                        // update the grid and send a request to the server.
                        jQuery("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                    },
                    root: 'Rows',
                    beforeprocessing: function(data) {

                    }

                };

                var dataadapter = new jQuery.jqx.dataAdapter(source, {
                    loadError: function(xhr, status, error) {
                        alert(error);
                    },
                    formatData: function(data) {

                        var sell_no_grid_search = jQuery.trim(jQuery('#sell_no_grid_search').val());


                        jQuery.extend(data, {
                            sell_no_grid_search: sell_no_grid_search,

                        });
                        return data;
                    }
                });
                var columnCheckBox = null;
                var updatingCheckState = false;
                // initialize jqxGrid. Disable the built-in selection.
                var celledit = function(row, datafield, columntype) {
                    var checked = jQuery('#jqxgrid').jqxGrid('getcellvalue', row, "available");
                    if (checked == false) {
                        return false;
                    };
                };

                var win_h = jQuery(window).height() - 310;
                jQuery("#jqxgrid").jqxGrid({
                    width: '100%',
                    height: win_h,
                    source: dataadapter,
                    theme: theme,
                    filterable: true,
                    sortable: true,
                    pageable: true,
                    virtualmode: true,
                    editable: true,
                    rowdetails: false,
                    enablebrowserselection: true,
                    selectionmode: 'none',
                    rendergridrows: function(obj) {
                        return obj.data;
                    },

                    columns: [



                        {
                            text: 'D',
                            menu: false,
                            datafield: 'Delete',
                            align: 'center',
                            editable: false,
                            sortable: false,
                            width: '3%',
                            cellsrenderer: function(row) {
                                editrow = row;
                                var dataRecord = jQuery("#jqxgrid").jqxGrid('getrowdata', editrow);

                                return '<div style="text-align:center;margin-top: 5px;  cursor:pointer" onclick="details(' +
                                    dataRecord.id +
                                    ',\'delete\')" ><img width="25px" align="center" src="{{ asset('') }}images/delete.png"></div>';

                            }
                        },
                        {
                            text: 'P',
                            menu: false,
                            datafield: 'Preview',
                            align: 'center',
                            editable: false,
                            sortable: false,
                            width: '3%',
                            cellsrenderer: function(row) {
                                editrow = row;
                                var dataRecord = jQuery("#jqxgrid").jqxGrid('getrowdata', editrow);

                                return '<div style="text-align:center;margin-top: 5px;  cursor:pointer" onclick="details(' +
                                    dataRecord.id +
                                    ',\'details\')" ><img width="25px" align="center" src="{{ asset('') }}images/file.png"></div>';

                            }
                        },

                        {
                            text: 'E',
                            menu: false,
                            datafield: 'Edit',
                            align: 'center',
                            editable: false,
                            sortable: false,
                            width: '3%',
                            cellsrenderer: function(row) {
                                editrow = row;
                                var dataRecord = jQuery("#jqxgrid").jqxGrid('getrowdata', editrow);

                                return '<div style="text-align:center;margin-top: 5px;  cursor:pointer" onclick="edit(' +
                                    dataRecord.id +
                                    ',\'details\')" ><img width="25px" align="center" src="{{ asset('') }}images/edit.png"></div>';

                            }
                        },

                        {
                            text: 'CB Number',
                            datafield: 'cb_number',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },

                        {
                            text: 'Account Number',
                            datafield: 'account_number',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },

                        {
                            text: 'Petitioner',
                            datafield: 'petitioner',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },

                        {
                            text: 'Account Name',
                            datafield: 'account_name',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },

                        {
                            text: 'Accused Name',
                            datafield: 'accused_name',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },

                        {
                            text: 'Branch Code',
                            datafield: 'branch_name_code',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },

                        {
                            text: 'Case Filing Date',
                            datafield: 'case_filing_date',
                            hidden: false,
                            editable: false,
                            width: '20%'
                        },

                        {
                            text: 'Case Number',
                            datafield: 'case_number',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },

                        {
                            text: 'Division',
                            datafield: 'hc_division',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },

                        {
                            text: 'Case Category',
                            datafield: 'case_category',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },
                        {
                            text: 'Case Type',
                            datafield: 'case_type',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },
                        {
                            text: 'Present Status',
                            datafield: 'present_status',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },
                        {
                            text: 'Request Type',
                            datafield: 'request_type',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },
                        {
                            text: 'District',
                            datafield: 'district',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },
                        {
                            text: 'Suit Value',
                            datafield: 'suit_value',
                            hidden: false,
                            editable: false,
                            width: '10%'
                        },
                        {
                            text: 'Entry Date',
                            datafield: 'created_at',
                            hidden: false,
                            editable: false,
                            width: '20%'
                        },

                    ],
                });
            };
            var initWidgets = function(tab) {
                switch (tab) {
                    case 0:
                        break;
                    case 1:
                        initGrid();
                        clear_form();
                        break;
                }
            }
            jQuery('#jqxTabs').jqxTabs({
                width: '100%',
                initTabContent: initWidgets
            });
            jQuery('#jqxTabs').bind('selected', function(event) {});



            jQuery("#details").jqxWindow({
                theme: theme,
                width: 1000,
                height: 600,
                resizable: false,
                isModal: true,
                autoOpen: false,
                cancelButton: jQuery("#details_cancel,#deletecancel")
            });


            var rules = [{
                input: '#cb_number',
                message: 'required!',
                action: 'keyup, blur, change',
                rule: function(input, commit) {
                    if (jQuery("#cb_number").val() == '') {
                        return false;
                    } else {
                        return true;
                    }
                }
            }, ];

            jQuery("#in_up_button").click(function() {
                jQuery('#form_action').jqxValidator({
                    rules: rules,
                    theme: theme
                });
                var validationResult = function(isValid) {
                    if (isValid) {
                        jQuery("#in_up_button").hide();
                        jQuery("#in_up_loading").show();
                        call_ajax_submit();
                    }
                }
                jQuery('#form_action').jqxValidator('validate', validationResult);
            });

        });


        function datePicker(id) {
            jQuery(document).ready(function() {
                jQuery("*").dblclick(function(e) {
                    e.preventDefault();
                });
                jQuery('#' + id).datepicker({
                    beforeShow: function(i) {
                        if (jQuery(i).attr('readonly')) {
                            return false;
                        }
                    },
                    inline: true,
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'dd/mm/yy',
                    showOn: "button",
                    buttonImageOnly: true,
                    showButtonPanel: true
                });
            });

        }

        function commbobox_check(id) // for set combox value && clean if typed wrong
        {
            var item = jQuery('#' + id).jqxComboBox('getSelectedItem');
            //console.log(item);
            if (item != null && jQuery('#' + id).val() != '') {
                jQuery("input[name='" + id + "']").val(item.value);
                if (item.value != jQuery('#' + id).val()) {
                    jQuery('#' + id).val('');
                    jQuery("input[name='" + id + "']").val('');
                    jQuery('#' + id).jqxComboBox('clearSelection');
                }
            } else {
                jQuery('#' + id).val('');
                jQuery("input[name='" + id + "']").val('');
                jQuery('#' + id).jqxComboBox('clearSelection');
            }
        }

        function call_ajax_submit() {

            var postdata = jQuery('#form_action').serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            jQuery.ajax({
                type: "POST",
                cache: true,
                url: "{{ route('add') }}",
                data: {
                    postdata: postdata,
                },

                async: true,
                success: function(response) {

                    if (response.status != 'Ok') {

                    } else {

                        toastr.success('Data Save Successfully!', 'ADD', {
                            timeOut: 1000,

                        })
                        jQuery('#jqxTabs').jqxTabs('select', 1);
                        jQuery("#jqxgrid").jqxGrid('updatebounddata');

                        jQuery("#in_up_button").show();
                        jQuery("#in_up_loading").hide();
                        clear_form();
                    }




                }
            });
        }

        function clear_form() {

            jQuery('#add_edit').val('add');
            jQuery('#cb_number').val('');
            jQuery('#account_number').val('');
            jQuery('#petitioner').val('');
            jQuery('#account_name').val('');
            jQuery('#accused_name').val('');
            jQuery('#case_filing_date').val('');
            jQuery('#case_number').val('');
            jQuery('#suit_value').val('');

            jQuery("#branch_name_code").jqxComboBox('clearSelection');
            jQuery("#hc_division").jqxComboBox('clearSelection');
            jQuery("#case_category").jqxComboBox('clearSelection');
            jQuery("#case_type").jqxComboBox('clearSelection');
            jQuery("#present_status").jqxComboBox('clearSelection');
            jQuery("#district").jqxComboBox('clearSelection');



        }

        function details(id, operation) {

            jQuery('#deleteEventId').val(id);
            jQuery('#type').val(operation);

            if (operation == 'details') {
                jQuery("#header_title").html('Details');
                jQuery("#close_btn_row").show();
                jQuery("#delete_row").hide();


            }
            if (operation == 'delete') {
                jQuery("#header_title").html('Delete');
                jQuery("#close_btn_row").hide();
                jQuery("#delete_row").show();

            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            jQuery.ajax({
                type: "POST",
                cache: true,
                url: "{{ route('get_details') }}",
                data: {
                    id: id,
                    operation: operation
                },
                datatype: "json",
                async: true,
                success: function(response) {

                    if (response.status != 'Ok') {

                    } else {
                        jQuery("#preview_details_table").html(response.html);
                        document.getElementById("details").style.visibility = 'visible';
                    }
                }
            });

            jQuery("#details").jqxWindow('open');

        }
    </script>




    <div id='jqxTabs'>
        <ul>
            <li style="margin-left: 30px;">Form</li>
            <li>Data Grid</li>
        </ul>
        <div style="padding: 10px;">
            <form method="POST" name="form_action" id="form_action" style="margin:0px;" enctype="multipart/form-data">

                <input type="hidden" name="add_edit" id="add_edit" value="">
                <table>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Customer ID</td>
                        <td width="30%" style=""><input name="cb_number" type="text" class=""
                                style="width:250px" id="cb_number" value="" placeholder="CB Number" /></td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Account Number</td>
                        <td width="30%" style=""><input name="account_number" type="text" class=""
                                style="width:250px" id="account_number" value="" placeholder="Account Number" /></td>

                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Name of Petitioner<span style="color:red">*</span>
                        </td>
                        <td width="30%" style=""><input name="petitioner" type="text" class=""
                                style="width:250px" id="petitioner" value="" placeholder="Name of Petitioner" /></td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Name of Customer<span style="color:red">*</span></td>
                        <td width="30%" style=""><input name="account_name" type="text" class=""
                                style="width:250px" id="account_name" value="" placeholder="Name of Account" /></td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Name of the Pespondent<span style="color:red">*</span>
                        </td>
                        <td width="30%" style=""><input name="accused_name" type="text" class=""
                                style="width:250px" id="accused_name" value="" placeholder="Name of the Pespondent" />
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Branch Name & BR. Code<span style="color:red">*</span>
                        </td>
                        <td width="30%" style="">
                            <div id="branch_name_code" name="branch_name_code"></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Case Filing Date<span style="color:red">*</span></td>
                        <td width="30%" style="">
                            <input name="case_filing_date" type="date" class="" id="case_filing_date"
                                value="" style="width:250px" placeholder="dd/mm/yyyy" />

                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Case Number<span style="color:red">*</span></td>
                        <td width="30%" style="">
                            <input name="case_number" type="text" tabindex="1" class="" style="width:250px;"
                                id="case_number" placeholder="case number" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">HCD/AD Division<span style="color:red">*</span>
                        </td>
                        <td width="30%" style="">
                            <div id="hc_division" name="hc_division"></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Case Category<span style="color:red">*</span></td>
                        <td width="30%" style="">
                            <div id="case_category" name="case_category">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Case Type<span style="color:red">*</span></td>
                        <td width="30%" style="">
                            <div id="case_type" name="case_type"></div>
                        </td>
                    </tr>
                    <tr>

                        <td width="20%" style="font-weight: bold;">Present Status<span style="color:red">*</span></td>
                        <td width="30%" style="">
                            <div id="present_status" name="present_status"></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Case File By/Against <span
                                style="color:red">*</span></td>
                        <td width="30%" style="">
                            <div id="request_type" name="request_type"></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">District as per BR Name</td>
                        <td width="30%" style="">
                            <div id="district" name="district"></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight: bold;">Suit Value</td>
                        <td width="30%" style=""><input name="suit_value" type="text" class=""
                                style="width:250px" id="suit_value" value="" placeholder="Suit Value" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button id="in_up_button" type="button" class="btn btn-round btn-success">Save</button>

                            <span id="in_up_loading" style="display:none">Please wait...<img width="90px"
                                    src="{{ asset('') }}images/loader.gif" align="bottom"></span>


                        </td>
                    </tr>
                </table>

            </form>
        </div>
        <div>

            <div
                style="padding: 0.5%;width:100%;height:50px; border:1px solid #c0c0c0;font-family: Calibri;font-size: 14px">
                <input type="hidden" id="hidden_loan_ac_grid" value="" name="hidden_loan_ac_grid">
                <table id="deal_body" style="display:block;width:100%">
                    <tr>

                        <td style="text-align:right;width:8%"><strong>CB Number</strong></td>
                        <td style="width:10%">
                            <input type="text" id="" value="">
                        </td>

                        <td style="text-align:right;width:8%"><strong>Account Number</strong></td>
                        <td style="width:10%">
                            <input type="text" id="" value="">
                        </td>

                        <td style="text-align:right;width:8%"><strong>Petitioner</strong></td>
                        <td style="width:10%">
                            <input type="text" id="" value="">
                        </td>

                        <td style="text-align:right;width:8%"><strong>Branch Code</strong></td>
                        <td style="width:10%">
                            <input type="text" id="" value="">
                        </td>


                        <td style="text-align:right;width:5%">
                            <input type='button' class="btn btn-sm btn-primary" id='grid_search' name='grid_search'
                                value='Search' onclick="search_data()" />
                            <span id="grid_loading" style="display:none">Please wait... <img src="images/loader.gif"
                                    align="bottom"></span>
                        </td>
                    </tr>
                </table>
            </div>


            <div style="border:none;" id="jqxgrid"></div>

            <div style="float:left;padding-top: 5px;">
                <div style="font-family: Calibri; margin: 0 0 -10px 0;font-size:14px;color:#0000cc">
                    <strong>D = </strong>Delete,&nbsp;
                    <strong>P = </strong> Preview,&nbsp;
                    <strong>E = </strong>Edit&nbsp;
                </div> <br />
            </div>


        </div>
    </div>



    <div id="details" style="visibility:hidden;">
        <div style="padding-left: 17px"><strong><label id="header_title"></label></strong></div>

        <form method="POST" name="details_action_from" id="details_action_from" style="margin:0px;">
            <input name="deleteEventId" id="deleteEventId" value="" type="hidden">
            <input name="action_id" id="action_id" value="" type="hidden">
            <input name="option" id="option" value="" type="hidden">

            <div id="preview_details_table"></div>

            <div id="close_btn_row" style="text-align:center;margin-bottom: 20px;font-family:calibri;font-size:15px;">
                <input type="button" class="btn btn-glow-danger btn-danger" id="details_cancel" onclick="close()"
                    value="Cancel" />
            </div>

            <div id="delete_row" style="text-align:center;margin-bottom:30px;width:100%;">
                <strong style="vertical-align:top">Delete Reason<span style="color: red;">*</span></strong>
                <textarea cols="50" rows="5" class="" name="comments" id="comments"></textarea>
                </br></br>


                <input type="button" class="btn btn-glow-primary btn-primary" id="delete_button" value="Delete" />
                <input type="button" class="btn btn-glow-danger btn-danger" id="deletecancel" onclick="close()"
                    value="Cancel" />

                <span id="delete_loading" style="display:none">Please wait... <img
                        src="{{ asset('') }}images/loader.gif" align="bottom"></span>
            </div>



        </form>

    </div>
@endsection
