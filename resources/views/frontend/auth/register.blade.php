@extends('frontend.default-bare')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <img src="{{asset(sprintf('media/img/site/%s',env('APP_LOGO_FILENAME')))}}">
        </div>
        <div class="row justify-content-md-center mt-5">
            <h3 class="font-light mb-0">{{trans('auth.register_account')}}</h3>
        </div>
        <div class="row justify-content-md-center mt-3">
            @if($errors->has('recaptcha'))
                <div class="row justify-content-md-center mt-3">
                    <div class="col-md-8">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">{{ trans('auth.alerts.recaptcha_title') }}</h4>
                            <p>{{ trans('auth.alerts.recaptcha_body') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-8">
                <div id="user_register_container" class="card card-shadow">
                    <div class="card-body">
                        <div class="row justify-content-md-center my-3">
                            <div class="col-md-8">
                                <h5 class="font-light text-danger">{{ trans('auth.required_fields') }}</h5>
                            </div>
                        </div>
                        <inline-form :id="'register-form'" :action="'{{ route('register.do') }}'"
                                     :method="'POST'">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('pages.profile.first_name')}}</label>
                                <div class="col-lg-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name"
                                           value="{{ old('first_name') }}"
                                           maxlength="75"
                                           autocomplete="given-name"
                                           required>
                                    @if ($errors->has('first_name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">{{trans('pages.profile.last_name')}}</label>
                                <div class="col-lg-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           name="last_name"
                                           value="{{ old('last_name') }}"
                                           maxlength="75"
                                           autocomplete="family-name"
                                           required>
                                    @if ($errors->has('last_name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right field-required">
                                    <span class="form-has-help"
                                          data-toggle="tooltip"
                                          data-placement="top"
                                          data-original-title="{{trans('auth.register_username_help')}}">{{trans('pages.profile.username')}}</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username"
                                           value="{{ old('username') }}"
                                           maxlength="15"
                                           autocomplete="username"
                                           required>
                                    @if ($errors->has('username'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right field-required">{{trans('auth.email_address')}}</label>
                                <div class="col-lg-6">
                                    <input type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right field-required">
                                    <span class="form-has-help"
                                          data-toggle="tooltip"
                                          data-placement="top"
                                          data-original-title="{{trans('auth.password_help')}}">{{trans('pages.profile.password')}}</span>
                                </label>
                                <div class="col-lg-6">
                                    <password-strength
                                            :has-errors="{{ $errors->has('password') ? 'true' : 'false' }}"
                                            :name="'password'"
                                            :label-hide="'{{trans('auth.hide_password')}}'"
                                            :label-show="'{{trans('auth.show_password')}}'"
                                            :secure-length="6"
                                            :required="true">
                                    </password-strength>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right field-required">{{
                                                                                    trans('pages.profile.confirm_password')
                                                                                }}</label>
                                <div class="col-lg-6">
                                    <input type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password_confirmation"
                                           required>
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row pt-3">
                                <div class="col-xl-8 offset-xl-2 col-lg-6 offset-lg-3">
                                    <submit-button
                                            ref="submitButton"
                                            :block="true" :value="'{{trans('auth.register')}}'"></submit-button>
                                </div>
                            </div>
                            <input type="hidden" class="g-recaptcha" name="g-recaptcha" value="">
                            <input type="hidden" id="user-date" name="stat_user_timezone">
                        </inline-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('frontend.scripts.google-recaptcha', ['action'=>'register'])
@endsection
