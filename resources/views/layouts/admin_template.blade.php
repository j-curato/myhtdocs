<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    
     @include('partials.meta_title')
     @include('partials.external_stylesheets')
     @include('partials.instyles')

</head>

<body>
                        
     @include('partials.wrapper')
     @yield('content')
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->  
     @include('partials.jscripts')

</body>
</html>

