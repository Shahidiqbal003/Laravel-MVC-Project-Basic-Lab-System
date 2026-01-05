// Ghazi Lab & Diagnostic Center - Modern JavaScript with Tailwind CSS
// Enhanced functionality with modern design features

// Global variables
let currentStep = 1;
const totalSteps = 4;
let testDatabase = [];
let filteredTests = [];

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

// Main initialization function
function initializeApp() {
    // Initialize based on current page
    const currentPage = getCurrentPage();
    
    // Common initialization
    initializeScrollAnimations();
    initializeNavigation();
    initializeMobileMenu();
    initializeWhatsAppButton();
    
    // Page-specific initialization
    switch(currentPage) {
        case 'index':
            initializeHomePage();
            break;
        case 'booking':
            initializeBookingPage();
            break;
        case 'test-list':
            initializeTestListPage();
            break;
        case 'doctor-profile':
            initializeDoctorProfilePage();
            break;
        case 'contact':
            initializeContactPage();
            break;
    }
}

// Get current page name
function getCurrentPage() {
    const path = window.location.pathname;
    const page = path.split('/').pop().split('.')[0];
    return page || 'index';
}

// Initialize scroll animations with modern effects
function initializeScrollAnimations() {
    // Use Intersection Observer for modern scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
                
                // Animate statistics numbers
                if (entry.target.classList.contains('stat-number')) {
                    animateNumber(entry.target);
                }
            }
        });
    }, observerOptions);

    // Observe all elements with animation classes
    document.querySelectorAll('[data-aos], .animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
}

// Animate numbers for statistics
function animateNumber(element) {
    const finalNumber = element.textContent.replace(/[^\d]/g, '');
    const duration = 2000;
    const start = 0;
    const increment = finalNumber / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= finalNumber) {
            element.textContent = element.textContent.replace(/\d+/, finalNumber);
            clearInterval(timer);
        } else {
            element.textContent = element.textContent.replace(/\d+/, Math.floor(current));
        }
    }, 16);
}

// Initialize navigation with modern effects
function initializeNavigation() {
    const navbar = document.querySelector('nav');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white/98', 'shadow-xl');
                navbar.classList.remove('bg-white/95');
            } else {
                navbar.classList.add('bg-white/95');
                navbar.classList.remove('bg-white/98', 'shadow-xl');
            }
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Initialize mobile menu
function initializeMobileMenu() {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const closeMobileMenu = document.getElementById('closeMobileMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
        
        closeMobileMenu?.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = 'auto';
        });
        
        // Close when clicking outside
        document.addEventListener('click', (e) => {
            if (mobileMenu.classList.contains('active') && 
                !mobileMenu.contains(e.target) && 
                !mobileMenuBtn.contains(e.target)) {
                mobileMenu.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    }
}

// Initialize WhatsApp button
function initializeWhatsAppButton() {
    const whatsappBtn = document.querySelector('.whatsapp-float');
    if (whatsappBtn) {
        // Add entrance animation
        setTimeout(() => {
            whatsappBtn.style.opacity = '1';
            whatsappBtn.style.transform = 'translateY(0)';
        }, 1000);
        
        // Add click tracking
        whatsappBtn.addEventListener('click', (e) => {
            console.log('WhatsApp button clicked');
            // You can add analytics tracking here
        });
    }
}

// Initialize home page with enhanced features
function initializeHomePage() {
    // Add entrance animations for hero elements
    const heroElements = document.querySelectorAll('[data-aos]');
    heroElements.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add('animate-fade-in');
        }, index * 200);
    });
    
    // Initialize service cards hover effects
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });
    });
}

// Initialize booking page with enhanced form
function initializeBookingPage() {
    initializeTestDatabase();
    initializeBookingForm();
    initializeFormValidation();
    initializeDateTimePicker();
    
    // Check for URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const testParam = urlParams.get('test');
    if (testParam) {
        preselectTest(testParam);
    }
}

