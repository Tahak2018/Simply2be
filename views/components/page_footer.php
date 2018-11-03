<!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Action Log <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul class="m-t-20 chatonline">
                                
                                <?php
                                if(isset($actionlog))
                                {
                                    foreach ($actionlog as $action) {
                                ?>
                                <li>
                                    <a href="javascript:void(0)"> <span><?=$action->ActionDetails?> <small class="text-success"><?=date("d-m-Y H:i:s", strtotime($action->DateTime))?></small></span></a>
                                </li>
                                <?php
                                    }
                                }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->


<!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2018 Simply2be Lite
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url('assets/plugins/popper/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url('assets/js/jquery.slimscroll.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?=base_url('assets/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url('assets/js/sidebarmenu.js')?>"></script>
    <!--stickey kit -->
    <script src="<?=base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url('assets/js/custom.min.js')?>"></script>
    <!-- Footable -->
    <script src="<?=base_url('assets/plugins/footable/js/footable.all.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap-select/bootstrap-select.min.js')?>" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="<?=base_url('assets/js/footable-init.js')?>"></script>  
    <!-- Sweet-Alert  -->
    <script src="<?=base_url('assets/plugins/sweetalert/sweetalert.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/sweetalert/jquery.sweet-alert.custom.js')?>"></script> 

    <script src="<?=base_url('assets/plugins/toast-master/js/jquery.toast.js')?>"></script>
    <script src="<?=base_url('assets/js/toastr.js')?>"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?=base_url('assets/plugins/styleswitcher/jQuery.style.switcher.js')?>"></script>
</body>

</html>