@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-8">
                    <h2>View Biding LOG( {{ count($data->data->data) }} )</h2>

                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Date</td>
                                <td>Project Name</td>
                                <td>Project Deatail</td>
                                <td>Project Link</td>
                                <td>Client</td>
                                <td>Country</td>
                                <td>Price</td>
                                <td>Our Bid</td>

                            </tr>
                        </thead>
                        <tbody>

                                @if ($data)
                                    @foreach ($data->data->data as $item)
                                    <tr>
                                        <td>{{ $item->project_sale->meeting_datetime }}</td>
                                        <td>{{ $item->project_sale->project_name }}</td>
                                        <td>
                                            <span class="badge bg-red" style="width: 120px;">
                                                {{ $item->project_sale->project_details }}
                                            </span>
                                        </td>
                                        <td> {{ $item->project_sale->project_link }}</td>
                                        <td> {{ $item->project_sale->client->name }}</td>
                                        <td> {{ $item->project_sale->client->country }}</td>
                                        <td> {{  $item->project_price }}</td>
                                        <td style="flex: 100px;">
                                            {{ $item->our_bid }}
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection
