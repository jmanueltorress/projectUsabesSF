        <script>
			function myFunction() {
				document.getElementById("text").submit();
			}
			myFunction
		</script>
		 <script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

		<script>
		  $(function () {
			$("#example1").DataTable({
			  "responsive": true,
			  "autoWidth": false,
			});
			$('#example2').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": true,
			  "info": true,
			  "autoWidth": false,
			  "responsive": true,
			});
		  });
		</script>
          <script type="text/javascript">
			$(document).ready(function () {
			window.setTimeout(function() {
				$("#alert").fadeTo(1000, 0).slideUp(1000, function(){
					$(this).remove(); 
				});
			}, 5000);
			
			});
			</script>
            <script>

var angle_jump=6;
var dt= new Date();

sec = dt.getSeconds()*angle_jump;

var min=dt.getMinutes();
min=min*angle_jump; 
min=min + (sec/360)
var hour=dt.getHours();
hour=hour*30;	
hour=hour + (min/12);

var ang_second=90-sec;
var ang_minute=90-min;
var ang_hour=90-hour;

var r=160;
//var my_canvas=$('#my_canvas').get(0)
var my_canvas=document.getElementById("my_canvas");

var gctx = my_canvas.getContext("2d");

var x=my_canvas.width/2;
var y=my_canvas.height/2;
speed=1000;

arc_angle=10;// angle of oppisite end of second niddle

////////////
my_function=function my_function(){

gctx.clearRect(0, 0, my_canvas.width,my_canvas.height);
///////////////////
gctx.moveTo(x+r*1.4,y);
gctx.strokeStyle= '#d28c23';
gctx.lineWidth=30;
gctx.shadowColor = 'black';
gctx.shadowOffsetX=5;
gctx.shadowOffsetY=5;
gctx.shadowBlur = 15;

gctx.arc(x,y,r*1.4,0,2*Math.PI);
gctx.stroke(); ///Outer circle 
////////////////////
gctx.lineWidth=1;

//////////// To show number indicating Hours ///////////
var h=2;
var x_gap=-5;
var y_gap=5;
for(j=0;j<360;j += angle_jump){
j_radian=j*(Math.PI/180);

gctx.beginPath()
gctx.strokeStyle= '#fff';///#464623';
if((j % (5*angle_jump))==0){
var y1_out=y+ 1.1*r*Math.sin(j_radian);
var x1_out=x+ 1.1*r*Math.cos(j_radian);

var y1_text=y+ 1*r*Math.sin(j_radian);
var x1_text=x+ 1*r*Math.cos(j_radian);

//h=h+5;
if(h<12){
h=h+1; // to show hour 
}else{
h=1;
}	
	
gctx.font = '36px Arial';
if(y_gap<15){y_gap=y_gap+1;}
x_gap=x_gap-1;
void gctx.fillText(h,x1_text+x_gap, y1_text+y_gap);
}else{
var y1_out=y+ 1.15*r*Math.sin(j_radian);
var x1_out=x+ 1.15*r*Math.cos(j_radian);
}

var y2_out=y+ 1.2*r*Math.sin(j_radian);
var x2_out=x+ 1.2*r*Math.cos(j_radian);

gctx.moveTo(x1_out,y1_out);
gctx.lineTo(x2_out,y2_out);
gctx.stroke();
}

/////////////////////
gctx.beginPath()
gctx.strokeStyle= '#46d2f5'; // border color of the second needle 
var startAngle=(1/180) * (360-ang_second); // In degree 
var a_end_ang=(1/180) * (360-(ang_second + 180 -arc_angle));
var a_start_ang=(1/180) *(360-(ang_second + 180 + arc_angle));

var y1=y+ r*Math.sin(startAngle*Math.PI);
var x1=x+ r*Math.cos(startAngle*Math.PI);

gctx.moveTo(x1,y1); // Coordinate of tip of the needle
gctx.arc(x,y,0.3*r,a_start_ang*Math.PI,a_end_ang*Math.PI);
gctx.lineTo(x1,y1); // Full second needle path
gctx.fillStyle = '#4680f5'; // fill colour of the second needle
gctx.fill();
gctx.stroke(); // draw the second needle 
//////////////////////////////////

///////////Minute Needle//////////
gctx.beginPath()
gctx.strokeStyle= '#fa7a19'; // border color of the minute needle 
var startAngle=(1/180) * (360-ang_minute); // In degree 
var a_end_ang=(1/180) * (360-(ang_minute + 180 -arc_angle));
var a_start_ang=(1/180) *(360-(ang_minute + 180 + arc_angle));

var y1=y+ 0.9*r*Math.sin(startAngle*Math.PI);
var x1=x+ 0.9*r*Math.cos(startAngle*Math.PI);

gctx.moveTo(x1,y1); // Coordinate of tip of the needle
gctx.arc(x,y,0.3*r,a_start_ang*Math.PI,a_end_ang*Math.PI);
gctx.lineTo(x1,y1); // Full minute needle path
gctx.fillStyle = '#effa19'; // fill colour of the minute needle
gctx.fill();
gctx.stroke(); // draw the minute needle 
//////////////////////////////////

///////////hour Needle//////////
gctx.beginPath()
gctx.strokeStyle= '#f52300'; // border color of the hour needle 
var startAngle=(1/180) * (360-ang_hour); // In degree 
var a_end_ang=(1/180) * (360-(ang_hour + 180 -(arc_angle*2)));
var a_start_ang=(1/180) *(360-(ang_hour + 180 + (arc_angle*2)));

var y1=y+ 0.8*r*Math.sin(startAngle*Math.PI);
var x1=x+ 0.8*r*Math.cos(startAngle*Math.PI);

gctx.moveTo(x1,y1); // Coordinate of tip of the needle
gctx.arc(x,y,0.15*r,a_start_ang*Math.PI,a_end_ang*Math.PI);
gctx.lineTo(x1,y1); // Full hour needle path
gctx.fillStyle = '#f52300'; // fill colour of the hour  needle
gctx.fill();
gctx.stroke(); // draw the hour needle 
//////////////////////////////////

/// small Circle at center of the clock 
gctx.beginPath()
gctx.strokeStyle= '#000000';
gctx.arc(x,y,3,0,2*Math.PI); 
gctx.fillStyle = '#39f500';
gctx.fill();
gctx.stroke();
my_function2();
}
////////

my_function2=function my_function2(){
if(ang_second > -264){	
ang_second=ang_second-angle_jump;
my_time=setTimeout('my_function()',speed)
//$('#d1').html("ang_second: " + ang_second + "<br>ang_minute" + ang_minute + "<br>ang_hour" + ang_hour);
}else{
ang_second=90;

if(ang_minute > -264){
ang_minute=ang_minute - angle_jump;
}else{
ang_minute=90;
ang_hour=ang_hour-angle_jump;
}	
my_time=setTimeout('my_function()',speed)
}
}
/////////
my_function();
</script>