// Initialize test database with more comprehensive data
function initializeTestDatabase() {
    testDatabase = [
        {
            id: 1,
            name: "FNAC Test",
            category: "specialty",
            price: "1500",
            description: "Fine Needle Aspiration Cytology for diagnosis of lumps and masses",
            preparation: "No special preparation required",
            features: ["Painless procedure", "Quick results", "Expert analysis", "Same-day reporting"],
            duration: "30 minutes",
            reportTime: "Same day"
        },
        {
            id: 2,
            name: "Bone Marrow Aspiration",
            category: "specialty",
            price: "2500",
            description: "Bone marrow aspiration and biopsy for hematological disorders",
            preparation: "Fasting required for 6 hours",
            features: ["Sterile technique", "Expert pathologists", "Detailed reports", "Follow-up consultation"],
            duration: "45 minutes",
            reportTime: "2-3 days"
        },
        {
            id: 3,
            name: "Complete Blood Count (CBC)",
            category: "general",
            price: "500",
            description: "Complete blood count with differential and platelet count",
            preparation: "No special preparation required",
            features: ["Same-day results", "Home collection available", "Accurate counts", "Digital reports"],
            duration: "5 minutes",
            reportTime: "Same day"
        },
        {
            id: 4,
            name: "Liver Function Test (LFT)",
            category: "general",
            price: "800",
            description: "Comprehensive liver function panel including ALT, AST, bilirubin",
            preparation: "Fasting required for 8-12 hours",
            features: ["Comprehensive panel", "Early detection", "Liver health assessment", "Expert interpretation"],
            duration: "5 minutes",
            reportTime: "Same day"
        }
        // Add more tests as needed
    ];
}

// Initialize booking form with enhanced features
function initializeBookingForm() {
    const testCategorySelect = document.getElementById('testCategory');
    const specificTestSelect = document.getElementById('specificTest');
    const collectionTypeRadios = document.querySelectorAll('input[name="collectionType"]');
    const addressSection = document.getElementById('addressSection');
    
    if (testCategorySelect) {
        testCategorySelect.addEventListener('change', function() {
            populateTestOptions(this.value);
        });
    }
    
    if (specificTestSelect) {
        specificTestSelect.addEventListener('change', function() {
            showTestDetails(this.value);
        });
    }
    
    // Handle collection type change
    collectionTypeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'home') {
                addressSection.style.display = 'block';
                document.getElementById('address').required = true;
                document.getElementById('address').focus();
            } else {
                addressSection.style.display = 'none';
                document.getElementById('address').required = false;
            }
        });
    });
    
    // Set minimum date to today
    const appointmentDate = document.getElementById('appointmentDate');
    if (appointmentDate) {
        const today = new Date().toISOString().split('T')[0];
        appointmentDate.min = today;
        
        // Add change listener for date validation
        appointmentDate.addEventListener('change', function() {
            validateAppointmentDate(this.value);
        });
    }
    
    // Initialize time slots
    initializeTimeSlots();
}

// Initialize date and time picker enhancements
function initializeDateTimePicker() {
    // Add time slot availability checking
    const timeSelect = document.getElementById('appointmentTime');
    if (timeSelect) {
        timeSelect.addEventListener('change', function() {
            checkTimeSlotAvailability(this.value);
        });
    }
}

// Validate appointment date
function validateAppointmentDate(selectedDate) {
    const today = new Date();
    const selected = new Date(selectedDate);
    const maxDate = new Date(today.getTime() + (30 * 24 * 60 * 60 * 1000)); // 30 days from now
    
    if (selected < today) {
        showAlert('Please select a future date.', 'warning');
        return false;
    }
    
    if (selected > maxDate) {
        showAlert('Appointments can only be booked up to 30 days in advance.', 'warning');
        return false;
    }
    
    return true;
}

// Check time slot availability
function checkTimeSlotAvailability(selectedTime) {
    // Simulate time slot checking
    const busySlots = ['10:00', '14:00', '16:00']; // Example busy slots
    
    if (busySlots.includes(selectedTime)) {
        showAlert('This time slot is busy. Please select another time.', 'warning');
        return false;
    }
    
    return true;
}

// Initialize time slots with enhanced options
function initializeTimeSlots() {
    const timeSelect = document.getElementById('appointmentTime');
    if (!timeSelect) return;
    
    const timeSlots = [
        { value: '08:00', label: '08:00 AM - 09:00 AM', available: true },
        { value: '09:00', label: '09:00 AM - 10:00 AM', available: true },
        { value: '10:00', label: '10:00 AM - 11:00 AM', available: false }, // Example busy slot
        { value: '11:00', label: '11:00 AM - 12:00 PM', available: true },
        { value: '12:00', label: '12:00 PM - 01:00 PM', available: true },
        { value: '14:00', label: '02:00 PM - 03:00 PM', available: false }, // Example busy slot
        { value: '15:00', label: '03:00 PM - 04:00 PM', available: true },
        { value: '16:00', label: '04:00 PM - 05:00 PM', available: false }, // Example busy slot
        { value: '17:00', label: '05:00 PM - 06:00 PM', available: true }
    ];
    
    timeSelect.innerHTML = '<option value="">Select Time Slot</option>';
    
    timeSlots.forEach(slot => {
        const option = document.createElement('option');
        option.value = slot.value;
        option.textContent = slot.label;
        option.disabled = !slot.available;
        
        if (!slot.available) {
            option.textContent += ' (Busy)';
        }
        
        timeSelect.appendChild(option);
    });
}

