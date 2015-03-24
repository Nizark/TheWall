<html>
<head>
	<title>Ninja_Gold</title>
	<style type="text/css">
	h3
	{
		display: inline-block;
	}
	p
	{
		display: inline-block;
		border: 2px solid black;
		padding: 0px 127px 0px 10px;
	}
	.gold
	{
		display: inline-block;
		border: 1px solid black;
		box-shadow: 3px 3px 0px black;
		text-align: center;
		padding: 20px;
	}
	input
	{
		box-shadow: 3px 3px 0px black;
	}
	#log
	{
		border: 1px solid black;
		width: 600px;
		height: 100px;
		overflow: auto;
	}

	.red
	{
		color: red;
	}
	.green
	{
		color: green;
	}
	</style>
</head>
<body>
	<div id="header">
		<h3>Your Gold:</h3>
		<p><?= $this->session->userdata('total') ?></p>
		<!-- Restart Button -->
		<form action='/ninjas/restart' method='post'>
		<input type="hidden" name="action" value="delete">
		<input type='submit' value='Restart'>
		</form>
	</div>
<form class="gold" action="ninjas/process_money" method="post">
	<div class="main">
		<h2>Farm</h2>
		<h4>(earns 10-20 golds)</h4><br>
		<input type="hidden" name="building" value="farm" />
		<input type="submit" value="Find Gold!"/>
	</div>
</form>
<form class="gold" action="ninjas/process_money" method="post">
	<div class="main">
		<h2>Cave</h2>
		<h4>(earns 5-10 golds)</h4><br>
		<input type="hidden" name="building" value="cave" />
		<input type="submit" value="Find Gold!"/>
	</div>
</form>
<form class="gold" action="ninjas/process_money" method="post">
	<div class="main">
		<h2>House</h2>
		<h4>(earns 2-5 golds)</h4><br>
		<input type="hidden" name="building" value="house" />
		<input type="submit" value="Find Gold!"/>
	</div>
</form>
<form class="gold" action="ninjas/process_money" method="post">
	<div class="main">
		<h2>Casino</h2>
		<h4>(earns 0-50 golds)</h4><br>
		<input type="hidden" name="building" value="casino" />
		<input type="submit" value="Find Gold!"/>
	</div>
</form>

<h2>Activities:</h2>
	<div id="log">
	<?php	
		foreach ($log as $activities)
		{
			echo $activities;
		}
	?>
	</div>
</body>
</html>