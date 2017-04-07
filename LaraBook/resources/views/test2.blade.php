<!DOCTYPE html>
<html>
<head>

</head>
<body>

	<div class="container" id="app">

@{{msg}}

@{{content}}


<?php if(isset($msg)){
	echo $msg;
}?>

<form method="post" enctype="multipart/form-data" v-on:submit.prevent="addJob">

		<textarea v-model="content"></textarea>

		<button type="submit" class="btn btn-success">Submit</button>
</form>

	</div>

<script src="../public/js/app.js"></script>

</body>
</html>
