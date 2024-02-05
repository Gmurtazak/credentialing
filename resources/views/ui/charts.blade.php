@extends('layouts.app')

@section('content')
<div class="page-body patient-book">
        <div class="container-fluid">
             
            <div class="row top-bar">
                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif
                <div class="col-sm-12 col-xl-7">
                    <h2>{{ __('DIGITAL SALES DASHBOARD') }}</h2>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-3">
                           <div class="col-md-12 card">
                                <figure">
                                    <div id="chart1"></div>
                                </figure>
                                <div class="row chart-description">
                                    <div class="col-md-6">
                                        <p>$ 10000</p>
                                        <p>Yearly Target</p>
                                    </div>
                                    <div class="col-md-6 chart-description">
                                        <p>$ 10000</p>
                                        <p>Yearly Target</p>
                                    </div>
                                </div>
                           </div>
                           <div class="col-md-12 card">
                                <figure">
                                    <div id="chart2"></div>
                                </figure>
                                <div class="row chart-description">
                                    <div class="col-md-6">
                                        <p>$ 10000</p>
                                        <p>Yearly Target</p>
                                    </div>
                                    <div class="col-md-6 chart-description">
                                        <p>$ 10000</p>
                                        <p>Yearly Target</p>
                                    </div>
                                </div>
                           </div>
                        </div>
                        <div class="col-md-3" id="executive-box">
                            <div class="card col-12">
                                <p>Top 5 Executives</p>
                                <div class="executive-list">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" width="80" height="80" alt="Sample Image">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Jhon Carter</h5>
                                            <div class="row">
                                                <div class="col-md-6">Sales</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Target</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="executive-list">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" width="80" height="80" alt="Sample Image">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Jhon Carter</h5>
                                            <div class="row">
                                                <div class="col-md-6">Sales</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Target</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="executive-list">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" width="80" height="80" alt="Sample Image">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Jhon Carter</h5>
                                            <div class="row">
                                                <div class="col-md-6">Sales</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Target</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="executive-list">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" width="80" height="80" alt="Sample Image">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Jhon Carter</h5>
                                            <div class="row">
                                                <div class="col-md-6">Sales</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Target</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12 card">
                                    <figure">
                                        <div id="charta"></div>
                                    </figure>
                                    <div class="row chart-description">
                                        <div class="col-md-6">
                                            <p>$ 10000</p>
                                            <p>Yearly Target</p>
                                        </div>
                                        <div class="col-md-6 chart-description">
                                            <p>$ 10000</p>
                                            <p>Yearly Target</p>
                                        </div>
                                    </div>
                            </div>
                           <div class="col-md-12 card">
                                <figure">
                                    <div id="chartb"></div>
                                </figure>
                                <div class="row chart-description">
                                    <div class="col-md-6">
                                        <p>$ 10000</p>
                                        <p>Yearly Target</p>
                                    </div>
                                    <div class="col-md-6 chart-description">
                                        <p>$ 10000</p>
                                        <p>Yearly Target</p>
                                    </div>
                                </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12 card">
                                <figure">
                                    <div id="chart3"></div>
                                </figure>
                            </div>
                            <div class="col-md-12 card">
                                <figure">
                                    <div id="chart4"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <figure class="card">
                                <div id="teams"></div>
                            </figure>
                        </div>
                        <div class="col-md-6 card">
                            <div class="col-12">
                                <p>Top 5 Executives</p>
                                <div class="executive-list">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" width="80" height="80" alt="Sample Image">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Jhon Carter
                                            </p><div class="row">
                                                <div class="col-md-6">Sales</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Target</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="executive-list">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" width="80" height="80" alt="Sample Image">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Jhon Carter
                                            </p><div class="row">
                                                <div class="col-md-6">Sales</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Target</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="executive-list">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" width="80" height="80" alt="Sample Image">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Jhon Carter
                                            </p><div class="row">
                                                <div class="col-md-6">Sales</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Target</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="executive-list">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" width="80" height="80" alt="Sample Image">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Jhon Carter
                                            </p><div class="row">
                                                <div class="col-md-6">Sales</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Target</div>
                                                <div class="col-md-6">2351</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <figure class="card">
                                <div id="currentSales"></div>
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <figure class="card">
                                <div id="variation"></div>
                            </figure>
                        </div>
                    </div>

                    <div class="row">
                    @if(userRole(\Auth::user()->id) == 'administrator')
                  
                            
                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                               <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"/>
                                           </svg>
                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> Sales Project</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                       <a role="button" tabindex="0" href="{{ route('sale') }}?non_sale=1" class="btn btn-danger">Project list</a>
                                   </div>

                               </div>
                           </div>
                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-bezier2" viewBox="0 0 16 16">
                                               <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                                           </svg>
                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> No.Project</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                   </div>

                               </div>
                           </div>
                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-browser-safari" viewBox="0 0 16 16">
                                               <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm.25-14.75v1.5a.25.25 0 0 1-.5 0v-1.5a.25.25 0 0 1 .5 0Zm0 12v1.5a.25.25 0 1 1-.5 0v-1.5a.25.25 0 1 1 .5 0ZM4.5 1.938a.25.25 0 0 1 .342.091l.75 1.3a.25.25 0 0 1-.434.25l-.75-1.3a.25.25 0 0 1 .092-.341Zm6 10.392a.25.25 0 0 1 .341.092l.75 1.299a.25.25 0 1 1-.432.25l-.75-1.3a.25.25 0 0 1 .091-.34ZM2.28 4.408l1.298.75a.25.25 0 0 1-.25.434l-1.299-.75a.25.25 0 0 1 .25-.434Zm10.392 6 1.299.75a.25.25 0 1 1-.25.434l-1.3-.75a.25.25 0 0 1 .25-.434ZM1 8a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 0 .5h-1.5A.25.25 0 0 1 1 8Zm12 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 1 1 0 .5h-1.5A.25.25 0 0 1 13 8ZM2.03 11.159l1.298-.75a.25.25 0 0 1 .25.432l-1.299.75a.25.25 0 0 1-.25-.432Zm10.392-6 1.299-.75a.25.25 0 1 1 .25.433l-1.3.75a.25.25 0 0 1-.25-.434ZM4.5 14.061a.25.25 0 0 1-.092-.341l.75-1.3a.25.25 0 0 1 .434.25l-.75 1.3a.25.25 0 0 1-.342.091Zm6-10.392a.25.25 0 0 1-.091-.342l.75-1.299a.25.25 0 1 1 .432.25l-.75 1.3a.25.25 0 0 1-.341.09ZM6.494 1.415l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM9.86 13.972l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM3.05 3.05a.25.25 0 0 1 .354 0l.353.354a.25.25 0 0 1-.353.353l-.354-.353a.25.25 0 0 1 0-.354Zm9.193 9.193a.25.25 0 0 1 .353 0l.354.353a.25.25 0 1 1-.354.354l-.353-.354a.25.25 0 0 1 0-.353ZM1.545 6.01l.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.482Zm12.557 3.365.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.483Zm-12.863.436a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177Zm12.557-3.365a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177ZM3.045 12.944a.299.299 0 0 1-.029-.376l3.898-5.592a.25.25 0 0 1 .062-.062l5.602-3.884a.278.278 0 0 1 .392.392L9.086 9.024a.25.25 0 0 1-.062.062l-5.592 3.898a.299.299 0 0 1-.382-.034l-.005-.006Zm3.143 1.817a.25.25 0 0 1-.176-.306l.129-.483a.25.25 0 0 1 .483.13l-.13.483a.25.25 0 0 1-.306.176ZM9.553 2.204a.25.25 0 0 1-.177-.306l.13-.483a.25.25 0 1 1 .483.13l-.13.483a.25.25 0 0 1-.306.176Z"/>
                                           </svg>

                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> Project Price</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                   </div>

                               </div>
                           </div>
                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">

                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                               <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                                           </svg>
                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> Sale Amount</span>
                                       </h4>
                                       <p class="mb-4"></p>

                                   </div>

                               </div>
                           </div>
                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                                               <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z"/>
                                           </svg>
                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> Amount Received</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                   </div>

                               </div>
                           </div>
                           <div class="mb-4 col-md-4 col-sm-6">

                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-kanban" viewBox="0 0 16 16">
                                               <path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h11zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11z"/>
                                               <path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3z"/>
                                           </svg>

                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> Amount Due</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                   </div>

                               </div>
                           </div>
                       @else
                       <!-- partial:index.partial.html -->
                           <div class="mb-12 col-md-12 col-sm-6">
                               <figure class="highcharts-figure">
                                   <div id="container-speed" class="chart-container"></div>
                                   <p class="highcharts-description">

                                   </p>
                               </figure>
                           </div>
                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                               <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"/>
                                           </svg>
                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> Sales Project</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                       <a role="button" tabindex="0" href="{{ route('sale') }}?non_sale=1" class="btn btn-danger">Project list</a>
                                   </div>

                               </div>
                           </div>

                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                                               <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z"></path>
                                           </svg>

                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal">Team Target</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                       ${{ $data->stats[0]->teamtarget }}
                                   </div>

                               </div>
                           </div>
                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 20 20">
                                               <path d="M17.659,9.597h-1.224c-0.199-3.235-2.797-5.833-6.032-6.033V2.341c0-0.222-0.182-0.403-0.403-0.403S9.597,2.119,9.597,2.341v1.223c-3.235,0.2-5.833,2.798-6.033,6.033H2.341c-0.222,0-0.403,0.182-0.403,0.403s0.182,0.403,0.403,0.403h1.223c0.2,3.235,2.798,5.833,6.033,6.032v1.224c0,0.222,0.182,0.403,0.403,0.403s0.403-0.182,0.403-0.403v-1.224c3.235-0.199,5.833-2.797,6.032-6.032h1.224c0.222,0,0.403-0.182,0.403-0.403S17.881,9.597,17.659,9.597 M14.435,10.403h1.193c-0.198,2.791-2.434,5.026-5.225,5.225v-1.193c0-0.222-0.182-0.403-0.403-0.403s-0.403,0.182-0.403,0.403v1.193c-2.792-0.198-5.027-2.434-5.224-5.225h1.193c0.222,0,0.403-0.182,0.403-0.403S5.787,9.597,5.565,9.597H4.373C4.57,6.805,6.805,4.57,9.597,4.373v1.193c0,0.222,0.182,0.403,0.403,0.403s0.403-0.182,0.403-0.403V4.373c2.791,0.197,5.026,2.433,5.225,5.224h-1.193c-0.222,0-0.403,0.182-0.403,0.403S14.213,10.403,14.435,10.403"></path>
                                           </svg>

                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> Remaining Target</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                       $<span style="color: red" id="remaintarget"></span>

                                   </div>

                               </div>
                           </div>

                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-kanban" viewBox="0 0 16 16">
                                               <path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h11zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11z"></path>
                                               <path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3z"></path>
                                           </svg>

                                       </div>
                                       {{ ! $usertSales = DB::table('project_sales')->where([
                                               ['created_by',\Auth::user()->id],
                                               ['is_convertion' ,'=', 1]
                                           ])->whereMonth('created_at', date('m'))->sum('project_price') }}
                                       <input id="getusersale" value="{{$usertSales}}" type="hidden">
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> Today Bids</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                       ${{ $data->stats[0]->todayProjectCount }}
                                   </div>

                               </div>
                           </div>
                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-bezier2" viewBox="0 0 16 16">
                                               <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                                           </svg>

                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> No.Project</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                       ${{  $allProjectSales = DB::table('project_sales')->where('created_by',\Auth::user()->id)->whereMonth('created_at', date('m'))->count('project_price') }}
                                   </div>

                               </div>
                           </div>
                           <div class="mb-4 col-md-4 col-sm-6">
                               <div class="h-100 card">
                                   <div class="text-center card-body">
                                       <div class="icon icon-xl mx-auto mb-4 bg-danger-light">

                                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                               <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                                           </svg>
                                       </div>
                                       <h4 class="mt-3"><span class="text-danger"></span>
                                           <span class="fw-normal"> Project Price</span>
                                       </h4>
                                       <p class="mb-4"></p>
                                       ${{  $allProjectSales = DB::table('project_sales')->where('created_by',\Auth::user()->id)->whereMonth('created_at', date('m'))->sum('project_price') }}
                                   </div>

                               </div>
                           </div>

                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        function chartSpeedoMeter(id,title){

            Highcharts.chart(id, {
                chart: {
                            type: 'gauge',
                            plotBackgroundColor: null,
                            plotBackgroundImage: null,
                            plotBorderWidth: 0,
                            plotShadow: false,
                            height: '80%'
                },

                title: {
                    text: title
                },

                pane: {
                    startAngle: -90,
                    endAngle: 89.9,
                    background: null,
                    center: ['50%', '75%'],
                    size: '110%'
                },

                // the value axis
                yAxis: {
                    min: 0,
                    max: 200,
                    tickPixelInterval: 72,
                    tickPosition: 'inside',
                    tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                    tickLength: 20,
                    tickWidth: 2,
                    minorTickInterval: null,
                    labels: {
                        distance: 20,
                        style: {
                            fontSize: '14px'
                        }
                    },
                    plotBands: [{
                        from: 0,
                        to: 120,
                        color: '#55BF3B', // green
                        thickness: 20
                    }, {
                        from: 120,
                        to: 160,
                        color: '#DDDF0D', // yellow
                        thickness: 20
                    }, {
                        from: 160,
                        to: 200,
                        color: '#DF5353', // red
                        thickness: 20
                    }]
                },

                series: [{
                    name: 'Speed',
                    data: [80],
                    tooltip: {
                        valueSuffix: '%'
                    },
                    dataLabels: {
                        format: '{y} %',
                        borderWidth: 0,
                        color: (
                            Highcharts.defaultOptions.title &&
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || '#333333',
                        style: {
                            fontSize: '16px'
                        }
                    },
                    dial: {
                        radius: '80%',
                        backgroundColor: 'gray',
                        baseWidth: 12,
                        baseLength: '0%',
                        rearLength: '0%'
                    },
                    pivot: {
                        backgroundColor: 'gray',
                        radius: 6
                    }

                }]

            });

            // Add some life
            setInterval(() => {
                const chart = Highcharts.charts[0];
                if (chart && !chart.renderer.forExport) {
                    const point = chart.series[0].points[0],
                        inc = Math.round((Math.random() - 0.5) * 20);

                    let newVal = point.y + inc;
                    if (newVal < 0 || newVal > 200) {
                        newVal = point.y - inc;
                    }

                    point.update(newVal);
                }

            }, 3000);
        }

        function chartPie(id,title){
            Highcharts.chart(id, {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: title,
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 60
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '110%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Browser share',
                    innerSize: '50%',
                    data: [
                        ['Chrome', 73.86],
                        ['Edge', 11.97],
                        ['Firefox', 5.52],
                        ['Safari', 2.98],
                        ['Internet Explorer', 1.90],
                        {
                            name: 'Other',
                            y: 3.77,
                            dataLabels: {
                                enabled: false
                            }
                        }
                    ]
                }]
            });
              
        }


        
        chartSpeedoMeter('chart1','Monthly Target');
        chartSpeedoMeter('chart2','Yearly Target');
        chartPie('charta','Monthly Target');
        chartPie('chartb','Yearly Target');
        chartSpeedoMeter('chart3','Monthly Target');
        chartSpeedoMeter('chart4','Yearly Target');



        
        Highcharts.chart('currentSales', {
        chart: {
        type: 'column'
        },
        title: {
        text: 'Efficiency Optimization by Branch'
        },
        xAxis: {
        categories: [
        'Seattle HQ',
        'San Francisco',
        'Tokyo'
        ]
        },
        yAxis: [{
        min: 0,
        title: {
        text: 'Employees'
        }
        }, {
        title: {
        text: 'Profit (millions)'
        },
        opposite: true
        }],
        legend: {
        shadow: false
        },
        tooltip: {
        shared: true
        },
        plotOptions: {
        column: {
        grouping: false,
        shadow: false,
        borderWidth: 0
        }
        },
        series: [{
        name: 'Employees',
        color: 'rgba(165,170,217,1)',
        data: [150, 73, 20],
        pointPadding: 0.3,
        pointPlacement: -0.2
        }, {
        name: 'Employees Optimized',
        color: 'rgba(126,86,134,.9)',
        data: [140, 90, 40],
        pointPadding: 0.4,
        pointPlacement: -0.2
        }, {
        name: 'Profit',
        color: 'rgba(248,161,63,1)',
        data: [183.6, 178.8, 198.5],
        tooltip: {
        valuePrefix: '$',
        valueSuffix: ' M'
        },
        pointPadding: 0.3,
        pointPlacement: 0.2,
        yAxis: 1
        }, {
        name: 'Profit Optimized',
        color: 'rgba(186,60,61,.9)',
        data: [203.6, 198.8, 208.5],
        tooltip: {
        valuePrefix: '$',
        valueSuffix: ' M'
        },
        pointPadding: 0.4,
        pointPlacement: 0.2,
        yAxis: 1
        }]
        });
            Highcharts.chart('teams', {
            chart: {
            type: 'bar'
            },
            title: {
            text: 'UEFA CL top scorers by season'
            },
            xAxis: {
            categories: ['2020/21', '2019/20', '2018/19', '2017/18', '2016/17']
            },
            yAxis: {
            min: 0,
            title: {
            text: 'Goals'
            }
            },
            legend: {
            reversed: true
            },
            plotOptions: {
            series: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
            }
            },
            series: [{
            name: 'Cristiano Ronaldo',
            data: [4, 4, 6, 15, 12]
            }, {
            name: 'Lionel Messi',
            data: [5, 3, 12, 6, 11]
            }, {
            name: 'Robert Lewandowski',
            data: [5, 15, 8, 5, 8]
            }]
            });
            

            Highcharts.chart('variation', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Column chart with negative values'
    },
    xAxis: {
        categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'John',
        data: [5, 3, 4, 7, 2]
    }, {
        name: 'Jane',
        data: [2, -2, -3, 2, 1]
    }, {
        name: 'Joe',
        data: [3, 4, 4, -2, 5]
    }]
});

      
        
    </script>
@endsection
