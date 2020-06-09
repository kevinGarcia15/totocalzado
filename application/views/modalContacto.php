<style media="screen">
.modalContainer {
			display: none;
			position: fixed;
			z-index: 1;
			padding-top: 100px;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgb(0,0,0);
			background-color: rgba(0,0,0,0.4);
		}

		.modalContainer .modal-content {
			background-color: #fefefe;
			margin: auto;
			padding: 20px;
			border: 1px solid lightgray;
			border-top: 10px solid #58abb7;
			width: 25%;
		}

		.modalContainer .close {
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.modalContainer .close:hover,
		.modalContainer .close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		@media screen and (max-width: 600px) {
			.modalContainer .modal-content {
				width: 80%;
			}
		}
</style>
	<div id="tvesModal" class="modalContainer">
		<div class="modal-content">
			<span class="close">×</span>
			<h2>Contacto</h2>
			<div class="">
				<a href="https://wa.me/50259788865">
					<img
						src="<?=$base_url?>/recursos/img/whatsappGreen.png"
						alt=""
						style="width: 48px;">
						+(502) 5723 3015
				</a>
			</div>
			<div class="">
				<img src="<?=$base_url?>/recursos/img/facebook-icon-sm.png" alt=""> Totocalzado
			</div>
			<div class="">
				<img src="<?=$base_url?>/recursos/img/gmail-icon.png" alt=""> ventas@totocalzado.com
			</div>
		</div>
	</div>

<script type="text/javascript">
if(document.getElementById("btnModal")){
		var modal = document.getElementById("tvesModal");
		var btn = document.getElementById("btnModal");
		var span = document.getElementsByClassName("close")[0];
		var body = document.getElementsByTagName("body")[0];
		btn.onclick = function() {
			modal.style.display = "block";
			body.style.position = "static";
			body.style.height = "100%";
			body.style.overflow = "hidden";
		}

		span.onclick = function() {
			modal.style.display = "none";
			body.style.position = "inherit";
			body.style.height = "auto";
			body.style.overflow = "visible";
		}
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
				body.style.position = "inherit";
				body.style.height = "auto";
				body.style.overflow = "visible";
			}
		}
	}
</script>