// Populate test options based on category
function populateTestOptions(category) {
    const specificTestSelect = document.getElementById('specificTest');
    const testDetails = document.getElementById('testDetails');
    
    if (!specificTestSelect) return;
    
    // Clear existing options
    specificTestSelect.innerHTML = '<option value="">Select Test</option>';
    testDetails.style.display = 'none';
    
    if (!category) return;
    
    // Filter tests by category
    const filteredTests = testDatabase.filter(test => test.category === category);
    
    // Populate options
    filteredTests.forEach(test => {
        const option = document.createElement('option');
        option.value = test.id;
        option.textContent = `${test.name} - Rs. ${test.price}`;
        specificTestSelect.appendChild(option);
    });
}

// Show test details with enhanced information
function showTestDetails(testId) {
    const testDetails = document.getElementById('testDetails');
    const testDescription = document.getElementById('testDescription');
    const testPrice = document.getElementById('testPrice');
    const testPreparation = document.getElementById('testPreparation');
    
    if (!testId) {
        testDetails.style.display = 'none';
        return;
    }
    
    const test = testDatabase.find(t => t.id == testId);
    if (test) {
        testDescription.textContent = test.description;
        testPrice.textContent = `Rs. ${test.price}`;
        testPreparation.textContent = test.preparation;
        testDetails.style.display = 'block';
        
        // Add additional details if available
        const additionalDetails = document.getElementById('additionalDetails');
        if (additionalDetails) {
            additionalDetails.innerHTML = `
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <strong>Duration:</strong> ${test.duration}
                    </div>
                    <div>
                        <strong>Report Time:</strong> ${test.reportTime}
                    </div>
                </div>
            `;
        }
    }
}

// Preselect test from URL parameter
function preselectTest(testParam) {
    const testMap = {
        'fnac': 1,
        'bone-marrow': 2,
        'cbc': 3,
        'lft': 4
    };
    
    const testId = testMap[testParam.toLowerCase()];
    if (testId) {
        const test = testDatabase.find(t => t.id === testId);
        if (test) {
            const categorySelect = document.getElementById('testCategory');
            const testSelect = document.getElementById('specificTest');
            
            if (categorySelect && testSelect) {
                categorySelect.value = test.category;
                populateTestOptions(test.category);
                
                setTimeout(() => {
                    testSelect.value = testId;
                    showTestDetails(testId);
                }, 100);
            }
        }
    }
}

// Initialize form validation with enhanced features
function initializeFormValidation() {
    const bookingForm = document.getElementById('bookingForm');
    const contactForm = document.getElementById('contactForm');
    
    if (bookingForm) {
        bookingForm.addEventListener('submit', handleBookingSubmission);
    }
    
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactSubmission);
    }
    
    // Real-time validation
    document.querySelectorAll('.form-control, .form-select').forEach(input => {
        input.addEventListener('blur', validateField);
        input.addEventListener('input', clearValidation);
        input.addEventListener('focus', showFieldHint);
    });
}

// Show field hints
function showFieldHint(event) {
    const field = event.target;
    const hint = field.getAttribute('data-hint');
    
    if (hint && !field.value.trim()) {
        // You can show a tooltip or hint here
        console.log(`Hint for ${field.name}: ${hint}`);
    }
}

// Validate individual field with enhanced rules
function validateField(event) {
    const field = event.target;
    const value = field.value.trim();
    
    // Remove existing validation classes
    field.classList.remove('is-valid', 'is-invalid', 'border-green-500', 'border-red-500');
    
    // Basic validation rules
    let isValid = true;
    let errorMessage = '';
    
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'This field is required';
    } else if (field.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        isValid = emailRegex.test(value);
        errorMessage = 'Please enter a valid email address';
    } else if (field.type === 'tel' && value) {
        const phoneRegex = /^[0-9+\-\s()]+$/;
        isValid = phoneRegex.test(value) && value.length >= 10;
        errorMessage = 'Please enter a valid phone number';
    } else if (field.type === 'number' && field.min && field.max) {
        const num = parseInt(value);
        isValid = num >= parseInt(field.min) && num <= parseInt(field.max);
        errorMessage = `Value must be between ${field.min} and ${field.max}`;
    }
    
    // Add validation classes with Tailwind colors
    if (isValid && value) {
        field.classList.add('border-green-500');
        field.classList.add('focus:border-green-500');
    } else if (!isValid) {
        field.classList.add('border-red-500');
        field.classList.add('focus:border-red-500');
        
        // Show error message
        showFieldError(field, errorMessage);
    }
    
    return isValid;
}

