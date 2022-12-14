@extends('layouts.checkout')
@section('title', 'Checkout')


@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row-sm">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item">
                                    Details
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">

                            <h1>Who is going ?</h1>
                            <p>Trip to {{ $item->travel_package->title }}, </p>{{ $item->travel_package->location }}

                            @if (session()->has('failed'))
                                <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert"> 
                                    <i class="menu-icon mdi mdi-check-circle"></i>
                                    <strong>{{ session('failed') }}</strong> Thank you for your contribution
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nasionality</td>
                                            <td>Visa</td>
                                            <td>Password</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle">
                                                </td>
                                                <td class="align-middle">{{ $detail->username }}</td>
                                                <td class="align-middle">{{ $detail->nationality }}</td>
                                                <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                                <td class="align-middle">
                                                    {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail->id) }}" role="button" onclick="return confirm('Want to remove this person from your trip ?')">
                                                        <img src="{{ url('frontend/icons/x.png') }}" style="width: 15px;" alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="6">
                                                    No Visitor
                                                </td>
                                            </tr>
                                            
                                        @endforelse
                                        
                                    </tbody>
                                </table>
                            </div>

                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form action="{{ route('checkout-create', $item->id) }}" class="form-inline" method="POST">
                                    @csrf
                                    <label for="username" class="sr-only">Name</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="username" id="username" placeholder="Username" required style="width:100px;">

                                    <label for="nationality" class="sr-only">Nationality</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="nationality" id="nationality" placeholder="Nationality" style="width: 100px;" required>

                                    <label for="is_visa" class="sr-only">Visa</label>
                                    <select name="is_visa" id="is_visa" class="custom-select mb-2 mr-sm-2" required>
                                        <option value="" selected>VISA</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>

                                    <label for="doe_passport" class="sr-only">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control datepicker" id="doe_passport" name="doe_passport" placeholder="DOE Passport">
                                    </div>

                                    <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>

                                    <div class="from-group">
                                        @error('username')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">You are only able to invite member that has registered in Nomads.</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 mt-3 mt-md-0">
                        <div class="card card-details card-right">
                            <h2>Checkout Informations</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">
                                    {{ $item->details->count() }} person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Addtional VISA</th>
                                    <td width="50%" class="text-right">
                                        Rp {{ $item->additional_visa }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">
                                        Rp {{ number_format($item->travel_package->price, 0, '', '.')  }},00 / person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-right">
                                        Rp {{ number_format($item->transaction_total, 0, '', '.')  }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique)</th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue">Rp {{ number_format($item->transaction_total, 0, '', '.') }}</span>
                                    </td>

                                    
                                </tr>
                            </table>
                            <hr>
                            <h2>Payment Instructions</h2>
                            <p class="payment-instructions">
                                You will be redirected to another page to pay
                            </p>
                            <img src="{{ url('frontend/images/transfer-bank.png') }}" alt="logo-transfer-bank" class="w-50">
                        </div>

                        <div class="join-container">
                            <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
                                Process Payment
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted">Cancel Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    
@endsection

@prepend('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.css') }}">
@endprepend

@push('addon-script')
    <script src="{{ url('frontend/libraries/gijgo/js/gijgo.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="{{ url('frontend/icons/calendar.png') }}" alt="" height="15">'
                }
            });
        });
    </script>
@endpush