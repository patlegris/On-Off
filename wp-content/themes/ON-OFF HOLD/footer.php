<!--<div class="footer-container">-->
<!--    <footer class="wrapper">-->
<!--        --><?php //wp_nav_menu([
//            'theme_location' => 'footer',
//            'menu_class'     => 'menu-footer'
//        ]); ?>
<!--        --><?php //if (is_active_sidebar('pl_widget_sidebar_footer')) : ?>
<!--            --><?php //dynamic_sidebar('pl_widget_sidebar_footer'); ?>
<!--        --><?php //endif; ?>
<!--    </footer>-->
<!--</div>-->
<?php wp_footer(); ?>

<!--<footer>-->
<!--<p>&copy; On-Off Studio - 2015</p>-->
<!--</footer>-->
<!--</div>-->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

</body>
</html>