// Show field error message
function showFieldError(field, message) {
    // Remove existing error
    const existingError = field.parentNode.querySelector('.field-error');
    if (existingError) {
        existingError.remove();
    }
    
    if (message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error text-red-500 text-sm mt-1';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
    }
}

// Clear validation on input
function clearValidation(event) {
    const field = event.target;
    field.classList.remove('border-red-500');
    
    // Remove error message
    const errorDiv = field.parentNode.querySelector('.field-error');
    if (errorDiv) {
        errorDiv.remove();
    }
    
    if (field.value.trim()) {
        field.classList.add('border-green-500');
    }
}

// Handle booking form submission with enhanced features
function handleBookingSubmission(event) {
    event.preventDefault();
    
    // Validate all fields
    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
    // Additional validation
    let isValid = true;
    
    // Check if test is selected
    if (!document.getElementById('specificTest').value) {
        document.getElementById('specificTest').classList.add('border-red-500');
        isValid = false;
    }
    
    // Check if appointment date is selected
    if (!document.getElementById('appointmentDate').value) {
        document.getElementById('appointmentDate').classList.add('border-red-500');
        isValid = false;
    }
    
    // Check if appointment time is selected
    if (!document.getElementById('appointmentTime').value) {
        document.getElementById('appointmentTime').classList.add('border-red-500');
        isValid = false;
    }
    
    // Check terms acceptance
    if (!document.getElementById('termsCheck').checked) {
        document.getElementById('termsCheck').classList.add('border-red-500');
        isValid = false;
    }
    
    // Validate appointment date
    if (data.appointmentDate && !validateAppointmentDate(data.appointmentDate)) {
        isValid = false;
    }
    
    // Validate time slot
    if (data.appointmentTime && !checkTimeSlotAvailability(data.appointmentTime)) {
        isValid = false;
    }
    
    if (!isValid) {
        showAlert('Please fill in all required fields correctly.', 'danger');
        return;
    }
    
    // Simulate form submission with modern loading state
    const submitButton = form.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    
    submitButton.innerHTML = `
        <div class="flex items-center justify-center">
            <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white mr-2"></div>
            Processing...
        </div>
    `;
    submitButton.disabled = true;
    submitButton.classList.add('opacity-75');
    
    setTimeout(() => {
        // Log booking data to console (for demo)
        console.log('Booking Data:', data);
        
        // Show success modal with modern design
        showSuccessModal(data);
        
        // Reset form
        form.reset();
        resetBookingSteps();
        
        // Reset button
        submitButton.innerHTML = originalText;
        submitButton.disabled = false;
        submitButton.classList.remove('opacity-75');
        
        // Clear validation classes
        form.querySelectorAll('.form-control, .form-select').forEach(field => {
            field.classList.remove('border-green-500', 'border-red-500');
        });
        
    }, 3000);
}

// Handle contact form submission
function handleContactSubmission(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
    // Validate privacy check
    if (!document.getElementById('privacyCheck').checked) {
        document.getElementById('privacyCheck').classList.add('border-red-500');
        showAlert('Please accept the privacy policy.', 'danger');
        return;
    }
    
    // Simulate form submission with modern loading state
    const submitButton = form.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    
    submitButton.innerHTML = `
        <div class="flex items-center justify-center">
            <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white mr-2"></div>
            Sending...
        </div>
    `;
    submitButton.disabled = true;
    submitButton.classList.add('opacity-75');
    
    setTimeout(() => {
        // Log contact data to console (for demo)
        console.log('Contact Data:', data);
        
        // Show success message with modern design
        showSuccessMessage();
        
        // Reset form
        form.reset();
        
        // Reset button
        submitButton.innerHTML = originalText;
        submitButton.disabled = false;
        submitButton.classList.remove('opacity-75');
        
        // Clear validation classes
        form.querySelectorAll('.form-control, .form-select').forEach(field => {
            field.classList.remove('border-green-500', 'border-red-500');
        });
        
    }, 2000);
}

