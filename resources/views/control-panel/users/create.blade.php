@extends('layout.app')
@section('title')
    {{ __('Add User') }}
    @stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Add User') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <x-alert/>
                        <!-- users edit account form start -->
                        <form method="POST" action="{{ route('store-users') }}">
                            @csrf
                            <div class="row">
                                {{-- user name --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="full_name" class="form-label">{{ __('Name') }}</label>
                                        <input type="text"  class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required autofocus >
                                    </div>
                                </div>
                                {{-- end user name --}}

                                {{-- user email --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input id="email" class="form-control"  type="email" name="email" value="{{ old('email') }}" required >
                                    </div>
                                </div>
                                {{-- end user email --}}

                                {{-- username for user --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="user_name" class="form-label">{{ __('Username') }}</label>
                                        <input id="user_name" class="form-control"  type="text" name="user_name" value="{{ old('user_name') }}" required >
                                    </div>
                                </div>
                                {{-- end username --}}

                                {{-- user password --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input class="form-control"
                                               type="password"
                                               name="password"
                                               id="password"
                                               required autocomplete="new-password">
                                    </div>
                                </div>
                                {{-- end user password --}}

                                {{-- password confirm --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                        <input type="password" id="password_confirmation" class="form-control"  name="password_confirmation" required >
                                    </div>
                                </div>
                                {{-- end password confirm --}}

                                {{-- user phone number --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">{{ __('Mobile Number') }}</label>
                                        <input type="text" id="phone" value="{{ old('phone') }}" name="phone" class="form-control">
                                    </div>
                                </div>
                                {{-- end phone number --}}

                                {{-- user role --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="role_id" class="form-label">{{ __('Role') }}</label>
                                        <select name="role_id" id="role_id" class="form-control">
                                            @foreach(App\Models\Role::where('id','<>',1)->get() as $role)
                                                <option @if(old('role_id') == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- end user role --}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <button type="reset" class="btn btn-light">{{ __('Cencel') }}</button>
                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->

                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection
