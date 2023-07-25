var pageCurrent = 1,
    statusPaginateLoading = false,
    stopPaginateLoading = false;

function resetLoadmore() {
    pageCurrent = 1;
    statusPaginateLoading = false;
    stopPaginateLoading = false;
}

const myOffcanvas = document.getElementById('offcanvasMenuMobile')
myOffcanvas.addEventListener('show.bs.offcanvas', event => {
    $("#offcanvasMenuMobile .offcanvas-body").html($("#sidebar-left").html() + $("#sidebarRight").html());
})

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
