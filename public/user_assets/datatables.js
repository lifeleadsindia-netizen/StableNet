$(function () {
    if (typeof $.fn.DataTable !== 'undefined') {
        $.fn.dataTable.ext.errMode = 'none';

        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                emptyTable: "No Data Found",
                zeroRecords: "No Data Found",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    previous: "Previous",
                    next: "Next"
                }
            },
            pageLength: 10,
            responsive: true
        });
    }

    if ($("#datatable-basic").length && !$.fn.DataTable.isDataTable('#datatable-basic')) {
        $("#datatable-basic").DataTable({ pageLength: 10 });
    }
    if ($("#responsiveDataTable").length && !$.fn.DataTable.isDataTable('#responsiveDataTable')) {
        $("#responsiveDataTable").DataTable({ responsive: true, pageLength: 10 });
    }
    if ($("#responsivemodal-DataTable").length && !$.fn.DataTable.isDataTable('#responsivemodal-DataTable')) {
        $("#responsivemodal-DataTable").DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (s) {
                            var l = s.data();
                            return l[0] + " " + l[1];
                        }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({ tableClass: "table" })
                }
            },
            pageLength: 10
        });
    }

    // Initialize all file-export, example and data-table instances independently
    $('table#file-export, table#example, table.data-table').each(function (index) {
        if (!$.fn.DataTable.isDataTable(this)) {
            var $t = $(this);
            var tid = $t.attr('id');
            if (!tid || $('table#' + tid).length > 1) {
                tid = 'dt-table-' + (index + 1);
                $t.attr('id', tid);
            }

            // Remove any server-rendered placeholder row so DataTables can manage clean empty-state
            var $tbody = $t.find('tbody');
            if ($tbody.find('tr td[colspan]').length > 0) {
                $tbody.empty();
            }

            $t.DataTable({
                dom: "Bfrtip",
                buttons: ["copy", "csv", "excel", "pdf", "print"],
                scrollX: true,
                pageLength: 10
            });
        }
    });

    if ($("#delete-datatable").length && !$.fn.DataTable.isDataTable('#delete-datatable')) {
        var a = $("#delete-datatable").DataTable();
        $("#delete-datatable tbody").on("click", "tr", function () {
            $(this).hasClass("selected") ? $(this).removeClass("selected") : (a.$("tr.selected").removeClass("selected"), $(this).addClass("selected"));
        });
        $("#button").on("click", function () {
            a.row(".selected").remove().draw(false);
        });
    }

    if ($("#scroll-vertical").length && !$.fn.DataTable.isDataTable('#scroll-vertical')) {
        $("#scroll-vertical").DataTable({ scrollY: "265px", scrollCollapse: true, paging: false, scrollX: true });
    }

    if ($("#hidden-columns").length && !$.fn.DataTable.isDataTable('#hidden-columns')) {
        $("#hidden-columns").DataTable({ columnDefs: [{ target: 2, visible: false, searchable: false }, { target: 3, visible: false }], pageLength: 10 });
    }

    if ($("#add-row").length && !$.fn.DataTable.isDataTable('#add-row')) {
        var r = $("#add-row").DataTable(), e = 1;
        $("#addRow").on("click", function () {
            r.row.add([e + ".1", e + ".2", e + ".3", e + ".4", e + ".5"]).draw(false);
            e++;
        });
    }
});
