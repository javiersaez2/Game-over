<?php 
session_start();
?>
<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/css/styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <div class="topnav" id="myTopnav">
        <div class="primero">
            <a href=""><img src="view/Resources/nav-footer/game over logo.PNG"></a>
        </div>
        <div class="secundo">
            <a href="" class="skew">Inicio</a>
            <div class="dropdown">
                <button class="dropbtn skew" onclick='loadProductosTodos()'>Productos <i
                        class="fa fa-caret-down"></i></button>
                <div class="dropdown-content" id="dropdownProductos">
                </div>
            </div>
            <!-- aa -->
            <a class="skew" onclick="loadGameOver()">Game Over</a>
            <div class="dropdown">
                <button class="dropbtn skew"> Idiomas <i class="fa fa-caret-down"></i></button>
                <div class="dropdown-content" id="dropdownIdiomas">

                </div>
            </div>
            <?php 
                if (isset($_SESSION['id'])) {
                    ?>
                        <div class="dropdown">
                             <button class="dropbtn skew" id="" onclick=""><i class="fa-solid fa-user"></i></button>
                            <div class="dropdown-content" id="dropdownIdiomas">
                                <a onclick="cerrarSesion()">Cerrar sesion</a>
                            </div>
                        </div>
                    <?php
                } else {
                    ?>
                        <a class="skew" id="btnModal" onclick="cargarModal('myModal')"><i class="fa-solid fa-user"></i></a>
                    <?php 
                }
                if (isset($_SESSION['permisos'])) {
                    if ($_SESSION['permisos'] > 0) {
                        ?>  
                            <a  onclick="loadAdmin()" class="skew" id="paAdmin" >Admin</a>
                        <?php 
                    }
                }
            ?>    
        </div>


        <a href="javascript:void(0);" style="font-size:51px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>

        <!-- Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">

                <div class="login-box" id="modalCerrar">
                    <span class="close" onclick="cerrarModal('myModal')">&times;</span>
                    <h2>Login</h2>
                    <form>
                        <div class="user-box">
                            <input type="text" name="" required="" id="user">
                            <label>Username</label>
                        </div>
                        <div class="user-box">
                            <input type="password" name="" required="" id="pass">
                            <label>Password</label>
                        </div>
                        <a id="enlace" onclick="loginClick()">Submit</a>
                        <a onclick="cargarModal('myModalRegistrar')">Registrar</a>
                    </form>
                </div>
            </div>

        </div>

        <div id="myModalRegistrar" class="modal">
            <div class="modal-content">
                <div class="login-box" id="modalCerrar">
                    <span class="close" onclick="cerrarModal('myModalRegistrar')">&times;</span>
                    <h2>Registrar</h2>
                    <form>
                        <div class="user-box">
                            <p>usuario</p>
                            <input type="text" id="user-registrar">
                            <label>Username</label>
                        </div>
                        <div class="user-box">
                            <p>contrasena</p>
                            <input type="password" id="pass-registrar">
                            <label>Password</label>
                        </div>
                        <div class="user-box">
                            <p>repetir contrasena</p>
                            <input type="password" id="pass-registrar-repite">
                            <label>Repite Password</label>
                        </div>
                        <a id="enlace" onclick="RegistrarClick()" >Guardar</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <section id="content">


        <section class="carrusel-seccion">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="view/Resources/carrusel/img1.png" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img
                        src="view/Resources/carrusel/img2.png">
                </div>

                <div class="mySlides fade">
                    <img src="view/Resources/carrusel/img3.png">
                </div>

                <div class="mySlides fade">
                    <img src="view/Resources/carrusel/img4.png">
                </div>

                <div class="mySlides fade">
                    <img src="view/Resources/carrusel/img5.png">
                </div>

            

                <a class="anterior" onclick="MoverSlides(-1)">&larr;</a>
                <a class="siguiente" onclick="MoverSlides(1)">&rarr;</a>

            </div>
            <br>


        </section>


        <section id="destacado">
            <div id="destacado-main">
                <div class="bloque-izquierda">
                    <div class="imagen">
                        <img src="view/Resources/img/DeathAdder.jpg">
                    </div>
                </div>
                <div class="texto">
                    <h5>Razer DeathAdder</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum aliquam ipsam voluptatem est iste
                        necessitatibus facere sunt magnam. Repellat dicta sapiente tempore dolor consequuntur et nesciunt
                        iusto
                        dignissimos odit eum.</p>
                </div>
            </div>

            <div class="bloque-boton">
                <button onclick="loadFichaProducto('6')">Comprar</button>
            </div>

        </section>


        <section class="iconosec transition">
            <div class="glass">
            <article>
                <a href="#" onclick='loadProductosTodos()'>
                <div class="icono">
                    <img src="view/Resources/iconos/imggeneral.png">
                </div>
            </a>
            </article>
            
            <article>
                <a href="#" controller onclick='loadProductos(1)'>
                <div class="icono">
                    <img src="view/Resources/iconos/img1.png">
                </div>
            </a>
            </article>

            <article>
                <a href="#" controller onclick='loadProductos(2)'>
                <div class="icono">
                    <img src="view/Resources/iconos/img2.png">
                </div>
            </a>
            </article>

            <article>
                <a href="#" controller onclick='loadProductos(3)'>
                <div class="icono">
                    <img src="view/Resources/iconos/img3.png">
                </div>
            </a>
            </article>

            <article>
                <a href="#" controller onclick='loadProductos(4)'>
                <div class="icono">
                    <img src="view/Resources/iconos/img4.png">
                </div>
            </a>
            </article>

            <article>
                <a href="#" onclick='loadProductos(5)'>
                <div class="icono">
                    <img src="view/Resources/iconos/img5.png">
                </div>
            </a>
            </article>
        </div>

        </section>


        <section class="info">

            <article>
                <div class="info-articulo">
                    <div>
                        <h2>
                            Quienes somos
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum animi quas asperiores laboriosam
                            dignissimos
                            debitis
                            architecto voluptates expedita reiciendis, ducimus, itaque soluta maxime laudantium ad sapiente
                            laborum non
                            dolorum
                            autem magnam necessitatibus. Blanditiis, deleniti beatae ipsam eos ipsum vitae est praesentium
                            enim
                            totam,
                            quaerat
                            nihil nemo voluptate reprehenderit ut atque!
                        </p>
                    </div>
                </div>
                <div>
                    <a href="#">
                        <button class="custom-btn btn-10"  onclick="loadGameOver()">Mas informacion</button>
                    </a>
                </div>
            </article>
        </section>
    </section>
    <footer class="footer-distributed">

        <div class="footer-left">

            <h3><img src="view/Resources/nav-footer/game over logo.PNG  " alt=""></h3>

        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p>Calle Bilbao, España</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+1.555.555.5555</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="">meka@agibar.com</a></p>
            </div>

        </div>

        <div class="footer-right">
            <div class="footer-icons">

                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>

            </div>
            <div class="legal">
                <ul class="nav__ul">
                    <li>
                        <a href="#">Avisos legales</a>
                    </li>

                    <li>
                        <a href="#">Política de privacidad</a>
                    </li>

                    <li>
                        <a href="#">Seguridad</a>
                    </li>
                </ul>
            </div>


        </div>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="view/js/funciones.js"></script>

    <script src="view/js/cambio-bloque.js"></script>
    <script src="view/js/carrusel.js"></script>
    <script src="view/js/login.js"></script>

    
    <script src="view/js/admin.js"></script>
    <script src="view/js/ficha-producto.js"></script>
    <script src="view/js/nav-index.js"></script>
</body>
</body>

</html>