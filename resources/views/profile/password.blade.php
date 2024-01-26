@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5 mb-5">
                <form method="post" action="{{ route('user.change-password.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Eski Parol</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">Yangi Parol</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Yangi parolni takrorlang</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Parolni o'zgartirish</button>
                </form>
            </div>
        </div>
    </div>
@endsection

