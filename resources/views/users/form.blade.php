@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ action('UserController@store') }}" method="post">
    {{csrf_field()}}

    <div class="form-group ">
        <div class="input-group">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fa fa-universal-access"></i>
                            </span>
            </div>

            <select class="form-control {{ $errors->has('role') ? 'is-invalid' : ''}}" id="role" name="role">
                <option value="" {{ old('role') == "" ? 'selected' : '' }}>Select Role</option>
                <option value="admin" {{ old('role') == "admin" ? 'selected' : '' }}>Admin</option>
                <option value="business_owner" {{ old('role') == "business_owner" ? 'selected' : '' }}>Business Owner</option>
                <option value="employee" {{ old('role') == "employee" ? 'selected' : '' }}>Employee</option>
            </select>
            {!! $errors->first('role', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fa fa-address-card"></i>
                            </span>
            </div>
            <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" id="first_name" type="text"
                   name="first_name" placeholder="First name" value={{ old('first_name') }}>
            {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fa fa-address-card"></i>
                            </span>
            </div>
            <input class="form-control {{ $errors->has('surname') ? 'is-invalid' : ''}}" id="surname" type="text"
                   name="surname" placeholder="Surname" value={{ old('surname') }}>
            {!! $errors->first('surname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>


    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fa fa-user"></i>
                            </span>
            </div>
            <input class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" id="username" type="text"
                   name="username" placeholder="User name" value={{ old('username') }}>
            {!! $errors->first('username', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fa fa-envelope"></i>
                            </span>
            </div>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" type="email"
                   name="email" placeholder="Email" value={{ old('email') }}>
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fa fa-asterisk"></i>
                            </span>
            </div>
            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" type="password"
                   name="password" placeholder="Password">
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fa fa-asterisk"></i>
                            </span>
            </div>
            <input class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : ''}}" id="confirm_password" type="password"
                   name="confirm_password" placeholder="Confirm password">
            {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="form-group form-actions">
        <button class="btn btn-sm btn-primary" type="submit">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <button class="btn btn-sm btn-danger" type="reset">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>

</form>