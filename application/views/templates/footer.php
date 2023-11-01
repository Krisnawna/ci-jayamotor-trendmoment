</section>
<footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url('assets') ?>/lib/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="<?php echo base_url('assets') ?>/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url('assets') ?>/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url('assets') ?>/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets') ?>/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url('assets') ?>/lib/common-scripts.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="<?php echo base_url('assets') ?>/lib/sparkline-chart.js"></script>
  <script src="<?php echo base_url('assets') ?>/lib/zabuto_calendar.js"></script>
  <script src="<?php echo base_url(); ?>assets/dataTables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>assets/dataTables/dataTables.bootstrap.js"></script>

  
    <script>
            $(document).ready(function () {
                $('#tabel').dataTable();
            });
    </script>
  <script>
	<?php if ($this->session->flashdata('flash')): ?>
		Swal.fire({
			position: 'top-end',
			icon: 'success',
			title: 'Data Berhasil <?php echo $this->session->flashdata("flash") ?>',
			showConfirmButton: false,
			timer: 1500
		})
	<?php endif ?>


	// 
	$(document).ready(function() {
	var max_fields      = 15; //maximum input boxes allowed
	var wrapper   		= $(".barang"); //Fields wrapper
	var cloning 		= $(".input_fields_wrap");
	var link = '<a href="#" class="remove_field">Remove</a>';
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(cloning.clone(), link); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); 
		// $(this).parent('div').remove(); x--;
		$(this).prev().remove(); x--;
		$(this).remove(".remove_field");
	})
});
</script>
  
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