// Show success modal with modern design
function showSuccessModal(bookingData) {
    const modal = document.getElementById('successModal');
    if (modal) {
        // Update modal content with booking details
        const modalBody = modal.querySelector('.modal-body');
        if (modalBody) {
            modalBody.innerHTML = `
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-check text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Booking Confirmed!</h3>
                    <p class="text-slate-600 mb-6">Your appointment has been successfully booked. You will receive a confirmation SMS and email shortly.</p>
                    <div class="bg-slate-50 rounded-lg p-4 mb-6 text-left">
                        <h4 class="font-semibold text-slate-800 mb-2">Booking Details:</h4>
                        <p><strong>Test:</strong> ${bookingData.specificTest || 'Not selected'}</p>
                        <p><strong>Date:</strong> ${formatDate(bookingData.appointmentDate)}</p>
                        <p><strong>Time:</strong> ${formatTime(bookingData.appointmentTime)}</p>
                    </div>
                </div>
            `;
        }
        
        const modalInstance = new bootstrap.Modal(modal);
        modalInstance.show();
    }
}

// Show success message
function showSuccessMessage() {
    const successMessage = document.getElementById('successMessage');
    if (successMessage) {
        successMessage.style.display = 'block';
        successMessage.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 5000);
    }
}

// Booking form step navigation with enhanced UX
function nextStep() {
    if (validateCurrentStep()) {
        if (currentStep < totalSteps) {
            // Hide current step with animation
            const currentStepEl = document.getElementById(`step${currentStep}`);
            currentStepEl.classList.add('animate-fade-out');
            
            setTimeout(() => {
                currentStepEl.classList.remove('active', 'animate-fade-out');
                
                // Update step indicator
                const indicator = document.getElementById(`step${currentStep}-indicator`);
                indicator.classList.remove('active');
                indicator.classList.add('completed', 'bg-green-500', 'text-white');
                
                // Show next step
                currentStep++;
                const nextStepEl = document.getElementById(`step${currentStep}`);
                nextStepEl.classList.add('active', 'animate-fade-in');
                
                const nextIndicator = document.getElementById(`step${currentStep}-indicator`);
                nextIndicator.classList.add('active', 'bg-blue-600', 'text-white');
                
                // Update progress bar
                const progress = (currentStep / totalSteps) * 100;
                const progressBar = document.getElementById('progress-bar');
                progressBar.style.width = `${progress}%`;
                
                // Update booking summary if on final step
                if (currentStep === 4) {
                    updateBookingSummary();
                }
            }, 300);
        }
    }
}

function prevStep() {
    if (currentStep > 1) {
        // Hide current step
        const currentStepEl = document.getElementById(`step${currentStep}`);
        currentStepEl.classList.add('animate-fade-out');
        
        setTimeout(() => {
            currentStepEl.classList.remove('active', 'animate-fade-out');
            
            // Show previous step
            currentStep--;
            const prevStepEl = document.getElementById(`step${currentStep}`);
            prevStepEl.classList.add('active', 'animate-fade-in');
            
            // Update indicators
            const currentIndicator = document.getElementById(`step${currentStep + 1}-indicator`);
            currentIndicator.classList.remove('active', 'bg-blue-600', 'text-white');
            currentIndicator.classList.add('bg-gray-300');
            
            const prevIndicator = document.getElementById(`step${currentStep}-indicator`);
            prevIndicator.classList.add('active', 'bg-blue-600', 'text-white');
            prevIndicator.classList.remove('completed', 'bg-green-500');
            
            // Update progress bar
            const progress = (currentStep / totalSteps) * 100;
            const progressBar = document.getElementById('progress-bar');
            progressBar.style.width = `${progress}%`;
        }, 300);
    }
}

// Validate current step with enhanced validation
function validateCurrentStep() {
    const currentStepElement = document.getElementById(`step${currentStep}`);
    const requiredFields = currentStepElement.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!validateField({ target: field })) {
            isValid = false;
        }
    });
    
    // Special validation for step 1 (test selection)
    if (currentStep === 1) {
        const testCategory = document.getElementById('testCategory').value;
        const specificTest = document.getElementById('specificTest').value;
        
        if (!testCategory || !specificTest) {
            isValid = false;
            if (!testCategory) {
                document.getElementById('testCategory').classList.add('border-red-500');
            }
            if (!specificTest) {
                document.getElementById('specificTest').classList.add('border-red-500');
            }
        }
    }
    
    return isValid;
}

