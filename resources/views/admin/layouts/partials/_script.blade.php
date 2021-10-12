
{{--
<script src="{{asset('js/jquery.min.js')}}"></script>
--}}
<!-- Bootstrap 4 -->
{{--
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
--}}
<!-- AdminLTE App -->
{{--
<script src="{{asset('js/adminlte.min.js')}}"></script>
--}}

<!-- For Night mode -->
<script>

    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);

    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('dark');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);
</script>

<!-- Javascript
================================================== -->
<script src="{{asset('js/user/all_min.js')}}"></script>
</body>


</html>
