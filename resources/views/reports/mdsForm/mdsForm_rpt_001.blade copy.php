<!DOCTYPE html>
<html lang="en">

<head>
    @if ($request['reportType'] == 'pdf')
    <title>{{ $request['titleReport'] ? $request['titleReport'] : ' - ' }}</title>
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- @include('vendor.backpack.crud.inc.style_export') --}}
</head>
@php
use Carbon\Carbon;
@endphp

<body>
    {{-- Top title --}}
    {{-- @if ($request['reportType'] == 'pdf') --}}
    <table class="title_style">
        <tbody>
            <tr>
                {{-- <td class="column-small"><img src={{ $imageLink }} height="80px" width="80px"></td> --}}
                <td>
                    <h2 style="text-align: start; padding: 0px 10px 0px 10px;">
                        {{ __('Appenddix 1') }} {{ __('SELF ASSESSMENT MUSCULOSKELETAL PAIN / DISCOMFORT SURVEY FORM')
                        }}
                    </h2>
                </td>
                {{-- <td class="column-small"></td> --}}
            </tr>
        </tbody>
    </table>

    {{-- <section class="container-fluid style3">
        <h3 style="text-align: center; padding: 0px;margin: 0px;">
            {{ $request['titleReport'] ? $request['titleReport'] : ' - ' }}</h3>
        <hr>
        <p> {{ __('Name: ') }}
            {{ $request['name']
            ? ucwords(str_replace('-', ' ', strtolower($request['name'])))
            : ' -
            ' }}
        </p>
    </section>
    @elseif ($request['reportType'] == 'xlsx')
    <table class="table-style2" style="margin-bottom: 30px;">
        <tbody>
            <tr>
                <td><img class="rounded mx-auto d-block" src={{ $imageLink }} height="80px" width="80px">
                </td>
                <td colspan="8">
                    <h2>
                        {{ __('MKH Mart') }}
                    </h2>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="8">
                    <h3 style="text-align: center; padding: 0px;margin: 0px;">
                        {{ $request['titleReport'] ? $request['titleReport'] : ' - ' }}
                    </h3>
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td colspan="2">
                    {{ __('Name: ') }}
                </td>
                <td colspan="3">
                    {{ $request['name'] ? ucwords(str_replace('-', ' ',
                    strtolower($request['name']))) : ' - ' }}
                </td>
            </tr>
        </tbody>
    </table>
    @endif
    <table class="style3">
        <thead>
            <tr>
                <th>
                    <center>{{ __('NO') }}</center>
                </th>
                <th>
                    <center>{{ __('Name') }}</center>
                </th>
                <th>
                    <center>{{ __('Bond') }}</center>
                </th>
                <th>
                    <center>{{ __('Paid') }}</center>
                </th>
                <th>
                    <center>{{ __('Pending Payment') }}</center>
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($data->count() < 1) <tr>
                <td colspan="5" style="text-align: center">{{ __('No data available') }}</td>
                </tr>
                @endif
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name ? $item->name : ' - ' }}</td>
                    <td>{{ $item->bond ? number_format($item->bond, 2) : ' - ' }}</td>
                    <td>{{ $item->paid ? number_format($item->paid, 2) : ' - ' }}</td>
                    <td>{{ $item->pending_payment ? number_format($item->pending_payment, 2) : ' - ' }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2" align="right"><strong>Total</strong></td>
                    <td><strong>{{ number_format($data->sum('bond'), 2) }}</strong></td>
                    <td><strong>{{ number_format($data->sum('paid'), 2) }}</strong></td>
                    <td><strong>{{ number_format($data->sum('pending_payment'), 2) }}</strong></td>
                </tr>
        </tbody>
    </table> --}}


    <p>Created in MKH Mart. Printed date : {{ now()->format('d-m-Y') }}</p>
</body>

</html>