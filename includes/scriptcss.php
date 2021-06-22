<link rel="stylesheet" type="text/css" media="screen" href="./css/CSSreset.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="./css/als_demo.css" />
<script type="text/javascript" src="./js/jquery.als-1.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() 
			{
				$("#lista1").als({
					visible_items: 4,
					scrolling_items: 1,
					orientation: "horizontal",
					circular: "yes",
					autoscroll: "yes",
					interval: 2000,
					speed: 500,
					easing: "linear",
					direction: "left",
					start_from: 1
				});
				
				$("#lista2").als({
					visible_items: 2,
					scrolling_items: 1,
					orientation: "vertical",
					circular: "no",
					autoscroll: "no",
					start_from: 1
				});
				
				//logo hover
				$("#logo_img").hover(function()
				{
					$(this).attr("src","images/als_logo_hover212x110.png");
				},function()
				{
					$(this).attr("src","images/als_logo212x110.png");
				});
				
				//logo click
				$("#logo_img").click(function()
				{
					location.href = "http://als.musings.it/index.php";
				});
				
				$("a[href^='http://']").attr("target","_blank");
				$("a[href^='http://als']").attr("target","_self");
			});
		</script>