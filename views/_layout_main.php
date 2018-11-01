<?php $this->load->myview('views','components/page_header'); ?>
<?php $this->load->view("components/page_topbar"); ?>
<?php $this->load->view("components/page_menu"); ?>
<?php $this->load->myview('views',$subview); ?>
        <!-- <aside class="right-side">
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php //$this->load->view($subview); ?> 
                    </div>
                </div>
            </section>
        </aside> -->
                            

<?php $this->load->myview('views','components/page_footer'); ?>