// Update booking summary with enhanced details
function updateBookingSummary() {
    const summaryContainer = document.getElementById('bookingSummary');
    if (!summaryContainer) return;
    
    const testId = document.getElementById('specificTest').value;
    const test = testDatabase.find(t => t.id == testId);
    const name = document.getElementById('fullName').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const date = document.getElementById('appointmentDate').value;
    const time = document.getElementById('appointmentTime').value;
    const collectionType = document.querySelector('input[name="collectionType"]:checked').value;
    
    let summaryHTML = `
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-blue-50 p-4 rounded-lg">
                <h6 class="font-semibold text-blue-800 mb-3">Personal Information</h6>
                <p class="mb-2"><strong>Name:</strong> ${name}</p>
                <p class="mb-2"><strong>Phone:</strong> ${phone}</p>
                ${email ? `<p class="mb-2"><strong>Email:</strong> ${email}</p>` : ''}
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
                <h6 class="font-semibold text-green-800 mb-3">Test Details</h6>
                <p class="mb-2"><strong>Test:</strong> ${test ? test.name : 'Not selected'}</p>
                <p class="mb-2"><strong>Price:</strong> Rs. ${test ? test.price : '0'}</p>
                <p class="mb-2"><strong>Duration:</strong> ${test ? test.duration : 'N/A'}</p>
            </div>
        </div>
        <div class="mt-6 bg-yellow-50 p-4 rounded-lg">
            <h6 class="font-semibold text-yellow-800 mb-3">Appointment Details</h6>
            <div class="grid md:grid-cols-3 gap-4">
                <p><strong>Date:</strong> ${formatDate(date)}</p>
                <p><strong>Time:</strong> ${formatTime(time)}</p>
                <p><strong>Collection:</strong> ${collectionType === 'home' ? 'Home Collection' : 'Lab Visit'}</p>
            </div>
        </div>
    `;
    
    if (collectionType === 'home') {
        const address = document.getElementById('address').value;
        summaryHTML += `
            <div class="mt-4 bg-red-50 p-4 rounded-lg">
                <h6 class="font-semibold text-red-800 mb-3">Address</h6>
                <p>${address}</p>
            </div>
        `;
    }
    
    summaryContainer.innerHTML = summaryHTML;
}

// Reset booking steps with animation
function resetBookingSteps() {
    currentStep = 1;
    
    // Hide all steps except first
    for (let i = 2; i <= totalSteps; i++) {
        const stepEl = document.getElementById(`step${i}`);
        stepEl.classList.remove('active', 'animate-fade-in', 'animate-fade-out');
        
        const indicator = document.getElementById(`step${i}-indicator`);
        indicator.classList.remove('active', 'completed', 'bg-blue-600', 'bg-green-500', 'text-white');
        indicator.classList.add('bg-gray-300');
    }
    
    // Show first step
    const firstStep = document.getElementById('step1');
    firstStep.classList.add('active', 'animate-fade-in');
    
    const firstIndicator = document.getElementById('step1-indicator');
    firstIndicator.classList.add('active', 'bg-blue-600', 'text-white');
    firstIndicator.classList.remove('completed', 'bg-green-500');
    
    // Reset progress bar
    const progressBar = document.getElementById('progress-bar');
    progressBar.style.width = '25%';
}

// Initialize test list page
function initializeTestListPage() {
    initializeTestDatabase();
    filteredTests = [...testDatabase];
    renderTestList();
    initializeTestSearch();
    initializeTestFilters();
}

// Initialize test search with modern features
function initializeTestSearch() {
    const searchInput = document.getElementById('testSearch');
    if (searchInput) {
        // Add search debouncing
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const searchTerm = this.value.toLowerCase();
                filterTests(searchTerm);
                
                // Show search results count
                showSearchResultsCount(filteredTests.length);
            }, 300);
        });
        
        // Add clear search functionality
        const clearBtn = document.createElement('button');
        clearBtn.innerHTML = '<i class="fas fa-times"></i>';
        clearBtn.className = 'absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600';
        clearBtn.style.display = 'none';
        
        searchInput.parentNode.style.position = 'relative';
        searchInput.parentNode.appendChild(clearBtn);
        
        clearBtn.addEventListener('click', () => {
            searchInput.value = '';
            filterTests('');
            clearBtn.style.display = 'none';
            hideSearchResultsCount();
        });
        
        searchInput.addEventListener('input', function() {
            clearBtn.style.display = this.value ? 'block' : 'none';
        });
    }
}

