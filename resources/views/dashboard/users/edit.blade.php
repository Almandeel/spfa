@extends('layouts.dashboard.app')

@section('title')
    @lang('users.edit')
@endsection


@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.users','global.edit'])
        @slot('url', [route('users.index'), '#'])
        @slot('icon', ['users', 'edit'])
    @endcomponent
<form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="row">
            {{-- <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        @lang('global.edit')
                    </div>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>@lang('users.username')</label>
                              <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="@lang('users.name')" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>@lang('users.email')</label>
                              <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="@lang('users.email')" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>@lang('users.password')</label>
                              <input type="password" class="form-control" name="password" placeholder="@lang('users.password')">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> @lang('global.save_changes')</button>
                    </div>
                </div>
            </div> --}}
            <div class="box">
              <div class="box-header">
                  @lang('global.edit')
              </div>
                <div class="box-body">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="name">@lang('global.name')</label>
                          <input type="text" class="form-control" name="name" placeholder="@lang('global.fullname')" value="{{ $user->name }}">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="phone">@lang('global.phone')</label>
                          <input type="text" class="form-control" name="phone" placeholder="@lang('global.phone')" value="{{ $user->phone }}">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="graduation_Date">@lang('global.graduation_date')</label>
                          <input type="date" class="form-control" name="graduation_Date" placeholder="@lang('global.graduation_date')" value="{{ $user->graduation_Date }}">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="University">@lang('global.university')</label>
                          <input type="text" class="form-control" name="university" placeholder="@lang('global.university')" value="{{ $user->university }}">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="country">@lang('global.country')</label>
                          <input id="country" name="country" type="text" class="form-control country" placeholder="@lang('global.country')" value="{{ $user->country }}">
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="adjective">@lang('global.adjective')</label>
                        <select name="adjective" class="form-control adjective">
                          <option value="0" {{ $user->adjective == 0 ? 'selected' : '' }}>@lang('users.normal')</option>
                          <option value="1" {{ $user->adjective == 1 ? 'selected' : '' }}>@lang('users.member')</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="username">@lang('global.username')</label>
                      <input id="username" name="username" type="text" class="form-control username" placeholder="@lang('global.username')" value="{{ $user->username }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">@lang('global.password')</label>
                      <input id="password" name="password" type="text" class="form-control password" placeholder="@lang('global.password')">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="status">@lang('global.status')</label>
                      <select id="status" name="status" class="form-control status">
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>@lang('global.deactive')</option>
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>@lang('global.active')</option>
                      </select>
                    </div>
                  </div>
                </div>
            </div>
          

            <div class="col-md-12">
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">@lang('users.rols_permissions')</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="box-group" id="accordion">
                      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                @lang('users.roles')
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                          <div class="box-body text-left">
                            @foreach ($roles as $role)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                          {{ $role->name }}
                                          <input type="checkbox" class="flat-red" name="roles[]" value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }} />
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                @lang('users.permissions')
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="box-body text-left">
                            
                            @foreach ($permissions as $permission)
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>
                                          {{ $permission->display_name }}

                                          <input type="checkbox" class="flat-red" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->id,$user_permissions) ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> @lang('global.save_changes')</button>
            </div>
        </div>
    </form>
@endsection
@include('partials._select2')