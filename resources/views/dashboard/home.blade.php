@extends('layouts.base-admin')
@section('content')
<div class="container">

  <div class="row">
  
    <!--<div class="panel-group">-->
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">

              <h4 class="glyphicon glyphicon-home fa-lg" aria-hidden="true"> {{$user->properties}}</h4>

            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">{{$totallistings}} Listings</div>
              <div><b>{{$activelistings}} Active Listings</b></div>
            </div>
          </div>
        </div>

        <div class="panel-body">
          <span class="pull-left">Number of properties that are listed.</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>

      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <h4 class="glyphicon glyphicon-user fa-lg" aria-hidden="true"></h4>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">{{$user->first_name}} {{$user->last_name}}</div>
              <div><b>{{$user->privilege}}</b></div>
            </div>
          </div>
        </div>

        <div class="panel-body">
          <span class="pull-left">Weclome Back! Your last login was at {{$user->updated_at}}.</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>

      </div>
    </div>
    <div class="col-md-6 col-md-offset-6">

      <div class="row">
        <form class="form-horizontal" role="form" method="GET" action="/dashboard/search">
          <div class="col-md-12" style="padding-bottom:10px;">
            <!-- Form Name -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-group">
              @if ($search != '')
              <input type="text" class="form-control" name="search" id="search" value="{{$search}}" placeholder="Search for a listing...">
              @else
              <input type="text" class="form-control" name="search" id="search" value="" placeholder="Search for a listing...">
              @endif
              <span class="input-group-btn">
                <button id="btnSubmit" name="btnSubmit" class="btn btn-default">Search</button>
              </span>
            </div>

          </div></div>

        </div>
      </form>

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">

              <div class="col-md-6">
                Listings

              </div>
              <div class="col-md-3">
              </div>
              <div class="col-md-3">
                <a href="/dashboard/listing/create" class="btn btn-default btn-sm" role="button">Add New</a>

                <a href="#" class="btn btn-default btn-sm" role="button">Select All</a>
                <a href="#" class="btn btn-default btn-sm" role="button">Delete</a>

              </div>
            </div>
          </div>
          <!--<div class="panel-body"></div>-->

          <table class="table table-striped task-table">


            <thead>
              <th>Status</th>
              <th>Address</th>

              <th>
                <div class="col-md-offset-8">Modify</div>
              </th>
            </thead>


            <tbody>
              @if ($listings !== 0)
              @forelse ($listings as $listing)
              <tr>
                <td>
                  <input type="checkbox">
                  @if ($listing->type == 'For Sale')
                  <button type="button" class="btn btn-success btn-xs">For Sale</button>
                  @endif
                  @if ($listing->type == 'For Rent')
                  <button type="button" class="btn btn-success btn-xs">For Rent</button>
                  @endif
                  @if ($listing->type == 'Unavailable')
                  <button type="button" class="btn btn-danger btn-xs">Unavailable</button>
                  @endif
                </td>

                <td class="table-text">
                  <div>{{$listing-> house_num}} {{$listing-> street_name}} {{$listing->city}}, {{$listing->state}}, {{$listing->zip}}
                  </div>
                </td>

                <td>
                  <div class="col-md-offset-8">
                    <a href="/dashboard/listing/edit/{{ $listing->id }}" class="btn btn-default btn-sm" role="button">Edit</a>
                    <a href="/dashboard/listing/delete/{{ $listing->id }}" class="btn btn-default btn-sm" onclick="return confirm('Are you sure?')" role="button">Delete</a>
                  </div>
                </td>


              </tr>
              @endforeach

            </tbody>
          </table>

          <!--
          @forelse ($listings as $listing)
          <div class="row">
          <hr style="clear:both;">

          <div class="col-md-2">
          @if ($listing->type == 'For Sale')
          <button type="button" class="btn btn-success btn-sm">For Sale</button>
          @endif
          @if ($listing->type == 'For Rent')
          <button type="button" class="btn btn-success btn-sm">For Rent</button>
          @endif
          @if ($listing->type == 'Unavailable')
          <button type="button" class="btn btn-danger btn-sm">Unavailable</button>
          @endif
        </div>

        <div class="col-md-7">
        {{$listing-> house_num}} {{$listing-> street_name}} {{$listing->city}}, {{$listing->state}}, {{$listing->zip}}
      </div>

      <div class="col-md-2">
      <a href="/dashboard/listing/edit/{{ $listing->id }}" class="btn btn-primary" role="button">Edit</a>
      <a href="/dashboard/listing/delete/{{ $listing->id }}" class="btn btn-danger" onclick="return confirm('Are you sure?')" role="button">Delete</a>
    </div>
    <div class="col-md-1">
    <div class="checkbox">
    <label>
    <input type="checkbox">
  </label>
</div>
</div>
</div>
</hr>
@empty
<p>You do not have any properties listed!</p>

@endforelse
</div>
</div>


</div>-->



</div>
</div>

<div class="row">
  <div class="col-md-2 col-md-offset-5 col-sm-8 col-sm-offset-1 col-xs-offset-3">{!! $listings->render() !!}</div>
</div>
@endif
</div>
</div>
@stop