// Show search results count
function showSearchResultsCount(count) {
    const resultsCount = document.getElementById('searchResultsCount');
    if (!resultsCount) {
        const countDiv = document.createElement('div');
        countDiv.id = 'searchResultsCount';
        countDiv.className = 'text-sm text-gray-600 mt-2';
        
        const searchContainer = document.querySelector('.search-container');
        if (searchContainer) {
            searchContainer.appendChild(countDiv);
        }
    }
    
    const countEl = document.getElementById('searchResultsCount');
    countEl.textContent = `Found ${count} test${count !== 1 ? 's' : ''}`;
    countEl.style.display = 'block';
}

// Hide search results count
function hideSearchResultsCount() {
    const resultsCount = document.getElementById('searchResultsCount');
    if (resultsCount) {
        resultsCount.style.display = 'none';
    }
}

// Initialize test filters with modern UI
function initializeTestFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button with modern styling
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-red-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            
            this.classList.add('active', 'bg-red-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-700');
            
            // Filter tests
            const category = this.dataset.category;
            filterTestsByCategory(category);
            
            // Update search placeholder
            const searchInput = document.getElementById('testSearch');
            if (searchInput) {
                const placeholder = category === 'all' ? 
                    'Search for tests, procedures, or conditions...' : 
                    `Search in ${category} tests...`;
                searchInput.placeholder = placeholder;
            }
        });
    });
}

// Filter tests by search term with enhanced functionality
function filterTests(searchTerm) {
    const activeCategory = document.querySelector('.filter-btn.active')?.dataset.category || 'all';
    
    filteredTests = testDatabase.filter(test => {
        const matchesSearch = !searchTerm || 
                            test.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                            test.description.toLowerCase().includes(searchTerm.toLowerCase()) ||
                            test.category.toLowerCase().includes(searchTerm.toLowerCase()) ||
                            test.features.some(feature => feature.toLowerCase().includes(searchTerm.toLowerCase()));
        
        const matchesCategory = activeCategory === 'all' || test.category === activeCategory;
        
        return matchesSearch && matchesCategory;
    });
    
    renderTestList();
    showSearchResultsCount(filteredTests.length);
}

// Filter tests by category
function filterTestsByCategory(category) {
    const searchTerm = document.getElementById('testSearch')?.value || '';
    filterTests(searchTerm);
}

