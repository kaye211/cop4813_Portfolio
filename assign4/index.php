<?php include('../inc/header.php') ?>
	<link rel="stylesheet" href="../css/canvas.css">
    <div class="container">
    	<div class="row">
    		<div class="col-md-6 col-md-offset-4">
		      <section>
		          <h1>Assignment 4</h1>
				  <p>Learn how to design by drawing!</p>
		          <canvas	width="600" height="400"></canvas>
				<div class="controls">
					<ul>
						<li class="red selected canColor"></li>
						<li class="blue canColor"></li>
						<li class="yellow canColor"></li>
					</ul>
					<button id="revealColorSelect">New Color</button>
					<div id="colorSelect">
						<span id="newColor"></span>
						<div class="sliders">
							<p>
								<label for="red">Red</label>
								<input id="red" name="red" type="range" min=0 max=255 value=0>
							</p>
							<p>
								<label for="green">Green</label>
								<input id="green" name="green" type="range" min=0 max=255 value=0>
							</p>
							<p>
								<label for="blue">Blue</label>
								<input id="blue" name="blue" type="range" min=0 max=255 value=0>
							</p>
						</div>
						<div>
						<button id="addNewColor">Add Color</button>
						</div>
					</div>
				</div>
		      </section>
		    </div>
		</div>
	</div>
<?php include('../inc/footer.php') ?>