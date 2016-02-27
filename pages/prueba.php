<html>
  <head>
    <title>Basic Pills Example</title>
    <!-- Bootstrap -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class='container'>
            <section id="wizard">
                <div class="page-header">
                <h1>Basic Pills Wizard</h1>
                </div>
                <div id="rootwizard">
                    <ul>
                            <li><a href="#tab1" data-toggle="tab">First</a></li>
                            <li><a href="#tab2" data-toggle="tab">Second</a></li>
                            <li><a href="#tab3" data-toggle="tab">Third</a></li>
                            <li><a href="#tab4" data-toggle="tab">Fourth</a></li>
                            <li><a href="#tab5" data-toggle="tab">Fifth</a></li>
                            <li><a href="#tab6" data-toggle="tab">Sixth</a></li>
                            <li><a href="#tab7" data-toggle="tab">Seventh</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="tab1">
                          1
                        </div>
                        <div class="tab-pane" id="tab2">
                          2
                        </div>
                        <div class="tab-pane" id="tab3">
                                    3
                        </div>
                        <div class="tab-pane" id="tab4">
                                    4
                        </div>
                        <div class="tab-pane" id="tab5">
                                    5
                        </div>
                        <div class="tab-pane" id="tab6">
                                    6
                        </div>
                        <div class="tab-pane" id="tab7">
                                    7
                        </div>
                        <ul class="pager wizard">
                                <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                <li class="previous"><a href="#">Previous</a></li>
                                <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                <li class="next"><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </section>
	</div>
        <script src="../component/jquery/dist/jquery.min.js"></script>
        <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../js/jquery.bootstrap.wizard.min.js"></script>
	<script>
	$(document).ready(function() {
	  	$('#rootwizard').bootstrapWizard({'tabClass': 'nav nav-pills'});
		window.prettyPrint && prettyPrint()
	});
	</script>
  </body>
</html>
