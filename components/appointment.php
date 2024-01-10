<?php include("db.php")?>
<!-- Appointment Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Turnos</p>
                    <h1 class="mb-4">Agende un turno para visitar a Nuestros Doctores</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Llámenos</p>
                            <h5 class="mb-0">+012 345 6789</h5>
                        </div>
                    </div>
                    <div class="bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Envíenos un Mail</p>
                            <h5 class="mb-0">info@example.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                    <form action="pages/Citas/save.php" method="POST">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Nombre" style="height: 55px;"  name="nombre" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="DNI (Sin puntos)" style="height: 55px;" name="id_paciente" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="date"
                                            class="form-control border-0"
                                            placeholder="Fecha de Nacimiento" data-target="#date" style="height: 55px;" name="fecha_nacimiento" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Domicilio" style="height: 55px;" name="direccion" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Telefono" style="height: 55px;" name="telefono" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <textarea class="form-control border-0" placeholder="Historial Medico (opcional)" style="height: 55px; overflow: hidden;" name="historial_medico" autocomplete="off"></textarea>
                                </div>
                                <div class="col-12">
                                    <select class="form-select border-0" style="height: 55px;" name="id_medico">
                                    <?php
                                        $query = "SELECT * FROM medico JOIN especializaciones ON especializaciones.id_especializacion = medico.id_especializacion";
                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                    ?>
                                    <option selected>Elija un Doctor</option>
                                    <?php foreach ($result as $opciones): ?>
                                        <option value="<?php echo $opciones['id_medico']?>"><?php echo $opciones['nombre_medico']?> (<?php echo $opciones['especializacion']?>)</option>
                                    <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="fecha_cita" data-target-input="nearest">
                                        <input type="date"
                                            class="form-control border-0"
                                            placeholder="Fecha de la Cita" data-target="#fecha_cita" style="height: 55px;" name="fecha_cita" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="time"
                                            class="form-control border-0"
                                            placeholder="Hora de la Cita" data-target="#time" style="height: 55px;" name="hora_cita" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Observaciones" style="height: 55px; overflow: hidden;" name="observaciones" autocomplete="off"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="guardar_registro">Agendar Turno</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->