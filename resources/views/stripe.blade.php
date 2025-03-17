@extends('./user/main')
@section('title', 'BarberX - Payment')
@section('content')

<!-- Add responsive viewport meta tag in head -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Payment</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Appointments</a>
                    <a href="">Check Out</a>
                    <a href="">Payment</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container py-3 py-md-5">
        <!-- Added Note -->
        <div class="alert custom-alert alert-dismissible fade show mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-info-circle-fill me-2"></i>
                <div>After downloading your invoice, please refresh the page to update the payment status.</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- Success Alert -->
        @if(Session::get('chk'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-2 fs-4"></i>
                <div>
                    {{ Session::get('chk') }}
                    <br>
                    <small>Your invoice has been downloaded automatically.</small>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row justify-content-center g-4">
            <!-- Payment Form Column -->
            <div class="col-12 col-md-7 order-2 order-md-1">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-3 p-md-4">
                        <div class="d-flex align-items-center gap-2 mb-3 mb-md-4">
                            <i class="bi bi-credit-card fs-4" style="color: #D5B981"></i>
                            <h4 class="mb-0 fs-5 fs-md-4">Payment Details</h4>
                        </div>

                        <form role="form" 
                        action="{{ route('stripe.post') }}" 
                        method="POST" 
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ config('services.stripe.key') }}"
                          id="payment-form">
                        @csrf
                        <!-- Form fields remain the same -->
                        <div class="mb-3">
                            <label class="form-label small">Card Holder Name</label>
                            <input type="text" class="form-control card-name" required 
                                   placeholder="Enter name as on card">
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label small">Card Number</label>
                            <input type="text" class="form-control card-number" required 
                                   placeholder="**** **** **** ****" 
                                   maxlength="19"
                                   pattern="\d{4}\s\d{4}\s\d{4}\s\d{4}">
                        </div>
                    
                        <div class="row g-3 mb-4">
                            <div class="col-4">
                                <label class="form-label small">CVC</label>
                                <input type="text" class="form-control card-cvc" required 
                                       placeholder="***" 
                                       maxlength="3" 
                                       pattern="\d{3}">
                            </div>
                            <div class="col-4">
                                <label class="form-label small">Expiry Month</label>
                                <input type="text" class="form-control card-expiry-month" required 
                                       placeholder="MM" 
                                       maxlength="2" 
                                       pattern="\d{2}">
                            </div>
                            <div class="col-4">
                                <label class="form-label small">Expiry Year</label>
                                <input type="text" class="form-control card-expiry-year" required 
                                       placeholder="YY" 
                                       maxlength="2" 
                                       pattern="\d{2}">
                            </div>
                        </div>
                    
                        <div class="error-message d-none">
                            <div class="alert alert-danger"></div>
                        </div>
                    
                        <button type="submit" class="btn w-100" style="background-color: #D5B981; color: black;">
                            Pay Now - $ {{ number_format($totalUSD, 2) }}
                        </button>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary Column -->
            <div class="col-12 col-md-5 order-1 order-md-2">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-3 p-md-4">
                        <h5 class="mb-3 mb-md-4 fs-5">Order Summary</h5>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Amount (PKR)</span>
                            <span class="fw-semibold">PKR {{ number_format($totalPKR, 2) }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Amount (USD)</span>
                            <span class="fw-semibold">$ {{ number_format($totalUSD, 2) }}</span>
                        </div>

                        <hr class="my-3 my-md-4">
                        
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold">Total to Pay</span>
                            <span class="fw-bold" style="color: #D5B981">$ {{ number_format($totalUSD, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Security Notice -->
                <div class="mt-3 mt-md-4">
                    <div class="d-flex align-items-center gap-2 text-muted small mb-2">
                        <i class="bi bi-shield-lock"></i>
                        <span>Secure Encrypted Payment</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 text-muted small mb-2">
                        <i class="bi bi-patch-check"></i>
                        <span>We use Stripe for secure transactions</span>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{url('/userdashboard')}}" class="btn btn-link text-decoration-none py-2 fw-semibold" style="color: #D5B981">
                            <i class="bi bi-arrow-left me-1"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.custom-alert {
    background-color: #D5B981;
    border: none;
    color: #1D2434;
}

.custom-alert .btn-close {
    color: #1D2434;
    opacity: 0.8;
}

.custom-alert .bi-info-circle-fill {
    color: #1D2434;
}

.btn-primary {
    background-color: #D5B981 !important;
    border-color: #D5B981 !important;
}

.text-primary {
    color: #D5B981 !important;
}

.btn-primary:hover {
    background-color: #c5a971 !important;
    border-color: #c5a971 !important;
}

.text-danger {
    color: #dc3545;
    font-size: 0.875em;
    margin-top: 0.25rem;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.form-control.is-valid {
    border-color: #198754;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $form = $(".require-validation");
    
    Stripe.setPublishableKey($form.data('stripe-publishable-key'));

    // Regex patterns
    const nameRegex = /^[a-zA-Z\s]{3,50}$/;
    const cardNumberRegex = /^\d{4}\s\d{4}\s\d{4}\s\d{4}$/;
    const cvcRegex = /^\d{3}$/;
    const monthRegex = /^(0[1-9]|1[0-2])$/;
    const yearRegex = /^\d{2}$/;

    // Error styling function
    function showError(element, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'text-danger mt-1 small';
        errorDiv.textContent = message;
        
        // Remove any existing error message
        const existingError = element.parent().find('.text-danger');
        if (existingError.length) {
            existingError.remove();
        }
        
        element.css('border-color', '#dc3545');
        element.parent().append(errorDiv);
    }

    // Success styling function
    function showSuccess(element) {
        element.css('border-color', '#198754');
        element.parent().find('.text-danger').remove();
    }

    // Validate card holder name
    function validateName() {
        const name = $('.card-name').val().trim();
        if (!nameRegex.test(name)) {
            showError($('.card-name'), 'Please enter a valid name (3-50 characters, letters only)');
            return false;
        }
        showSuccess($('.card-name'));
        return true;
    }

    // Validate card number
    function validateCardNumber() {
        const cardNumber = $('.card-number').val();
        if (!cardNumberRegex.test(cardNumber)) {
            showError($('.card-number'), 'Please enter a valid 16-digit card number');
            return false;
        }
        showSuccess($('.card-number'));
        return true;
    }

    // Validate CVC
    function validateCVC() {
        const cvc = $('.card-cvc').val();
        if (!cvcRegex.test(cvc)) {
            showError($('.card-cvc'), 'Please enter a valid 3-digit CVC');
            return false;
        }
        showSuccess($('.card-cvc'));
        return true;
    }

    // Validate expiry month
    function validateMonth() {
        const month = $('.card-expiry-month').val();
        if (!monthRegex.test(month)) {
            showError($('.card-expiry-month'), 'Please enter a valid month (01-12)');
            return false;
        }
        showSuccess($('.card-expiry-month'));
        return true;
    }

    // Validate expiry year
    function validateYear() {
        const year = $('.card-expiry-year').val();
        if (!yearRegex.test(year)) {
            showError($('.card-expiry-year'), 'Please enter a valid 2-digit year');
            return false;
        }
        showSuccess($('.card-expiry-year'));
        return true;
    }

    // Card number formatting
    $('.card-number').on('input', function() {
        var value = $(this).val().replace(/\D/g, '').replace(/(.{4})/g, '$1 ').trim();
        $(this).val(value);
    });

    // Real-time validation
    $('.card-name').on('input', validateName);
    $('.card-number').on('input', validateCardNumber);
    $('.card-cvc').on('input', validateCVC);
    $('.card-expiry-month').on('input', validateMonth);
    $('.card-expiry-year').on('input', validateYear);

    $form.on('submit', function(e) {
        e.preventDefault();
        
        // Perform all validations
        const isNameValid = validateName();
        const isCardNumberValid = validateCardNumber();
        const isCvcValid = validateCVC();
        const isMonthValid = validateMonth();
        const isYearValid = validateYear();

        // If any validation fails, stop form submission
        if (!isNameValid || !isCardNumberValid || !isCvcValid || !isMonthValid || !isYearValid) {
            return false;
        }

        var $form = $(this);
        $form.find('button').prop('disabled', true);
        
        Stripe.card.createToken({
            number: $('.card-number').val().replace(/\s/g, ''),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val(),
            name: $('.card-name').val()
        }, function(status, response) {
            if (response.error) {
                // Show error
                $('.error-message')
                    .removeClass('d-none')
                    .find('.alert')
                    .text(response.error.message);
                $form.find('button').prop('disabled', false);
            } else {
                // Token was created
                var token = response.id;
                
                // Add token to form
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                
                // Submit form
                $form.get(0).submit();
            }
        });
        
        return false;
    });
});
</script>

@endsection