$(document).ready(function() { 	

    //--------------- Data tables ------------------//
    if($('table').hasClass('dynamicTable')){
        $('.dynamicTable').dataTable( {
            "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bAutoWidth": false,
            "oLanguage": {
                "sSearch": "<span></span> _INPUT_",
                "sLengthMenu": "<span>_MENU_</span>",
                "oPaginate": {
                    "sFirst": "First", 
                    "sLast": "Last"
                }
            }
        });

        $('.dataTables_length select').uniform();
        $('.dataTables_paginate > ul').addClass('pagination');
        $('.dataTables_filter>label>input').addClass('form-control');
    }

    if($('table').hasClass('tableTools')){
        $('.tableTools').dataTable( {
            "sDom": "<'row'<'col-lg-4'l><'col-lg-4'T><'col-lg-4'f>r>t<'row'<'col-lg-4'i><'col-lg-4'i><'col-lg-4'p>>",
            "oTableTools": {
                "sSwfPath": "plugins/tables/dataTables/swf/copy_csv_xls_pdf.swf",
                "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": 'Save <span class="caret" />',
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
                ]
            },
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bAutoWidth": false,
            "oLanguage": {
                "sSearch": "<span></span> _INPUT_",
                "sLengthMenu": "<span>_MENU_</span>",
                "oPaginate": {
                    "sFirst": "First", 
                    "sLast": "Last"
                }
            }
        });
        $('.dataTables_length select').uniform();
        $('.dataTables_paginate > ul').addClass('pagination');
        $('.dataTables_filter>label>input').addClass('form-control');
    }

    // Set the classes that TableTools uses to something suitable for Bootstrap
    $.extend( true, $.fn.DataTable.TableTools.classes, {
        "container": "btn-group",
        "buttons": {
            "normal": "btn",
            "disabled": "btn disabled"
        },
        "collection": {
            "container": "DTTT_dropdown dropdown-menu",
            "buttons": {
                "normal": "",
                "disabled": "disabled"
            }
        }
    } );

    // Have the collection use a bootstrap compatible dropdown
    $.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
        "collection": {
            "container": "ul",
            "button": "li",
            "liner": "a"
        }
    } );


});//End document ready functions