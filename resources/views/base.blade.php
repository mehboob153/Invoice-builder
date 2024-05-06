<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Builder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container-fluid invoice">

    <div class="row pb-5" style="background-color: #f6f5f9; width: 100vw;min-height:100vh;">
        <div class="col-lg-2 aside-bar position-fixed">
            <nav class="navbar mt-4 ps-3 d-block" style="height: 95vh;">
                @auth
                <div class="nav-item">
                    <a class="navbar-brand nav-link text-white" href="/invoice-builder/invoices">
                        <i class="fa-solid fa-file-text fs-5  me-2"></i>Invoice
                    </a>
                </div>
                <div class="nav-item pt-3">
                    <a class="navbar-brand nav-link text-white" href="/invoice-builder/clients">
                        <i class="fa-solid fa-users fs-5  me-2"></i>Clients
                    </a>
                </div>
                <div class="nav-item py-3">
                    <a class="navbar-brand nav-link text-white" href="/account-settings">
                        <i class="fa-solid fa-cog fs-5 me-2"></i>My Settings
                    </a>
                </div>

                <hr class="text-white">
                @endauth
                <div class="nav-item pt-3">
                    <a class="navbar-brand nav-link  text-white" href="mailto:mian.hamza8880@gmail.com">
                        <i class="fa-solid fa-envelope fs-5 me-2"></i> Contact us
                    </a>
                </div>
                    @if(auth()->check())
                <div class="nav-itempt-3 ps-3 logout-position d-flex align-items-center my-auto">

                        <img src="{{ asset('images/1713199857.jpg') }}" alt="" style="margin-right: 10px;">
                    <span class="text-white">hamza</span>
                    <form id="logout-form" action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="navbar-brand nav-link text-white">
                            <i class="fa-solid fa-sign-in fs-6" style="margin-left: 5rem;"></i>
                            <span class="logout-text">Logout</span>
                        </button>
                    </form>

                </div>
                    @else
                        <div class="nav-itempt-3 ps-3 logout-position d-flex  justify-content-start my-auto">
                            <a class="navbar-brand nav-link text-white" href="/login">
                                <i class="fa-solid fa-sign-in fs-6"></i>
                                Login
                                 </a>

                        </div>
                    @endif

            </nav>
        </div>
        @yield('content')

    </div>
</div>

</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$.ajax({
url: 'https://restcountries.com/v3.1/all',
method: 'GET',
dataType: 'json',
success: function(response) {
$('.country_code').empty();
$('.country_code').append($('<option>', {
    value: '',
    text: 'Select Country'
    }));
    var countryCodeDigitLimits = {};

    $.each(response, function(index, country) {
    var countryName = country.name.common;
    var suffixes = Array.isArray(country.idd.suffixes) ? country.idd.suffixes.join('') : '';
    var phoneCode = country.idd.root + suffixes;
    var countryCodeText = countryName + ' (' + phoneCode + ')';
    console.log(phoneCode);

    var digitLimit = 20;
    if (country.postalCode && country.postalCode.format) {
    digitLimit = parseInt(country.postalCode.format.replace('#', '9'));
    }

    countryCodeDigitLimits[phoneCode] = digitLimit;
    $('.country_code').append($('<option>', {
    value: countryName + ' (' + phoneCode + ')',
    text: countryName + ' (' + phoneCode + ')'
    }));
    });

    $('.country_code').change(function() {
    var countryCode = $(this).val();
    console.log(countryCode);
    var digitLimit = countryCodeDigitLimits[countryCode];
    $(this).closest('.form-group').find('.phone_number').attr('maxlength', digitLimit);
    });
    },
    error: function(xhr, status, error) {
    console.error('Error fetching countries:', error);
    }
    });

</script>
</html>
