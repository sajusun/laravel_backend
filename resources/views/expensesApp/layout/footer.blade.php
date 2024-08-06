<footer class="bg-body-tertiary text-center     fixed-bottom ">
    <!-- Grid container -->
{{--        <div class="container p-4"></div>--}}
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © <span id="copyRightYear"></span> Copyright:
        <a class="text-body" href="../app.blade.php">www.mysitename.com</a>
    </div>
    <!-- Copyright -->
</footer>
<script>$(function () {
        $('#copyRightYear').text(getCurrentYear());
    });</script>
