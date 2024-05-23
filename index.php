<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestor Parqueaderos</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="vistas/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include_once("controlador/ControladorParqueadero.php"); 
        $cParqueadero= new ControladorParqueadero();
        $info=$cParqueadero->mostrar();
        //fyf

        ?>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">galeria</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contactactenos</a></li>
                        <li class="nav-item"><a class="nav-link" href="vistas/register.php">¡registrate!</a></li>
                        <li class="nav-item"><a class="nav-link" href="vistas/login.php">iniciar sesion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->

        <header class="masthead">
            <div class="fondo"> 
             </div>
            <div class="container tu">
                <div class="masthead-subheading">¡Bienvenido a nuestro parqueadero!</div>
                <div class="masthead-heading text-uppercase">conoce nuestros servicios</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">contar mas</a>
            </div>
        </header>
        
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Servicios</h2>
                    <h3 class="section-subheading text-muted">Nuestro generador de parqueadero puede ofrecerte:</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas  fa-print fa-stack-1x fa-inverse"></i>

                        </span>
                        <h4 class="my-3">Generador de tiempo y facturas</h4>
                        <p class="text-muted">Podras controlar el tiempo en el que ingresa y sale un carro y generar una factura ya al momento de salida del vehiculo.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-parking fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Orden y administracion</h4>
                        <p class="text-muted">Nuestro gestor te brindara un administrador, podras saber cuanta ganacia tienes y porque, sabiendo cuantos y cuales carros ingresan </p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Seguridad y control</h4>
                        <p class="text-muted">Al contar con nuestro gestor de parqueadero, le proveemos a tu parqueadero mas vigilancia y control de los automoviles en lugar.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Portafolio</h2>
                    <h3 class="section-subheading text-muted">Tenemos diferentes parqueaderos ubicados en diferentes zonas del pais</h3>
                </div>
                <div class="row">
                <?php while ($campo=mysqli_fetch_array($info)) {
                ?>
                    
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="vistas/admin/imagenesParq/<?php echo $campo['foto'] ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php  echo $campo['lugar']?></div>
                                <div class="portfolio-caption-subheading text-muted">Nombre: <?php  echo $campo['nombre']?></div><br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php  echo $campo['nombre']?>">
                                  ¡Aparta un cupo!
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="<?php  echo $campo['nombre']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Aparta un cupo en este parqueadero</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" style="background-color: #212529">
                                                <!-- Contact-->
                                                <section class="page-section" id="contact">
                                                    <div class="container">
                                                        <div class="text-center">
                                                            <h2 class="section-heading text-uppercase">¡Contactanos!</h2>
                                                            <h3 class="section-subheading text-muted" style="margin-bottom: 1rem;">puedes enviar un mensaje para contactarnos y apartar tu cupo.</h3>
                                                        </div>
                                                        <!-- * * * * * * * * * * * * * * *-->
                                                        <!-- * * SB Forms Contact Form * *-->
                                                        <!-- * * * * * * * * * * * * * * *-->
                                                        <!-- This form is pre-integrated with SB Forms.-->
                                                        <!-- To make this form functional, sign up at-->
                                                        <!-- https://startbootstrap.com/solution/contact-forms-->
                                                        <!-- to get an API token!-->
                                                        <form id="contactForm"  method="POST" action="controlador/ControladorEmail.php">
                                                            <div class="row align-items-stretch mb-5">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <!-- parnombre input-->
                                                                        <input class="form-control" name="parqueadero" id="i" type="text" hidden="true" value="<?php  echo $campo['nombre']?> *"  />
                                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <!-- parnombre input-->
                                                                        <input class="form-control" name="lugar" id="lugar" type="text" hidden="true" value="<?php  echo $campo['lugar']?> *"  />
                                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <!-- Name input-->
                                                                        <input class="form-control" required="true" name="nombre" id="nombre" type="text" placeholder="Nombre *"   />
                                                                        <div class="invalid-feedback" data-sb-feedback="nombre:required">Nombre requerido.</div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <!-- Email address input-->
                                                                        <input class="form-control" id="email" type="email" name="email" placeholder="Email *" required="true" data-sb-validations="required,email" />
                                                                        <div class="invalid-feedback"  >Email requerido.</div>
                                                                        <div class="invalid-feedback" >Email no valido.</div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <!-- Name input-->
                                                                        <input class="form-control" id="telefono" required="true" type="text" name="telefono" placeholder="telefono *" data-sb-validations="required" />
                                                                        <div class="invalid-feedback" >telefono requerido.</div>
                                                                    </div>
                                                                     <div class="form-group">
                                                                        <!-- Name input-->
                                                                        <label id="menFecha"  style="color: white; ">ingresar fecha y hora del cupo apartado</label>
                                                                        <input onchange="borrarMensaje()" class="form-control" id="fecha" alt="introduzca dia de apartamiento del" type="datetime-local" required="true" name="fecha" placeholder="fecha *" data-sb-validations="required" />
                                                                    
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group form-group-textarea mb-md-0">
                                                                        <!-- Message input-->
                                                                        <textarea class="form-control" required="true" id="message" name="mensaje" placeholder="Tu mensaje *"></textarea>
                                                                        <div class="invalid-feedback" >mensaje requerido.</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Submit success message-->
                                                            <!---->
                                                            <!-- This is what your users will see when the form-->
                                                            <!-- has successfully submitted-->
                                                            <div class="d-none" id="submitSuccessMessage">
                                                                <div class="text-center text-white mb-3">
                                                                    <div class="fw-bolder">Form submission successful!</div>
                                                                    To activate this form, sign up at
                                                                    <br />
                                                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                                                </div>
                                                            </div>
                                                            <!-- Submit error message-->
                                                            <!---->
                                                            <!-- This is what your users will see when there is-->
                                                            <!-- an error submitting the form-->
                                                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                                            <!-- Submit Button-->
                                                            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" name="enviarMensaje" type="submit">Enviar mensaje</button></div>
                                                        </form>
                                                    </div>
                                                </section>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cerrar</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php }   ?>
                    
                </div>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nosotros</h2>
                    <h3 class="section-subheading text-muted">Nuestro equipo de trabajo esta conformado por:</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="vistas/assets/img/team/1.jpg" alt="..." />
                            <h4>Santiago Riaño</h4>
                            <p class="text-muted">Programador</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="vistas/assets/img/team/2.jpg" alt="..." />
                            <h4>Melissa Lopez</h4>
                            <p class="text-muted">Programador</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="vistas/assets/img/team/3.jpg" alt="..." />
                            <h4>Julian Alonso</h4>
                            <p class="text-muted">Programador</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="vistas/assets/img/team/4.jpg" alt="..." />
                            <h4>Catalina Yepes</h4>
                            <p class="text-muted">Programador</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Somos un equipo interesado en el desarrollo de aplicativos. En este caso apoyamos los aplicativos de administracion de parqueaderos.</p></div>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy;  Gestion parqueadero 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Politica de privacidad </a>
                        <a class="link-dark text-decoration-none" href="#!">Terminos de uso</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="vistas/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script >
             let fecha=document.getElementById("fecha");
              let menFecha=document.getElementById("menFecha");
              function borrarMensaje(){

                menFecha.setAttribute("hidden","true");

              }

        </script>
    </body>
</html>
