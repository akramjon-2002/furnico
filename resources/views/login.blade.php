<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .card {
            background-color: #8ceda3; /* Цвет фона */
            border-radius: 1rem;
            padding: 20px; /* Добавьте отступы, если необходимо */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Мягкая тень */
        }
        .text-green {
            color: #2F860FFF; /* Зеленый цвет текста */
        }
    </style>
</head>
<body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-green" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-2">
                            <form method="post" action="{{route('user.login')}}" >
                                @csrf
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class=" mb-5">Iltimos email va parolingizni kiriting!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX">Email</label>
                            </div>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-outline form-white mb-4">
                                <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX">Parol</label>
                            </div>
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-lg px-5" type="submit">Kirish</button>

                            </form>
                        </div>
                        <div>
                            <p class="mb-0">Sizning shaxsiy profilingiz yo'qmi? <a href="{{route('user.registration')}}" class="fw-bold">Ro'yxatdan o'tish</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
