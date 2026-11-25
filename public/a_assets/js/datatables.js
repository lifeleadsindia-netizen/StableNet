$(function (e) {
    'use strict';

    // Suppress DataTables alert popups in favor of silent console handling
    if ($.fn.dataTable && $.fn.dataTable.ext) {
        $.fn.dataTable.ext.errMode = 'none';
    }

    // basic datatable
    if ($('#datatable-basic').length && !$.fn.DataTable.isDataTable('#datatable-basic')) {
        $('#datatable-basic').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            "pageLength": 10,
            scrollX: true
        });
    }

    // responsive datatable
    if ($('#responsiveDataTable').length && !$.fn.DataTable.isDataTable('#responsiveDataTable')) {
        $('#responsiveDataTable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            "pageLength": 10,
        });
    }

    // responsive modal datatable
    if ($('#responsivemodal-DataTable').length && !$.fn.DataTable.isDataTable('#responsivemodal-DataTable')) {
        $('#responsivemodal-DataTable').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            }
        });
    }

    // file export datatable
    if ($('#file-export').length && !$.fn.DataTable.isDataTable('#file-export')) {
        $('#file-export').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            scrollX: true,
            responsive: false,
            autoWidth: false
        });

        // Allow mouse wheeling over the header to horizontally scroll the table
        $('#file-export').closest('.dataTables_scroll').find('.dataTables_scrollHead').on('wheel', function (e) {
            var $body = $(this).siblings('.dataTables_scrollBody');
            if ($body.length) {
                var delta = e.originalEvent.deltaY || e.originalEvent.deltaX;
                $body.scrollLeft($body.scrollLeft() + delta);
            }
        });
    }

    // delete row datatable
    if ($('#delete-datatable').length && !$.fn.DataTable.isDataTable('#delete-datatable')) {
        var table = $('#delete-datatable').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
        $('#delete-datatable tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
        $('#button').on("click", function () {
            table.row('.selected').remove().draw(false);
        });
    }

    // scroll vertical 
    if ($('#scroll-vertical').length && !$.fn.DataTable.isDataTable('#scroll-vertical')) {
        $('#scroll-vertical').DataTable({
            scrollY: '265px',
            scrollCollapse: true,
            paging: false,
            scrollX: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    }

    // hidden columns
    if ($('#hidden-columns').length && !$.fn.DataTable.isDataTable('#hidden-columns')) {
        $('#hidden-columns').DataTable({
            columnDefs: [
                {
                    target: 2,
                    visible: false,
                    searchable: false,
                },
                {
                    target: 3,
                    visible: false,
                },
            ],
            "pageLength": 10,
            scrollX: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    }
    
    // add row datatable
    if ($('#add-row').length && !$.fn.DataTable.isDataTable('#add-row')) {
        var t = $('#add-row').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
        var counter = 1;
        $('#addRow').on('click', function () {
            t.row.add([counter + '.1', counter + '.2', counter + '.3', counter + '.4', counter + '.5']).draw(false);
            counter++;
        });
    }

});
