<nav class="header__nav">
    <ul class="header__menu">
        <!--TODO agregar links originales, seguramente esto se agregue por js-->
        <li><a class="index header__link-menu" href="{{route('index')}}">Pagina Principal</a></li>
        <li><a class="register header__link-menu sub-menu-item primerHijo" menu="mi-cuenta" href="{{route('register')}}" value="Mi cuenta">Registrarse</a></li>
        <li><a class="login header__link-menu sub-menu-item" menu="mi-cuenta" href="{{route('login')}}">Iniciar Sesión</a></li>
        <li><a class="profile header__link-menu sub-menu-item" menu="mi-cuenta" href="{{route('index')}}">Datos personales</a></li>
        <li><a class="vehicles header__link-menu sub-menu-item" menu="mi-cuenta" href="{{route('cars')}}">Mis vehiculos</a></li>
        <li><a class="appointments header__link-menu sub-menu-item" menu="mi-cuenta" href="{{route('appointments')}}">Mis turnos</a></li>
        <li><a class="header__link-menu sub-menu-item" menu="mi-cuenta" href="{{route('index')}}">Cambiar contraseña</a></li>
        <li><a class="header__link-menu sub-menu-item" menu="mi-cuenta" href="{{route('index')}}">Cerrar Sesión</a></li>
        <li><a class="header__link-menu admin" href="{{route('index')}}">Administrar</a></li> {{--  (Solo admin) --}}
        <li><a class="header__link-menu sub-menu-item primerHijo" menu="moderar" href="{{route('index')}}" value="Moderar">Turnos</a></li>
        <li><a class="header__link-menu sub-menu-item" menu="moderar" href="{{route('index')}}">Correos</a></li>
        <li><a class="header__link-menu calendar" href="{{route('index')}}">Calendario</a></li> {{-- (Solo Admin/Mod) --}}
        <li><a class="header__link-menu appointment" href="{{route('index')}}">Pedir turno</a></li>
        <li><a class="header__link-menu services" href="{{route('services')}}">Servicios</a></li>
        <li><a class="header__link-menu faq" href="{{route('index')}}">Preguntas frecuentes</a></li>
        <li><a class="header__link-menu contact" href="{{route('contact')}}">Contacto</a></li>
        <li><a class="header__link-menu us" href="{{route('about')}}">Acerca de nosotros</a></li>
    </ul>
 </nav>