// Render test list with modern design
function renderTestList() {
    const resultsContainer = document.getElementById('testResults');
    const noResultsContainer = document.getElementById('noResults');
    
    if (!resultsContainer) return;
    
    if (filteredTests.length === 0) {
        resultsContainer.innerHTML = '';
        if (noResultsContainer) {
            noResultsContainer.style.display = 'block';
            noResultsContainer.innerHTML = `
                <div class="text-center py-12">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-2xl font-semibold text-gray-600 mb-2">No tests found</h3>
                    <p class="text-gray-500">Try adjusting your search terms or filter criteria</p>
                    <button onclick="clearAllFilters()" class="mt-4 bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition-colors">
                        Clear All Filters
                    </button>
                </div>
            `;
        }
        return;
    }
    
    if (noResultsContainer) {
        noResultsContainer.style.display = 'none';
    }
    
    let html = '';
    filteredTests.forEach((test, index) => {
        const featuresHTML = test.features.map(feature => 
            `<span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mr-2 mb-2">${feature}</span>`
        ).join('');
        
        const categoryColors = {
            specialty: 'border-red-500',
            general: 'border-blue-500',
            blood: 'border-green-500',
            hormone: 'border-purple-500',
            infection: 'border-yellow-500'
        };
        
        html += `
            <div class="test-card bg-white rounded-2xl p-6 shadow-soft border-l-4 ${categoryColors[test.category] || 'border-gray-500'} mb-6 animate-fade-in" style="animation-delay: ${index * 100}ms">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4">
                    <div class="flex-1">
                        <div class="flex items-center mb-2">
                            <h3 class="text-xl font-bold text-slate-800 mr-3">${test.name}</h3>
                            <span class="inline-block bg-${getCategoryColor(test.category)}-100 text-${getCategoryColor(test.category)}-800 text-xs px-2 py-1 rounded-full capitalize">${test.category}</span>
                        </div>
                        <p class="text-slate-600 mb-4 leading-relaxed">${test.description}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            ${featuresHTML}
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-sm text-slate-500">
                            <div><strong>Duration:</strong> ${test.duration}</div>
                            <div><strong>Report:</strong> ${test.reportTime}</div>
                        </div>
                    </div>
                    <div class="mt-4 lg:mt-0 lg:ml-6 text-center">
                        <div class="text-3xl font-bold text-red-600 mb-2">Rs. ${test.price}</div>
                        <div class="space-y-3">
                            <a href="booking.html?test=${test.name.toLowerCase().replace(/\s+/g, '-')}" class="btn-primary-custom text-white px-6 py-3 rounded-full font-semibold inline-flex items-center w-full justify-center">
                                <i class="fas fa-calendar-plus mr-2"></i>
                                Book This Test
                            </a>
                            <button onclick="showTestDetailsModal(${test.id})" class="btn-secondary-custom text-white px-6 py-3 rounded-full font-semibold inline-flex items-center w-full justify-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                More Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
    
    resultsContainer.innerHTML = html;
}

// Get category color
function getCategoryColor(category) {
    const colors = {
        specialty: 'red',
        general: 'blue',
        blood: 'green',
        hormone: 'purple',
        infection: 'yellow'
    };
    return colors[category] || 'gray';
}

// Clear all filters
function clearAllFilters() {
    const searchInput = document.getElementById('testSearch');
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    if (searchInput) {
        searchInput.value = '';
    }
    
    filterButtons.forEach(btn => {
        btn.classList.remove('active', 'bg-red-600', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });
    
    // Activate 'all' filter
    const allBtn = document.querySelector('.filter-btn[data-category="all"]');
    if (allBtn) {
        allBtn.classList.add('active', 'bg-red-600', 'text-white');
        allBtn.classList.remove('bg-gray-200', 'text-gray-700');
    }
    
    filterTests('');
    hideSearchResultsCount();
}

// Initialize doctor profile page
function initializeDoctorProfilePage() {
    console.log('Doctor profile page initialized with modern design');
}

// Initialize contact page
function initializeContactPage() {
    console.log('Contact page initialized with enhanced features');
}

// Utility functions with enhanced features
function showAlert(message, type = 'info') {
    // Create modern alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm animate-fade-in`;
    
    const colors = {
        success: 'bg-green-500 text-white',
        danger: 'bg-red-500 text-white',
        warning: 'bg-yellow-500 text-black',
        info: 'bg-blue-500 text-white'
    };
    
    alertDiv.className += ` ${colors[type] || colors.info}`;
    alertDiv.innerHTML = `
        <div class="flex items-center justify-between">
            <span>${message}</span>
            <button onclick="this.parentNode.parentNode.remove()" class="ml-4 text-xl">&times;</button>
        </div>
    `;
    
    document.body.appendChild(alertDiv);
    
    // Auto-dismiss after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.classList.add('animate-fade-out');
            setTimeout(() => alertDiv.remove(), 300);
        }
    }, 5000);
}

// Format date for display
function formatDate(dateString) {
    if (!dateString) return 'Not selected';
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

// Format time for display
function formatTime(timeString) {
    if (!timeString) return 'Not selected';
    const [hours, minutes] = timeString.split(':');
    const hour = parseInt(hours);
    const ampm = hour >= 12 ? 'PM' : 'AM';
    const displayHour = hour % 12 || 12;
    return `${displayHour}:${minutes} ${ampm}`;
}

// Smooth scroll to element
function scrollToElement(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Initialize Google Map (placeholder)
function initMap() {
    console.log('Google Maps initialized with modern integration');
}

// Handle window resize with responsive adjustments
window.addEventListener('resize', function() {
    // Handle responsive adjustments
    const mobileMenu = document.getElementById('mobileMenu');
    if (window.innerWidth >= 1024 && mobileMenu && mobileMenu.classList.contains('active')) {
        mobileMenu.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
});

// Handle page visibility change
document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
        console.log('Page hidden - pause animations');
    } else {
        console.log('Page visible - resume animations');
    }
});

// Add CSS animations dynamically
const style = document.createElement('style');
style.textContent = `
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }
    
    .animate-fade-out {
        animation: fadeOut 0.3s ease-in forwards;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
`;
document.head.appendChild(style);

// Export functions for global access
window.nextStep = nextStep;
window.prevStep = prevStep;
window.showTestDetailsModal = showTestDetailsModal;
window.initMap = initMap;
window.clearAllFilters = clearAllFilters;