@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card card-login">
			<div class="card-header">
				<h3>ログイン</h3>
                {{--
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
                --}}
			</div>
			<div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- メールアドレス --}}
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="メールアドレス" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

                    {{-- パスワード --}}
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="パスワード" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        パスワードを保存する
					</div>
					<div class="form-group">
						<input type="submit" value="ログイン" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					アカウントをお持ちでない場合<a href="{{ route('register') }}">アカウント登録</a>
				</div>

                @if (Route::has('password.request'))
				<div class="d-flex justify-content-center">
					<a href="{{ route('password.request') }}">パスワードをお忘れの場合</a>
				</div>
                @endif
			</div>
		</div>
	</div>
</div>

@endsection
