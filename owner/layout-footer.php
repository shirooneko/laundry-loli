          <!-- Content wrapper -->
          </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

        <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../assets/js/waves.js"></script>
    <!--Counter js -->
    <script src="../assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../assets/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="../assets/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../assets/js/dashboard1.js"></script>
    <script src="../assets/js/custom.min.js"></script>
    <script src="../assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script>
        $('#btn_hapus').on('click',() => {
            return confirm('Yakin Menghapus data ?');
        });
        $(document).ready( function () {
            $('[data-toggle="tooltip"]').tooltip();
            var t = $('#table').DataTable({
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                "language" : {
                    "sProcessing" : "Sedang memproses ...",
                    "lengthMenu" : "Tampilkan _MENU_ data per halaman",
                    "zeroRecord" : "Maaf data tidak tersedia",
                    "info" : "Menampilkan _PAGE_ halaman dari _PAGES_ halaman",
                    "infoEmpty" : "Tidak ada data yang tersedia",
                    "infoFiltered" : "(difilter dari _MAX_ total data)",
                    "sSearch" : "Cari",
                    "oPaginate" : {
                        "sFirst" : "Pertama",
                        "sPrevious" : "Sebelumnya",
                        "sNext" : "Selanjutnya",
                        "sLast" : "Terakhir"
                    }
                }
            });
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            
        } );
        $('#btn-refresh').on('click',() => {
            $('#ic-refresh').addClass('fa-spin');
            var oldURL = window.location.href;
            var index = 0;
            var newURL = oldURL;
            index = oldURL.indexOf('?');
            if(index == -1){
                window.location = window.location.href;
                
            }
            if(index != -1){
                window.location = oldURL.substring(0,index)
            }
            
        });

    </script>

  </body>
</html>