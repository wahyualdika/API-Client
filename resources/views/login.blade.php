  <form class="form-horizontal" method="POST" action="contoh.com/api/login">
    <div class="form-group">
        <input type="text" name="email" class="form-control p_input {{ $errors->has('email') ? ' has-error' : '' }}" placeholder="Email" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" name="password" class="form-control p_input" placeholder="Password">
        @if ($errors->has('password'))
            <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn">LOG IN</button>
    </div>
  </form>
