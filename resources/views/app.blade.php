<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>{{env('APP_NAME')}}</title>
    <link href="{{ mix('css/custom.css') }}" type="text/css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/c71a56a6da.js" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
    <div class="container-loader">
        <div class="loader">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
    </div>
<div id="app" style="display: none;">
</div>
<footer class="footer" style="display: none;">
    <div class="layer">
        <div class="row">
            <div class="col">
                <a href="/">
                    <img src="/images/logo.jpg" alt="Logo" class="footer-logo"/>
                </a>
                <h4 class="motto">Creatie prin</h4>
                <h5 class="text-align-right">recreatie</h5>
            </div>
             <div class="col">
                <h4>Office</h4>
                <p>Iasi, Romania</p>
                <p>Moara de Foc, Nr. 16-18</p>
                <p class="email-id">davidelpaula@gmail.com</p>
                <h4>+40 749 529 584</h4>
            </div>
             <div class="col">
                <h4>Links</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
             <div class="col">
               <h4>Newsletter</h4>
                <div class="newsletter-form">
                    <i class="far fa-envelope"></i>
                    <input type="email" placeholder="Enter your email" required v-model="email">
                    <button type="submit"><i class="fas fa-arrow-right"></i></button>
                </div>
                <div class="footer-social-icons">
                    <a href="https://www.facebook.com/davidel.paula/" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-whatsapp"></i>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright">&copy; 2021 - All Rights Reserved</p>
    </div>
    </footer>
    @if (Auth::check())
        <script>
            window.Laravel = {!!json_encode([
                   'isLoggedin' => true,
                   'user' => Auth::user()
               ])!!}
        </script>
    @else
        <script>
            window.Laravel = {!!json_encode([
                    'isLoggedin' => false
                ])!!}
        </script>
    @endif
<script type="text/javascript">
    window.setTimeout(() => {
        $('.container-loader').css('display','none');
        $('.footer').css('display','block');
        $('#app').css('display','block');
        },3000)
</script>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
