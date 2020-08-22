<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $setting->site_name }}</title>
    @if(app()->getLocale() == 'ar')
      <style>
          body {
            direction: rtl;
          }
      </style>
    @endif
    <style>

      body {
        font-family: "XB Riyaz";
      }
        
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
  border-collapse: collapse;
  border-spacing: 0;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #eceeef;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #eceeef;
}

.table tbody + tbody {
  border-top: 2px solid #ddd;
}

.table .table {
  background-color: #fff;
}

.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered {
  border: 1px solid #ddd;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #ddd;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-active,
.table-active > th,
.table-active > td {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover > td,
.table-hover .table-active:hover > th {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-success,
.table-success > th,
.table-success > td {
  background-color: #dff0d8;
}

.table-hover .table-success:hover {
  background-color: #d0e9c6;
}

.table-hover .table-success:hover > td,
.table-hover .table-success:hover > th {
  background-color: #d0e9c6;
}

.table-info,
.table-info > th,
.table-info > td {
  background-color: #d9edf7;
}

.table-hover .table-info:hover {
  background-color: #c4e3f3;
}

.table-hover .table-info:hover > td,
.table-hover .table-info:hover > th {
  background-color: #c4e3f3;
}

.table-warning,
.table-warning > th,
.table-warning > td {
  background-color: #fcf8e3;
}

.table-hover .table-warning:hover {
  background-color: #faf2cc;
}

.table-hover .table-warning:hover > td,
.table-hover .table-warning:hover > th {
  background-color: #faf2cc;
}

.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #f2dede;
}

.table-hover .table-danger:hover {
  background-color: #ebcccc;
}

.table-hover .table-danger:hover > td,
.table-hover .table-danger:hover > th {
  background-color: #ebcccc;
}

.thead-inverse th {
  color: #fff;
  background-color: #292b2c;
}

.thead-default th {
  color: #464a4c;
  background-color: #eceeef;
}

.table-inverse {
  color: #fff;
  background-color: #292b2c;
}

.table-inverse th,
.table-inverse td,
.table-inverse thead th {
  border-color: #fff;
}

.table-inverse.table-bordered {
  border: 0;
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.table-responsive.table-bordered {
  border: 0;
}
.row {
  margin-left: -15px;
  margin-right: -15px;
}

.col-md-6 {
  float:left;
  width:50%;
}

@page {
  header: page-header;
  footer: page-footer;
}

.header {
  border:1px solid #000;
  text-align:center !important;
  margin-bottom:10px;
}

.footer {
  text-align:center;
}
    </style>
</head>
<body>
    {{-- <htmlpageheader name="page-header"> --}}
        <div class="header">
          <h1 class="text-center">{{ $setting->site_name }}</h1>
          <h2>@lang('global.report_members')</h2>
          <p>@lang('global.members_count') : {{ count($members) }}</p>
       </div>
    {{-- </htmlpageheader> --}}
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>@lang('global.name')</th>
            <th>@lang('global.phone')</th>
            <th>@lang('global.country')</th>
            <th>@lang('global.graduation_date')</th>
            <th>@lang('global.university')</th>
            <th>@lang('global.adjective')</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
              <tr>
                  <td scope="row">{{ $member->id }}</td>
                  <td>{{ $member->name }}</td>
                  <td>{{ $member->phone }}</td>
                  <td>{{ $member->country }}</td>
                  <td>{{ $member->graduation_Date }}</td>
                  <td>{{ $member->university }}</td>
                  <td>{{ $member->adjective }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    <htmlpagefooter name="page-footer" class="footer">
      <div class="row">
        <div class="col-md-6">
          {PAGENO}
        </div>
        <div class="col-md-6">
          {{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}
        </div>
      </div>
    </htmlpagefooter>
</body>
</html>