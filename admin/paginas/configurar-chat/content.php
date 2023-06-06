<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configuracion</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configuracion Chat & Video Chat </li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <?php if ($wo['config']['website_mode'] != 'facebook') { ?>
        <div class="alert alert-warning">Nota: Algunas funciones están deshabilitadas debido al modo de sitio web que utilizó.</div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de chat</h6>
                    <form class="chat-settings" method="POST">
                        <div class="float-left">
                            <label for="chatSystem" class="main-label">Sistema de chat </label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="chat_request" id="chat_request-admin" onchange="SelectProModel('can_use_chat',this)" value="admin" <?php echo ($wo['config']['chat_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="chat_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="chat_request" id="chat_request-all" onchange="SelectProModel('can_use_chat',this)" value="all" <?php echo ($wo['config']['chat_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="chat_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="chat_request" id="chat_request-verified" onchange="SelectProModel('can_use_chat',this)" value="verified" <?php echo ($wo['config']['chat_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="chat_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="chat_request" id="chat_request-pro" onchange="SelectProModel('can_use_chat',this)" value="pro" <?php echo ($wo['config']['chat_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="chat_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
                            <br><small class="admin-info">Habilite el sistema de chat para chatear con amigos en la parte inferior derecha de la pagina.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="chatSystem" value="0" />
                            <input type="checkbox" name="chatSystem" id="chck-chatSystem" value="1" <?php echo ($wo['config']['chatSystem'] == 1) ? 'checked': '';?>>
                            <label for="chck-chatSystem" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="message_seen" class="main-label">Alerta de mensaje visto</label>
                            <br><small class="admin-info">Comprueba si el mensaje se vio en el sistema de chat. Recomendado para servidores potentes. <br> Tenga en cuenta que esta funcion solo se puede cambiar para Ajax, en NodeJS siempre esta activada.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="message_seen" value="0" />
                            <input type="checkbox" name="message_seen" id="chck-message_seen" value="1" <?php echo ($wo['config']['message_seen'] == 1) ? 'checked': '';?>>
                            <label for="chck-message_seen" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="message_typing" class="main-label">Sistema de escritura del usuario</label>
                            <br><small class="admin-info">Comprueba si el usuario esta escribiendo en el sistema de chat. Recomendado para servidores potentes. <br> Tenga en cuenta que esta funcion solo se puede cambiar para Ajax, en NodeJS siempre esta activada.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="message_typing" value="0" />
                            <input type="checkbox" name="message_typing" id="chck-message_typing" value="1" <?php echo ($wo['config']['message_typing'] == 1) ? 'checked': '';?>>
                            <label for="chck-message_typing" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <small class="admin-info">¿Busca la configuración de NodeJS? <a href="<?php echo lui_LoadAdminLinkSettings('node'); ?>">Click aqui</a>.</small>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de la API de Agora</h6>
                    <form class="agora-settings" method="POST">
                        <div class="float-left">
                            <label for="agora_chat_video" class="main-label">Videollamadas de Agora</label>
                            <br><small class="admin-info">Habilite Agora para iniciar el servicio de chat de video en su sitio web. <br> Tenga en cuenta que habilitar Agora deshabilitará Twilio. Agora solo admite videollamadas.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="agora_chat_video" value="0" />
                            <input type="checkbox" name="agora_chat_video" id="chck-agora_chat_video" value="1" <?php echo ($wo['config']['agora_chat_video'] == 1) ? 'checked': '';?>>
                            <label for="chck-agora_chat_video" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="alert alert-info">
                            Para comenzar a usar esta función, debera crear una cuenta en <a href="https://www.agora.io/en/">Agora</a>.
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">ID aplicacion</label>
                                <input type="text" id="agora_chat_app_id" name="agora_chat_app_id" class="form-control" value="<?php echo $wo['config']['agora_chat_app_id'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Certificado de aplicacion</label>
                                <input type="text" id="agora_chat_app_certificate" name="agora_chat_app_certificate" class="form-control" value="<?php echo $wo['config']['agora_chat_app_certificate'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">ID del cliente</label>
                                <input type="text" id="agora_chat_customer_id" name="agora_chat_customer_id" class="form-control" value="<?php echo $wo['config']['agora_chat_customer_id'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Cliente Secret</label>
                                <input type="text" id="agora_chat_customer_certificate" name="agora_chat_customer_certificate" class="form-control" value="<?php echo $wo['config']['agora_chat_customer_certificate'];?>">
                            </div>
                        </div>
                        <hr>
                        <small class="admin-info">¿Está buscando la configuración de transmisión en vivo? <a href="<?php echo lui_LoadAdminLinkSettings('live'); ?>">Click aqui</a>.</small>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuración de chat de video y audio</h6>
                    <form class="email-settings" method="POST">
                        <div class="float-left">
                            <label for="video_chat" class="main-label">Videollamadas </label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="video_call_request" id="video_call_request-admin" onchange="SelectProModel('can_use_video_call',this)" value="admin" <?php echo ($wo['config']['video_call_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="video_call_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="video_call_request" id="video_call_request-all" onchange="SelectProModel('can_use_video_call',this)" value="all" <?php echo ($wo['config']['video_call_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="video_call_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="video_call_request" id="video_call_request-verified" onchange="SelectProModel('can_use_video_call',this)" value="verified" <?php echo ($wo['config']['video_call_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="video_call_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="video_call_request" id="video_call_request-pro" onchange="SelectProModel('can_use_video_call',this)" value="pro" <?php echo ($wo['config']['video_call_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="video_call_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>

                            <br><small class="admin-info">Habilite la función de chat de video para que los usuarios hagan videollamadas en su sitio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="video_chat" value="0" />
                            <input type="checkbox" name="video_chat" id="chck-video_chat" value="1" <?php echo ($wo['config']['video_chat'] == 1) ? 'checked': '';?>>
                            <label for="chck-video_chat" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="audio_chat" class="main-label">Llamadas de audio</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quien puede usar esta funcion?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="audio_call_request" id="audio_call_request-admin" onchange="SelectProModel('can_use_audio_call',this)" value="admin" <?php echo ($wo['config']['audio_call_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="audio_call_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="audio_call_request" id="audio_call_request-all" onchange="SelectProModel('can_use_audio_call',this)" value="all" <?php echo ($wo['config']['audio_call_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="audio_call_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="audio_call_request" id="audio_call_request-verified" onchange="SelectProModel('can_use_audio_call',this)" value="verified" <?php echo ($wo['config']['audio_call_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="audio_call_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="audio_call_request" id="audio_call_request-pro" onchange="SelectProModel('can_use_audio_call',this)" value="pro" <?php echo ($wo['config']['audio_call_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="audio_call_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
                            <br><small class="admin-info">Habilite la funcion de chat de audio para que los usuarios hagan llamadas de audio en su sitio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="audio_chat" value="0" />
                            <input type="checkbox" name="audio_chat" id="chck-audio_chat" value="1" <?php echo ($wo['config']['audio_chat'] == 1) ? 'checked': '';?>>
                            <label for="chck-audio_chat" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de API Twilio</h6>
                    <form class="twilio-settings" method="POST">
                        <div class="float-left">
                            <label for="twilio_video_chat" class="main-label">Llamadas de video/audio de Twilio</label>
                            <br><small class="admin-info">Habilite Twilio para iniciar el servicio de chat de video en su sitio web. <br> Tenga en cuenta que habilitar Twilio deshabilitará Agora. Twilio admite llamadas de video y audio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="twilio_video_chat" value="0" />
                            <input type="checkbox" name="twilio_video_chat" id="chck-twilio_video_chat" value="1" <?php echo ($wo['config']['twilio_video_chat'] == 1) ? 'checked': '';?>>
                            <label for="chck-twilio_video_chat" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="alert alert-info">
                            Para comenzar a usar esta función, debera crear una cuenta en Twilio y comprar el producto "Video programable".
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Cuenta realSid</label>
                                <input type="text" id="video_accountSid" name="video_accountSid" class="form-control" value="<?php echo $wo['config']['video_accountSid'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">apiKeySid</label>
                                <input type="text" id="video_apiKeySid" name="video_apiKeySid" class="form-control" value="<?php echo $wo['config']['video_apiKeySid'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">apiKeySecret</label>
                                <input type="password" id="video_apiKeySecret" name="video_apiKeySecret" class="form-control" value="<?php echo $wo['config']['video_apiKeySecret'];?>">
                            </div>
                        </div>
                        <hr>
                        <small class="admin-info">¿Está buscando la configuración de SMS Twilio? <a href="<?php echo lui_LoadAdminLinkSettings('email-settings'); ?>">Click aqui</a>.</small>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$(function() {
    $('.switcher input[type=checkbox]').click(function () {
        setToTrue = 0;
        if ($(this).is(":checked") === true) {
            setToTrue = 1;
        }
        var configName = $(this).attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = setToTrue;
        objData['hash_id'] = hash_id;
        if (configName == 'twilio_video_chat') {
            if (setToTrue == 1) {
                $('input[name=agora_chat_video]').prop('checked', false);
            }
        } else if (configName == 'agora_chat_video') {
            if (setToTrue == 1) {
                $('input[name=twilio_video_chat]').prop('checked', false);
            }
        }
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData);
    });

    var setTimeOutColor = setTimeout(function (){});
    $('select').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
	
	$('.round_check input[type=radio]').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
	
    $('input[type=text], input[type=number], input[type=password], textarea').on('input', delay(function() {
            clearTimeout(setTimeOutColor);
            var thisElement = $(this);
            var configName = thisElement.attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData[configName] = this.value;
            objData['hash_id'] = hash_id;
            thisElement.addClass('warning');
            $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
                if (data.status == 200) {
                    thisElement.removeClass('warning');
                    thisElement.addClass('success');
                } else {
                    thisElement.addClass('error');
                }
                var setTimeOutColor = setTimeout(function () {
                    thisElement.removeClass('success');
                    thisElement.removeClass('warning');
                    thisElement.removeClass('error');
                }, 2000);
                //thisElement.focus();
            });
    }, 500));
    var form_twilio_settings = $('form.twilio-settings');
    form_twilio_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting',
        beforeSend: function() {
            form_twilio_settings.find('button').text('Please wait..');
        },
        success: function(data) {
            if (data.status == 200) {
                form_twilio_settings.find('button').text('Save');
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.twilio-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                setTimeout(function () {
                    $('.twilio-settings-alert').empty();
                }, 2000);
            }
        }
    });
    var form_email_settings = $('form.email-settings');
    form_email_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting',
        beforeSend: function() {
            form_email_settings.find('button').text('Please wait..');
        },
        success: function(data) {
            if (data.status == 200) {
                form_email_settings.find('button').text('Save');
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.email-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                setTimeout(function () {
                    $('.email-settings-alert').empty();
                }, 2000);
            }
        }
    });
    var form_agora_settings = $('form.agora-settings');
    form_agora_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting',
        beforeSend: function() {
            form_agora_settings.find('.waves-effect').text('Please wait..');
        },
        success: function(data) {
            if (data.status == 200) {
                form_agora_settings.find('.waves-effect').text('Save');
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.agora-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                setTimeout(function () {
                    $('.agora-settings-alert').empty();
                }, 2000);
            }
        }
    });
    var form_chat_settings = $('form.chat-settings');
    form_chat_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting',
        beforeSend: function() {
            form_chat_settings.find('button').text('Please wait..');
        },
        success: function(data) {
            if (data.status == 200) {
                form_chat_settings.find('button').text('Save');
                $('.chat-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                setTimeout(function () {
                    $('.chat-settings-alert').empty();
                }, 2000);
            }
        }
    });
});
</script>
