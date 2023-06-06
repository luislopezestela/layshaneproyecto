<div class="container-fluid">
    <div>
        <h3>Hola, <?php echo $wo['user']['name'];?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">PANEL</li>
            </ol>
        </nav>
    </div>
    <!-- Widgets -->
    <?php $getStatus = getStatus(); if (!empty($getStatus) && !empty(checkIfThereIsError($getStatus))) {?><div class="alert alert-danger"><strong>¡Importante!</strong> Se han encontrado algunos errores en su sistema, por favor revise <a href="<?php echo lui_LoadAdminLinkSettings('system_status'); ?>" data-ajax="?path=system_status">Estado del sistema</a>.</div><?php }?>
    <div class="row clearfix">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Usuarios</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                    <i class="material-icons">personas</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('user')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Publicaciones</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-info-bright text-info rounded-pill">
                                    <i class="material-icons">border_color</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('posts')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Paginas</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                    <i class="material-icons">flag</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('page')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Grupos</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-secondary-bright text-secondary rounded-pill">
                                    <i class="material-icons">supervisor_account</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('group')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Usuarios en linea</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-success-bright text-success rounded-pill">
                                    <i class="material-icons">persona</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountOnlineData()); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Comentarios</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                    <i class="material-icons">comentario</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('comments')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Juegos</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-info-bright text-info rounded-pill">
                                    <i class="material-icons">videogame_asset</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('games')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Mensajes</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                    <i class="material-icons">mensaje</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('messages')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>