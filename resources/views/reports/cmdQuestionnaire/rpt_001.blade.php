<!DOCTYPE html>
<html lang="en">

<head>
    @if ($request['reportType'] == 'pdf')
        <title>{{ $request['titleReport'] ? $request['titleReport'] : ' - ' }}</title>
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- @include('vendor.backpack.crud.inc.style_export') --}}
    <style>
        .mdsForm-table-style {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .mdsForm-table-style th,
        .mdsForm-table-style td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        .mdsForm-table-style tbody td {
            text-align: center;
        }

        .mdsForm-table-style thead tr:first-child td,
        .mdsForm-table-style thead tr:nth-child(2) td {
            background-color: #d3d3d3;
            /* Light grey background */
            font-weight: bold;
        }

        .instructions_style {
            margin-bottom: 30px;
        }


        .assassee-table-style {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .assassee-table-style th,
        .assassee-table-style td {
            border: none;
            /* or border: 0; */
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        .assassee-table-style tbody td {
            text-align: start;
        }

        .assassee-table-style td:nth-child(2),
        .assassee-table-style td:nth-child(5) {
            border-bottom: 1px solid #000;
        }
    </style>
</head>
@php
    use Carbon\Carbon;
    // dd($data, $data->employee);
@endphp

<body>
    {{-- Top title --}}
    {{-- @if ($request['reportType'] == 'pdf') --}}
    <table class="instructions_style">
        <tbody>
            <tr>
                <td>
                    <h2 style="margin-bottom: 0;">
                        {{ __('Appendix 3:') }} {{ __('Cornell Musculoskeletal Discomfort Questionnaires') }}
                    </h2>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;">
                    <p><strong><u>Instructions:</u></strong></p>
                </td>
            </tr>
            <tr>
                <td>
                    <ol style="padding-left: 1rem; margin: 0;">
                        <li>The diagram below shows the approximate position of the body parts referred to in the
                            questionnaire. Please answer by
                            <strong>marking</strong> the appropriate box.
                        </li>
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="mdsForm-table-style">
        <colgroup>
            {{-- <col style="width: 20%;"> <!-- 1st column -->
            <col style="width: 20%;"> <!-- 2nd column -->
            <col style="width: 20%;"> <!-- 3rd column -->
            <col style="width: 20%;"> <!-- 4th column -->
            <col style="width: 20%;"> <!-- 5th column --> --}}
        </colgroup>
        <thead>
            <tr>
                <td style="border-bottom: none"></td>
                <td colspan="5" style="text-align: center">During the last work week how often did you experience
                    ache,
                    pain, discomfort in:</td>
                <td colspan="3" style="text-align: center">If you experienced ache, pain, discomfort, how
                    uncomfortable
                    was this?</td>
                <td colspan="3" style="text-align: center">If you experienced ache, pain discomfort, did this
                    interfere
                    with your ability to work?</td>
                <td style="border-bottom: none"></td>
            </tr>
            <tr>
                <td style="border-top: none">Body Parts</td>
                <td>Never</td>
                <td>1-2 times last week</td>
                <td>3-4 times last week</td>
                <td>Once every day</td>
                <td>Several times every day</td>
                <td>Slightly uncomfortable</td>
                <td>Moderately uncomfortable</td>
                <td>Very uncomfortable</td>
                <td>Not at all</td>
                <td>Slightly interfered</td>
                <td>Substantly interfered</td>
                <td style="border-top: none">Score</td>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Neck</td>
                @php
                    $bodyPart = 'neck';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Shoulder</td>
                @php
                    $bodyPart = 'shoulder_right';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Shoulder</td>
                @php
                    $bodyPart = 'shoulder_left';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Upper Back</td>
                @php
                    $bodyPart = 'upper_back';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Upper Arm</td>
                @php
                    $bodyPart = 'upper_arm_right';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Upper Arm</td>
                @php
                    $bodyPart = 'upper_arm_left';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Lower Back</td>
                @php
                    $bodyPart = 'lower_back';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>

            <tr>
                <td>Forarm</td>
                @php
                    $bodyPart = 'forearm_right';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>

                <td>Forearm</td>
                @php
                    $bodyPart = 'forearm_left';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Wrist</td>
                @php
                    $bodyPart = 'wrist_right';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Wrist</td>
                @php
                    $bodyPart = 'wrist_left';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Hip/Buttocks</td>
                @php
                    $bodyPart = 'hip_or_buttocks';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Thigh</td>
                @php
                    $bodyPart = 'thigh_right';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Thigh</td>
                @php
                    $bodyPart = 'thigh_left';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Knee</td>
                @php
                    $bodyPart = 'knee_right';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Knee</td>
                @php
                    $bodyPart = 'knee_left';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Lower Leg</td>
                @php
                    $bodyPart = 'lower_leg_right';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Lower Leg</td>
                @php
                    $bodyPart = 'lower_leg_left';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Foot</td>
                @php
                    $bodyPart = 'foot_right';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
            <tr>
                <td>Foot</td>
                @php
                    $bodyPart = 'foot_left';
                @endphp
                <td>{{ $data[$bodyPart . '_a'] == 0 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 1.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 3.5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 5 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_a'] == 10 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_b'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_b'] == 3 ? '√' : '' }}</td>


                <td>{{ $data[$bodyPart . '_c'] == 1 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 2 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_c'] == 3 ? '√' : '' }}</td>
                <td>{{ $data[$bodyPart . '_score'] ?? 0.0 }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td style="text-align: end; font-weight: bold;" colspan="12">Total Score</td>
                <td>{{ $data['cmdQuestionnaire_totalScore'] ?? 0.0 }}</td>
            </tr>
        </tfoot>
    </table>


    <table class="assassee-table-style">
        <colgroup>
            <col style="width: 15%;"> <!-- 1st column -->
            <col style="width: 35%;"> <!-- 2nd column -->
            <col style="width: 10%;"> <!-- 3rd column -->
            <col style="width: 15%;"> <!-- 4rd column -->
            <col style="width: 25%;"> <!-- 5th column -->

        </colgroup>
        <tbody>
            <tr>
                <td>Name:</td>
                <td>{{ $data->employee['name'] ?? '' }}</td>
                <td></td>
                <td>Staff ID No.:</td>
                <td>{{ $data->employee['employee_no'] ?? '' }}</td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>{{ $data->employee['department'] ?? '' }}</td>
                <td></td>
                <td>Email:</td>
                <td>{{ $data->employee['email'] ?? '' }}</td>
            </tr>
            <tr>
                <td>Contact No.:</td>
                <td>{{ $data->employee['contact_no'] ?? '' }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td>{{ optional($data->created_at)->format('d/m/Y') }}</td>
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
                <td>{{ ($data['sholder_right_b'] == 1) ? '√' : '' }}</td>
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
                <td colspan="5">
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
                    <td colspan="5" align="right"><strong>Total</strong></td>
                    <td><strong>{{ number_format($data->sum('bond'), 2) }}</strong></td>
                    <td><strong>{{ number_format($data->sum('paid'), 2) }}</strong></td>
                    <td><strong>{{ number_format($data->sum('pending_payment'), 2) }}</strong></td>
                </tr>
        </tbody>
    </table> --}}


    <p>Created in ERAAT. Printed date : {{ now()->format('d-m-Y') }}</p>
</body>

</html>
