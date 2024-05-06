<!DOCTYPE html>
<html lang="tr" class="js">

<head>
    @include('backend.template.head')

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        @include('backend.template.sidemenu')

        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fixed is-light">
                <div class="container-fluid">
                    @include('backend.template.header')

                </div><!-- .container-fliud -->
            </div>
            <!-- main header @e -->
            <!-- content @s -->
            @yield('content')

            <!-- content @e -->
            <!-- footer @s -->
            @include('backend.template.footer')

            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
@include('backend.template.script')

</body>

</html>
