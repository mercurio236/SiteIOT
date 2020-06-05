<?php
	function geraToast($msg){
		$toast = "	<div class='toast' data_autohide='false' style='position: absolute; top: 0; right: 0;'>
								<div class='toast-header'>
									<strong class='mr-auto'>Cadastro</strong>
									<small>11 mins ago</small>
									<button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									</button>
								</div>
								<div class='toast-body'>
									$msg
								</div>
							</div>";
		return $toast;
	}
?>