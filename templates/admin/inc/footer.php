<footer class="site-footer">
          <div class="text-center">
              2018 &copy; HoiAn.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/hoian/templates/admin/js/jquery.js"></script>
    <script src="/hoian/templates/admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/hoian/templates/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/hoian/templates/admin/js/jquery.scrollTo.min.js"></script>
    <script src="/hoian/templates/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/hoian/templates/admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/hoian/templates/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/hoian/templates/admin/js/owl.carousel.js" ></script>
    <script src="/hoian/templates/admin/js/jquery.customSelect.min.js" ></script>
    <script src="/hoian/templates/admin/js/respond.min.js" ></script>
    <script type="text/javascript" language="javascript" src="/hoian/templates/admin/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/hoian/templates/admin/assets/data-tables/DT_bootstrap.js"></script>
    <script src="/hoian/templates/admin/js/respond.min.js" ></script>
    <!--right slidebar-->
    <script src="/hoian/templates/admin/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="/hoian/templates/admin/js/common-scripts.js"></script>
    
     <!--dynamic table initialization -->
    <script src="/hoian/templates/admin/js/dynamic_table_init.js"></script>

    <!--script for index page-->
    <script src="/hoian/templates/admin/js/sparkline-chart.js"></script>
    <script src="/hoian/templates/admin/js/easy-pie-chart.js"></script>
    <script src="/hoian/templates/admin/js/count.js"></script>
    <script type="text/javascript" src="/hoian/templates/admin/assets/ckeditor/ckeditor.js"></script>
  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
        autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

<script type="text/javascript">
			function confirmAction() {
				return confirm("Bạn có chắc chắn muốn xóa?")
			}
</script>

  </body>
</html>
<?php ob_flush();?>