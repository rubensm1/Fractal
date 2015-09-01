<?php
	if (isset ($requisicao) ) {
		
		if ($requisicao == "panel") {
			?>
			<div class="panel-heading">Zoom</div>
			<div class="panel-body">
				<button id="botaoZoomReset" class="botao-icon">Voltar ao Padrão</button>
				<label for="amount-zoom">Zoom:</label><input type="text" id="amount-zoom" style="width: 60px; text-align: center" value="1x" readonly></input>
				<div id="slider-zoom" style="width: calc(100% - 10px); margin: auto;"></div>
				
				<button id="botaoScaleReset" class="botao-icon">Voltar ao Padrão</button>
				<label for="amount-scale">Scale:</label><input type="text" id="amount-scale" style="width: 60px; text-align: center" value="1x" readonly></input>
				<div id="slider-scale" style="width: calc(100% - 10px); margin: auto;"></div>
			</div>
			<?php 
		} 
		
		
		
		else if ($requisicao == "javascript")   { 
		?> 
			<script>
				
				var zoom = 1;
				var scale = 1;
				
				function setZoom(z, fromSlider) {
					if (fromSlider) {
						if (z > 50) {
							if (z < 60)
								zoom = (z-50)/10 + 1;
							else
								zoom = (z-50)/5;
						}
						else 
							zoom = z/50;
					}
					else {
						zoom = z;
						if (z > 1) {
							if (z < 2)
								z = (z-1) * 10 + 50;
							else
								z = z * 5 + 50;
						}
						else 
							z = z * 50;
						$( "#slider-zoom" ).slider("value", z);
					}
					$("#amount-zoom").val( zoom + "x");
					$("#container-svg").css("zoom", zoom);
				}
				
				function setScale(s, fromSlider) {
					if (fromSlider) {
						if (s > 50) {
							if (s < 60)
								scale = (s-50)/10 + 1;
							else
								scale = (s-50)/5;
						}
						else 
							scale = s/50;
					}
					else {
						scale = s;
						if (s > 1) {
							if (s < 2)
								s = (s-1) * 10 + 50;
							else
								s = s * 5 + 50;
						}
						else 
							s = s * 50;
						$( "#slider-scale" ).slider("value", s);
					}
					$("#amount-scale").val( scale + "x");
					planoPrincipal.scale(scale);
				}			
				
				$( "button#botaoZoomReset" ).button({
					icons: {primary: "ui-icon-circle-close"},
					text: false,
					
				}).click( function() {
					setZoom(1);
				});
				
				$( "#slider-zoom" ).slider({
					range: "min",
					value: 50,
					min: 1,
					max: 100,
					slide: function( event, ui ) {
						setZoom(ui.value, true);
					}
				});
				
				
				$( "button#botaoScaleReset" ).button({
					icons: {primary: "ui-icon-circle-close"},
					text: false,
					
				}).click( function() {
					setScale(1);
				});
				
				$( "#slider-scale" ).slider({
					range: "min",
					value: 50,
					min: 1,
					max: 100,
					slide: function( event, ui ) {
						setScale(ui.value, true);
					}
				});
			</script>
			<?php 
		}
	}
?>