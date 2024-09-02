<!-- BEGIN: Vendor JS-->
<script src="{{ asset('/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
{{-- <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script> --}}
{{-- <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script> --}}
<script src="{{ asset('/app-assets/vendors/js/extensions/moment.min.js') }}"></script>
<script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.min.js"></script>
<script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="/app-assets/js/scripts/forms/form-select2.min.js"></script>


<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/app-assets/js/core/app-menu.js"></script>
<script src="/app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
{{-- <script src="/app-assets/js/scripts/pages/dashboard-analytics.js"></script> --}}
<script src="/app-assets/js/scripts/pages/app-invoice-list.js"></script>
<!-- END: Page JS-->


<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 12,
                height: 12
            });
        }
    })
</script>

<script>
    $(document).on('click', '#btn-submit', function () {
        $(this).html('<i class="fa fa-spinner fa-spin"></i>' + ' ' + $(this).text());
        $(this).prop('disabled', true);
        $(this).closest('form').submit()
    })
</script>


<script>

$('.alert').click(function(){
  $(this).fadeOut();
});
$('.alert').hover(function(){
  $(this).css('cursor','pointer');
});
</script>
