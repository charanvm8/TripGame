

<html>
    <head>
        <title>Fortune Spin</title>
        <link rel="stylesheet" href="css/main.css" type="text/css" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/Winwheel.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    </head>
    <body class="spin" background="images/blur2.jpg">
		
			<ul class="nav nav-tabs nav-justified">
			<li><a class="navf" href="index.php"><strong>Players</strong></a></li>
			<li class="active"><a class="navf" href="spin.php"><strong>Challenge</strong></a></li>
			
			<li><a class="navf" href="schedule.php"><strong>Schedule</strong></a></li>
        <div align="center">
          <div><h1  align="center" style="font-family:Lobster"><strong>&#9775; Pokehunt at McHenry &#9775;</strong>
                    
                </h1></div>           
            
			 <div>
            <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>
                    <div class="power_controls">
                        <br />
                        <br />
                        <table class="power" cellpadding="10" cellspacing="0">
							
                            <tr>
                                <th align="center">Power</th>
                            </tr>
                            <tr>
                                <td width="78" align="center" id="pw3" onClick="powerSelected(3);">High</td>
                            </tr>
                            <tr>
                                <td align="center" id="pw2" onClick="powerSelected(2);">Med</td>
                            </tr>
                            <tr>
                                <td align="center" id="pw1" onClick="powerSelected(1);">Low</td>
                            </tr>
                        </table>
                        <br />
                        <img id="spin_button" src="images/spin_off.png" alt="Spin" onClick="startSpin();random1();" />
                        <br /><br />
                        &nbsp;&nbsp;<a class="wheel" href="#" onClick="resetWheel(); return false;">Play Again</a><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(reset)
                    </div>
                </td>
                <td width="438" height="582" class="the_wheel" align="center" valign="center">
                    <canvas id="canvas" width="434" height="434">
                        <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                    </canvas>
                </td>
            </tr>
			
        </table>
		</div>
			<h3 type="input" id="charan1" class="jarr"><strong>Spin to start the Game</strong></h3>
		</div>
		<footer>
            <div class="row" align="center">
                <div class="col-lg-12" >
                    <h3> <a class="har" href="https://www.linkedin.com/in/charanvm008" target="_blank">Copyright &copy;  Charan VM 2016 </a> </h3>
                </div>
            </div>
            <!-- /.row -->
        </footer>
        <script>
            // Create new wheel object specifying the parameters at creation time.
            var theWheel = new Winwheel({
                'numSegments'  : 20,
                'outerRadius'  : 212,
                'textFontSize' : 28,
                'segments'     :
                [
                   {'fillStyle' : '#eae56f', 'text' : 'Meghz'},
                   {'fillStyle' : '#89f26e', 'text' : 'Vamsi'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Mukul'},
                   {'fillStyle' : '#e7706f', 'text' : 'AJ'},
                   {'fillStyle' : '#eae56f', 'text' : 'SK'},
                   {'fillStyle' : '#89f26e', 'text' : 'Likitha'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Appu'},
				   {'fillStyle' : '#e7706f', 'text' : 'Surya'},
				   {'fillStyle' : '#eae56f', 'text' : 'Kittu'},
				   {'fillStyle' : '#89f26e', 'text' : 'Manoj'},
				   {'fillStyle' : '#7de6ef', 'text' : 'Kalyan'},
				   {'fillStyle' : '#e7706f', 'text' : 'Mounisha'},
				   {'fillStyle' : '#eae56f', 'text' : 'Karthik'},
				   {'fillStyle' : '#89f26e', 'text' : 'Ravi'},
				   {'fillStyle' : '#7de6ef', 'text' : 'Charan'},
				   {'fillStyle' : '#e7706f', 'text' : 'Jeevan'},
				   {'fillStyle' : '#eae56f', 'text' : 'Krishna'},
				   {'fillStyle' : '#89f26e', 'text' : 'Abhi'},
				   {'fillStyle' : '#7de6ef', 'text' : 'Madhu'},
				   {'fillStyle' : '#e7706f', 'text' : 'Frooti'}
                ],
                'animation' :
                {
                    'type'     : 'spinToStop',
                    'duration' : 5,
                    'spins'    : 8,
                    'callbackFinished' : 'alertPrize()'
                }
            });
            
            // Vars used by the code in this page to do power controls.
            var wheelPower    = 0;
            var wheelSpinning = false;
            
            // -------------------------------------------------------
            // Function to handle the onClick on the power buttons.
            // -------------------------------------------------------
            function powerSelected(powerLevel)
            {
                // Ensure that power can't be changed while wheel is spinning.
                if (wheelSpinning == false)
                {
                    // Reset all to grey incase this is not the first time the user has selected the power.
                    document.getElementById('pw1').className = "";
                    document.getElementById('pw2').className = "";
                    document.getElementById('pw3').className = "";
                    
                    // Now light up all cells below-and-including the one selected by changing the class.
                    if (powerLevel >= 1)
                    {
                        document.getElementById('pw1').className = "pw1";
                    }
                        
                    if (powerLevel >= 2)
                    {
                        document.getElementById('pw2').className = "pw2";
                    }
                        
                    if (powerLevel >= 3)
                    {
                        document.getElementById('pw3').className = "pw3";
                    }
                    
                    // Set wheelPower var used when spin button is clicked.
                    wheelPower = powerLevel;
                    
                    // Light up the spin button by changing it's source image and adding a clickable class to it.
                    document.getElementById('spin_button').src = "images/spin_on.png";
                    document.getElementById('spin_button').className = "clickable";
                }
            }
            
            // -------------------------------------------------------
            // Click handler for spin button.
            // -------------------------------------------------------
            function startSpin()
            {
                // Ensure that spinning can't be clicked again while already running.
                if (wheelSpinning == false)
                {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1)
                    {
                        theWheel.animation.spins = 3;
                    }
                    else if (wheelPower == 2)
                    {
                        theWheel.animation.spins = 8;
                    }
                    else if (wheelPower == 3)
                    {
                        theWheel.animation.spins = 15;
                    }
                    
                    // Disable the spin button so can't click again while wheel is spinning.
                    //document.getElementById('spin_button').src       = "spin_off.png";
                    //document.getElementById('spin_button').className = "";
                    
                    // Begin the spin animation by calling startAnimation on the wheel object.
                    theWheel.startAnimation();
                    
                    // Set to true so that power can't be changed and spin button re-enabled during
                    // the current animation. The user will have to reset before spinning again.
                    wheelSpinning = true;
                }
            }
            
            // -------------------------------------------------------
            // Function for reset button.
            // -------------------------------------------------------
            function resetWheel()
            {
                theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                theWheel.draw();                // Call draw to render changes to the wheel.
                
                document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";
                
                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
            }
            
            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
            // -------------------------------------------------------
            function alertPrize()
            {
                // Get the segment indicated by the pointer on the wheel background which is at 0 degrees.
                var winningSegment = theWheel.getIndicatedSegment();
                var chooseName= random2();
                // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
                document.getElementById("charan1").innerHTML = winningSegment.text +" has to " +chooseName ;
				alert(winningSegment.text +" has to " +chooseName);
				
				for(i=1;i<20;i++){
			    
				if(theWheel.segments[i].text==winningSegment.text){
				theWheel.deleteSegment(i);
				theWheel.draw();
				}
				
				}
				
				
            }
			
			var uniqueRandoms=["something","something","something","something","something","something","something","something","something","something","something","something","something","something","something","something","something","something","something","something"];
			var numRandoms=20;
			function random2(){
			
			if (!uniqueRandoms.length) {
			for (var i = 0; i < numRandoms; i++) {
            uniqueRandoms.push(i);
			}
			}
				var index = Math.floor(Math.random() * uniqueRandoms.length);
				var val = uniqueRandoms[index];

			// now remove that value from the array
				uniqueRandoms.splice(index, 1);

			return val;
			
			}
        </script>
    </body>
</html>