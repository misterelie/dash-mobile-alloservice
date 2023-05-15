<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Allô service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
   
</head>

<body>
    <header>
        <nav class="navbar fixed-top bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand text-center" href="{{ route('front.index') }}">
                    <img src="{{ asset('assets/images/logo.png') }}"
                        class="img-fluid rounded-circle-15" width="130" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="height: 29px">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <a href="{{ route('front.index') }}"><i class="fa fa-arrow-left"
                                aria-hidden="true" style="color:#3800bf; font-size:16px"></i></a>
                        <img src="{{ asset('assets/images/logo.png') }}"
                            class="img-fluid rounded-circle-15" width="150" alt="">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a href="{{ route('front.index') }}" class="nav-link text-truncate">
                                    <i class="fa fa-home"></i><span class="ms-1 d-sm-inline">Accueil</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.prestation') }}"
                                    class="nav-link text-truncate">
                                    <i class="fa  fa-tasks"></i><span class="ms-1 d-sm-inline">Demande de
                                        prestations</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.prestataire') }}"
                                    class="nav-link text-truncate">
                                    <i class="fa fa-users"></i><span class="ms-1 d-sm-inline">Devenir prestataire</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.temoingnage') }}" class="nav-link text-truncate">
                                    <i class="fa fa-user-plus"></i><span class="ms-1 d-sm-inline">Témoignages</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.assistance')}}" class="nav-link text-truncate">
                                    <i class="fa fa-question-circle"></i><span
                                        class="ms-1 d-sm-inline">Assistance</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.contact') }}" class="nav-link text-truncate">
                                    <i class="fa fa-phone"></i><span class="ms-1 d-sm-inline">Contacts</span>
                                </a>
                            </li>

                        </ul>
                   
                    </div>
                </div>
            </div>
        </nav><br>
    </header>
        @yield('content')
        <section>
            <!-- Bottom Navbar -->
            <nav class="navbar navbar-dark navbar-expand fixed-bottom">
                <ul class="navbar-nav nav-justified w-100">
                    <li class="nav-item">
                        <a href="{{ route('front.index') }}" class="nav-link text-center">
                            <i class="fa fa-home icon-Bottom-Navbar" aria-hidden="true"></i>
                            <span class="small d-block title-Bottom-Navbar text-center">Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('front.nos-prestations')}}" class="nav-link text-center">
                            <i class="fa fa-tasks icon-Bottom-Navbar" aria-hidden="true"></i>
                            <span class="small d-block title-Bottom-Navbar text-center">Prestations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.temoingnage') }}" class="nav-link text-center">
                            <i class="fa fa-users icon-Bottom-Navbar" aria-hidden="true"></i>
                            <span class="small d-block title-Bottom-Navbar text-center">Témoignages</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('front.assistance') }}" class="nav-link text-center">
                            <i class="fa fa-question-circle icon-Bottom-Navbar" aria-hidden="true"></i>
                            <span class="small d-block title-Bottom-Navbar text-center">Assistance</span>
                        </a>
                    </li>
                    
                </ul>
            </nav>
        </section>
    
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    
</body>


<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Valider";
        } else {
            document.getElementById("nextBtn").innerHTML = "Suivant";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }
    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }
    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }
    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 48.8566, lng: 2.3522},
          zoom: 12
        });

        var marker = new google.maps.Marker({
          position: {lat: 48.8584, lng: 2.2945},
          map: map,
          title: 'Tour Eiffel'
        });
      }
</script>

</html>