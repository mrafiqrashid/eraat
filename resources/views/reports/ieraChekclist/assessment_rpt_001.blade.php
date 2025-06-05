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
        .content-style {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .content-style th,
        .content-style td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        .content-style tbody td {
            text-align: center;
        }

        .content-style thead tr:first-child td,
        .content-style thead tr:nth-child(2) td {
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
    // dd($data2);
@endphp

<body>
    <table class="instructions_style">
        <tbody>
            <tr>
                <td>
                    <h2 style="margin-bottom: 0;">
                        {{ __('APPENDIX 6:') }} {{ __('INITIAL ERGONOMICS RISK ASSESSMENT CHECKLIST') }}
                    </h2>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="content-style">
        <colgroup>
            <col style="width: 20%;"> <!-- 1st column -->
            <col style="width: 10%;"> <!-- 2nd column -->
            <col style="width: 20%;"> <!-- 3rd column -->
            <col style="width: 10%;"> <!-- 4th column -->
            <col style="width: 30%;"> <!-- 5th column -->
            <col style="width: 10%;"> <!-- 6th column -->
        </colgroup>
        <thead>
            <tr>
                <th>Risk factors</th>
                <th>Total Score</th>
                <th>Minimum requirement for advanced assessment</th>
                <th>Result of Initial ERA</th>
                <th>Any Pain or Discomfort due to risk factors as found in Musculoskeletal Assessment (Yes/No)</th>
                <th>Need Advanced ERA? (Yes/No)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Awkward Postures</td>
                <td>13</td>
                <td>>= 6</td>
                <td>{{ $data['ap_score'] ?? '' }}</td>
                <td rowspan="10">
                    <p>If YES, please tick (√) which part of the body</p>
                    <table class="content-style" style="margin-bottom: 0px;">
                        <tbody>
                            <col style="width: 80%;"> <!-- 1st column -->
                            <col style="width: 20%;"> <!-- 2nd column -->
                            <tr>
                                <td>Neck</td>
                                <td>{{ $data2['neck_a'] == 1 || $data2['neck_b'] == 1 ? '√' : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Shoulder</td>
                                <td>{{ $data2['shoulder_a'] == 1 || $data2['shoulder_b'] == 1 ? '√' : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Upper back</td>
                                <td>{{ $data2['upperBack_a'] == 1 || $data2['upperBack_b'] == 1 ? '√' : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Upper arm</td>
                                <td>{{ $data2['upperArm_a_left'] == 1 ||
                                $data2['upperArm_a_right'] == 1 ||
                                $data2['upperArm_b_left'] == 1 ||
                                $data2['upperArm_b_right'] == 1
                                    ? '√'
                                    : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Lower back</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Forearm</td>
                                <td>{{ $data2['lowerArm_a_left'] == 1 ||
                                $data2['lowerArm_a_right'] == 1 ||
                                $data2['lowerArm_b_left'] == 1 ||
                                $data2['lowerArm_b_right'] == 1
                                    ? '√'
                                    : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Wrist</td>
                                <td>{{ $data2['wrist_a_left'] == 1 ||
                                $data2['wrist_a_right'] == 1 ||
                                $data2['wrist_b_left'] == 1 ||
                                $data2['wrist_b_right'] == 1
                                    ? '√'
                                    : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Hand</td>
                                <td>{{ $data2['hand_a_left'] == 1 ||
                                $data2['hand_a_right'] == 1 ||
                                $data2['hand_b_left'] == 1 ||
                                $data2['hand_b_right'] == 1
                                    ? '√'
                                    : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Hip/buttocks</td>
                                <td>{{ $data2['lowerBack_a'] == 1 || $data2['lowerBack_b'] == 1 ? '√' : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Thigh</td>
                                <td>{{ $data2['thigh_a_left'] == 1 ||
                                $data2['thigh_a_right'] == 1 ||
                                $data2['thigh_b_left'] == 1 ||
                                $data2['thigh_b_right'] == 1
                                    ? '√'
                                    : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Knee</td>
                                <td>{{ $data2['knee_a_left'] == 1 ||
                                $data2['knee_a_right'] == 1 ||
                                $data2['knee_b_left'] == 1 ||
                                $data2['knee_b_right'] == 1
                                    ? '√'
                                    : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Calf</td>
                                <td>{{ $data2['calf_a_left'] == 1 ||
                                $data2['calf_a_right'] == 1 ||
                                $data2['calf_b_left'] == 1 ||
                                $data2['calf_b_right'] == 1
                                    ? '√'
                                    : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Ankle</td>
                                <td>{{ $data2['mdsForm_angkle_a_left'] == 1 ||
                                $data2['mdsForm_angkle_a_right'] == 1 ||
                                $data2['mdsForm_angkle_b_left'] == 1 ||
                                $data2['mdsForm_angkle_b_right'] == 1
                                    ? '√'
                                    : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Feet</td>
                                <td>{{ $data2['feet_a_left'] == 1 ||
                                $data2['feet_a_right'] == 1 ||
                                $data2['feet_b_left'] == 1 ||
                                $data2['feet_b_right'] == 1
                                    ? '√'
                                    : '' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>



                </td>
                <td>{{ $data['ap_score'] >= 6 ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Static and Sustain Work Posture</td>
                <td>3</td>
                <td>>= 1</td>
                <td>{{ $data['snswp_score'] ?? '' }}</td>
                {{-- <td></td> --}}
                <td>{{ $data['snswp_score'] >= 1 ? 'Yes' : 'No' }}</td>
            </tr>

            <tr>
                <td>Forceful Exertion</td>
                <td>3</td>
                <td>1</td>
                <td>{{ $data['fe_score'] ?? '' }}</td>
                {{-- <td></td> --}}
                <td>{{ $data['fe_score'] >= 1 ? 'Yes' : 'No' }}</td>
            </tr>


            <tr>
                <td>Repetitive Motion</td>
                <td>5</td>
                <td>>1</td>
                <td>{{ $data['rm_score'] ?? '' }}</td>
                {{-- <td></td> --}}
                <td>{{ $data['rm_score'] >= 1 ? 'Yes' : 'No' }}</td>
            </tr>

            <tr>
                <td>Vibration</td>
                <td>4</td>
                <td>>1</td>
                <td>{{ $data['vibration_score'] ?? '' }}</td>
                {{-- <td></td> --}}
                <td>{{ $data['vibration_score'] >= 1 ? 'Yes' : 'No' }}</td>
            </tr>


            <tr>
                <td>Lighting</td>
                <td>1</td>
                <td>1</td>
                <td>{{ $data['lighting_score'] ?? '' }}</td>
                {{-- <td></td> --}}
                <td>{{ $data['lighting_score'] >= 1 ? 'Yes' : 'No' }}</td>
            </tr>

            <tr>
                <td>Temperature</td>
                <td>1</td>
                <td>1</td>
                <td>{{ $data['temperature_score'] ?? '' }}</td>
                {{-- <td></td> --}}
                <td>{{ $data['temperature_score'] >= 1 ? 'Yes' : 'No' }}</td>
            </tr>

            <tr>
                <td>Ventilation</td>
                <td>1</td>
                <td>1</td>
                <td>{{ $data['ventilation_score'] ?? '' }}</td>
                {{-- <td></td> --}}
                <td>{{ $data['ventilation_score'] >= 1 ? 'Yes' : 'No' }}</td>
            </tr>

            <tr>
                <td>Noise</td>
                <td>1</td>
                <td>1</td>
                <td>{{ $data['noise_score'] ?? '' }}</td>
                {{-- <td></td> --}}
                <td>{{ $data['noise_score'] >= 1 ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
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
                <td>{{ $data->assessee['name'] ?? '' }}</td>
                <td></td>
                <td>Staff ID No.:</td>
                <td>{{ $data->assessee['employee_no'] ?? '' }}</td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>{{ $data->assessee['department'] ?? '' }}</td>
                <td></td>
                <td>Job tasks:</td>
                <td>{{ $data->task['name'] ?? '' }}</td>
            </tr>
            <tr>
                <td>Contact No.:</td>
                <td>{{ $data->assessee['contact_no'] ?? '' }}</td>
                <td></td>
                <td>Email:</td>
                <td>{{ $data->assessee['email'] ?? '' }}</td>
            </tr>
            <tr>
                <td>Date:</td>
                <td>{{ optional($data->created_at)->format('d/m/Y') }}</td>
        </tbody>
    </table>
    <p>Created in ERAAT. Printed date : {{ now()->format('d-m-Y') }}</p>
</body>

</html>
