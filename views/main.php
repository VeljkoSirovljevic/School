<html>
<head>
	<title>Quantox</title>
	<link rel="stylesheet" href="<?php echo ROOT_URL ; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ROOT_URL ; ?>assets/css/style.css">
</head>
<body>
<div class="row">
    <div class="col-lg-12" style="height: 100px; background-color: green">
        <h2 style="text-align: center; color: white; margin-top: 30px">School Board</h2>
    </div>
</div>
    <div class="container">

     <div class="row">
     	<?php require($view); ?>
     </div>

    </div><!-- /.container -->
</body>
</html>