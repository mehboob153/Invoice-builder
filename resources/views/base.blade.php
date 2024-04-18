<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Builder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container-fluid">
    <input class="form-control" id="user_id" value="1" type="hidden" name="user_id"/>
    <div class="row" style="background-color: #f6f5f9;">
        <div class="col-lg-2 aside-bar position-fixed">
            <nav class="navbar mt-5 ps-3">
                @auth
                <div class="nav-itempt-3">
                    <a class="navbar-brand nav-link  text-white" href="/InvoiceBuilder/Invoices">
                        <i class="fa-solid fas fa-file-alt fs-5 me-2"></i> Invoices
                    </a>
                </div>
                <div class="nav-itempt-3">
                    <a class="navbar-brand nav-link  text-white" href="/InvoiceBuilder/Clients">
                        <i class="fa-solid fas fa-users fs-6 me-2"></i> Clients
                    </a>
                </div>
                <div class="nav-itempt-3">
                    <a class="navbar-brand nav-link  text-white underline-on-hover" href="/account-settings">
                        <i class="fa-solid fas fa-cog fs-6 me-2"></i> My settings
                    </a>
                </div>
                @endauth
                <div class="nav-itempt-3">
                    <a class="navbar-brand nav-link  text-white" href="#">
                        <i class="fa-solid fa-envelope fs-5 me-2"></i> Contact us
                    </a>
                </div>
                <div class="nav-itempt-3 ps-3 signin-position">
                    <a class="navbar-brand nav-link text-white" href="/login">
                        <i class="fa-solid fa-sign-in fs-5 me-2"></i>Login
                    </a>
                </div>
            </nav>
        </div>
        @yield('content')
</div>

</div>
</div>
</div>


</body>
</html>
