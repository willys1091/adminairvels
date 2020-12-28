$(".numonly").on("keypress keyup blur",function (event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

jQuery('.js-dataTable').dataTable({
    pagingType: "full_numbers",
    
    pageLength: 10,
    sWrapper: "dataTables_wrapper dt-bootstrap4",
    sFilterInput: "form-control form-control-sm",
    sLengthSelect: "form-control form-control-sm",
    dom: '<"top"f>rt<"bottom"><"row dt-margin"<"col-md-6"i><"col-md-6"p>><"clear">',
    language: {
        lengthMenu: "_MENU_",
        search: "_INPUT_",
        searchPlaceholder: "Search..",
        info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>",
        paginate: {
            first: '<i class="fa fa-angle-double-left"></i>',
            previous: '<i class="fa fa-angle-left"></i>',
            next: '<i class="fa fa-angle-right"></i>',
            last: '<i class="fa fa-angle-double-right"></i>'
        }
    },
    order: [],
    columnDefs: [ {
      targets  : 'no-sort',
      orderable: false,
    }]
});

var myRefreshTimeout;

function startAutorefresh(refreshPeriod) {
    myRefreshTimeout = setTimeout("window.location.reload();", refreshPeriod);
}

function stopAutorefresh() {
    clearTimeout(myRefreshTimeout);
    window.location.hash = 'stop'
}
function showM(url) {
    jQuery('.modal-content').empty();
    jQuery('.modal-content').load(url);
    jQuery('#myModal').modal({
        backdrop: 'static', show: true
    });
    stopAutorefresh();
}
