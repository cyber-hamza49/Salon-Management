@extends('./user/main')
@section('title', 'BarberX - Contact Us')
@section('content')

<main>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Contact</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="section-header text-center" style="margin-top: 90px;">
        <p>Get In Touch</p>
        <h2>Any Query or Feedback, Please Contact Us</h2>
    </div>
    <div class="contact" style="margin-bottom: 90px;">
        <div class="container-fluid">
            <div class="container">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-check-circle"></i> Success!</strong> 
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="row align-items-center">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form action="{{ url('/contact') }}" method="POST">
                                @csrf
                                <div class="control-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" disabled value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="control-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" disabled value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="control-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                                <div class="control-group">
                                    <textarea name="message" class="form-control" placeholder="Message" required></textarea>
                                </div>
                                <div>
                                    <button class="btn mt-3" type="submit">Send Message</button>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</main>

<style>
    .alert {
        padding: 15px 20px;
        border: none;
        border-radius: 5px;
        margin-bottom: 25px;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    .alert-success {
        background-color: #d4edda;
        border-left: 4px solid #28a745;
        color: #155724;
    }

    .alert .close {
        opacity: 0.8;
        transition: all 0.3s ease;
    }

    .alert .close:hover {
        opacity: 1;
    }

    .alert i {
        margin-right: 8px;
    }

    .fade.show {
        animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .text-danger {
        color: #dc3545;
        transition: all 0.3s ease;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-control.is-valid {
        border-color: #28a745;
    }
</style>

<script>
// Wait for the document to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.querySelector('form');
    const subjectInput = document.querySelector('input[name="subject"]');
    const messageInput = document.querySelector('textarea[name="message"]');

    // Regex patterns
    const subjectRegex = /^[a-zA-Z0-9\s\-.,!?()]{5,100}$/;
    const messageRegex = /^[\s\S]{10,500}$/;

    // Error styling function
    function showError(element, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'text-danger mt-1';
        errorDiv.style.fontSize = '14px';
        errorDiv.textContent = message;
        
        // Remove any existing error message
        const existingError = element.parentElement.querySelector('.text-danger');
        if (existingError) {
            existingError.remove();
        }
        
        element.style.borderColor = '#dc3545';
        element.parentElement.appendChild(errorDiv);
    }

    // Success styling function
    function showSuccess(element) {
        element.style.borderColor = '#28a745';
        const existingError = element.parentElement.querySelector('.text-danger');
        if (existingError) {
            existingError.remove();
        }
    }

    // Validate subject
    function validateSubject() {
        const subject = subjectInput.value.trim();
        if (!subjectRegex.test(subject)) {
            showError(subjectInput, 'Subject must be 5-100 characters long and contain only letters, numbers, and basic punctuation');
            return false;
        }
        showSuccess(subjectInput);
        return true;
    }

    // Validate message
    function validateMessage() {
        const message = messageInput.value.trim();
        if (!messageRegex.test(message)) {
            showError(messageInput, 'Message must be between 10 and 500 characters');
            return false;
        }
        showSuccess(messageInput);
        return true;
    }

    // Real-time validation
    subjectInput.addEventListener('input', validateSubject);
    messageInput.addEventListener('input', validateMessage);

    // Form submission validation
    contactForm.addEventListener('submit', function(e) {
        const isSubjectValid = validateSubject();
        const isMessageValid = validateMessage();

        if (!isSubjectValid || !isMessageValid) {
            e.preventDefault();
        }
    });
});
</script>
@endsection