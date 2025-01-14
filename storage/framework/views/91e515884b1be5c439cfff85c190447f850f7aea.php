<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'E-commerce'); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #dbeafe;
            --transition-speed: 0.3s;
        }
        
        /* Global Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* Navbar Styling with Animations */
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 0;
            background-color: white !important;
            animation: slideInDown 0.5s ease-out;
            transition: all var(--transition-speed) ease;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .navbar-brand:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width var(--transition-speed) ease;
        }

        .navbar-brand:hover:after {
            width: 100%;
        }
        
        .nav-link {
            font-weight: 500;
            color: #374151 !important;
            transition: all var(--transition-speed) ease;
            padding: 0.5rem 1rem !important;
            position: relative;
        }
        
        .nav-link:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: all var(--transition-speed) ease;
            transform: translateX(-50%);
        }

        .nav-link:hover:before {
            width: 80%;
        }
        
        .cart-btn {
            background-color: var(--accent-color);
            color: var(--primary-color);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all var(--transition-speed) ease;
            position: relative;
            overflow: hidden;
        }
        
        .cart-btn:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .cart-btn .badge {
            transition: all var(--transition-speed) ease;
        }

        .cart-btn:hover .badge {
            animation: pulse 1s infinite;
        }
        
        /* Content Area */
        .content-wrapper {
            min-height: calc(100vh - 300px);
            padding: 2rem 0;
            animation: fadeIn 1s ease-out;
        }
        
        /* Product Card Animations */
        .product-card {
            transition: all var(--transition-speed) ease;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .product-card img {
            transition: all var(--transition-speed) ease;
        }

        .product-card:hover img {
            transform: scale(1.1);
        }

        /* Footer Styling with Animations */
        .footer {
            background-color: #1f2937;
            color: #f3f4f6;
            padding: 4rem 0 2rem;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }
        
        .footer h5 {
            color: white;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .footer h5:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--primary-color);
        }
        
        .footer-link {
            color: #d1d5db !important;
            text-decoration: none;
            transition: all var(--transition-speed) ease;
            display: block;
            margin-bottom: 0.75rem;
            position: relative;
            padding-left: 15px;
        }

        .footer-link:before {
            content: '→';
            position: absolute;
            left: 0;
            opacity: 0;
            transition: all var(--transition-speed) ease;
        }
        
        .footer-link:hover {
            color: white !important;
            padding-left: 20px;
        }

        .footer-link:hover:before {
            opacity: 1;
        }
        
        .social-links {
            margin-top: 1.5rem;
        }
        
        .social-link {
            color: #d1d5db;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: all var(--transition-speed) ease;
            display: inline-block;
        }
        
        .social-link:hover {
            color: white;
            transform: translateY(-5px) rotate(8deg);
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            animation: fadeOut 0.5s ease-out 1s forwards;
        }

        @keyframes fadeOut {
            to { opacity: 0; visibility: hidden; }
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid var(--accent-color);
            border-top-color: var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.5rem 0;
            }
            
            .footer {
                padding: 2rem 0;
            }
            
            .footer-section {
                margin-bottom: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Loading Animation -->
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/" data-aos="fade-right">
            <i class="fas fa-store me-2"></i>Brownies Gacor
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item" data-aos="fade-down" data-aos-delay="100">
                    <a class="nav-link" href="/"><i class="fas fa-home me-1"></i> Home</a>
                </li>
                <li class="nav-item" data-aos="fade-down" data-aos-delay="200">
                    <a class="nav-link" href="/products"><i class="fas fa-box me-1"></i> Products</a>
                </li>
                
            </ul>
            <div class="d-flex align-items-center" data-aos="fade-left">
                <a href="<?php echo e(route('beli.index')); ?>" class="cart-btn me-3">
                    <i class="fas fa-shopping-cart me-2"></i>Cart
                    <?php if(auth()->guard()->check()): ?>
                        <span class="badge bg-primary ms-1"><?php echo e(\App\Models\Cart::where('user_id', auth()->id())->sum('quantity')); ?></span>
                    <?php else: ?>
                        <span class="badge bg-primary ms-1">0</span>
                    <?php endif; ?>
                </a>
                <?php if(auth()->guard()->check()): ?>
                    <!-- Add user menu/logout here -->
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </form>
                <?php else: ?>
                    <a href="/login2" class="btn btn-outline-primary me-2">
                        <i class="fas fa-sign-in-alt me-1"></i> Login
                    </a>
                    <a href="/register2" class="btn btn-primary">
                        <i class="fas fa-user-plus me-1"></i> Register
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

    <!-- Content -->
    <div class="content-wrapper">
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-section" data-aos="fade-up">
                    <h5>
                        <i class="fas fa-store me-2"></i>Brownies Gacor
                    </h5>
                    <p>Find brownie products at the best prices here!.</p>
                    <div class="social-links">
                    <a href="https://www.facebook.com/" class="social-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
<a href="https://www.instagram.com/riogandhoz/" class="social-link" target="_blank"><i class="fab fa-instagram"></i></a>
<a href="https://x.com/i/flow/login?lang=fi/" class="social-link" target="_blank"><i class="fab fa-twitter"></i></a>

                    </div>
                </div>
                <div class="col-md-4 footer-section" data-aos="fade-up" data-aos-delay="100">
                    <h5>Quick Links</h5>
                    <a href="/about" class="footer-link">About Us</a>
                    <a href="/contact" class="footer-link">Contact</a>
                    <a href="/faq" class="footer-link">FAQ</a>
                    <a href="/privacy" class="footer-link">Privacy Policy</a>
                    <a href="/terms" class="footer-link">Terms & Conditions</a>
                </div>
                <div class="col-md-4 footer-section" data-aos="fade-up" data-aos-delay="200">
                    <h5>Contact Us</h5>
                    <p class="footer-contact">
                        <i class="fas fa-envelope me-2"></i>info@Brownies Gacor.com
                    </p>
                    <p class="footer-contact">
                        <i class="fas fa-phone me-2"></i>(123) 456-7890
                    </p>
                    <p class="footer-contact">
                        <i class="fas fa-map-marker-alt me-2"></i>123 Sleman,
                        <br>Yogyakarta, Indonesia
                    </p>
                </div>
            </div>
            <hr class="mt-4 mb-3 border-gray-600">
            <div class="text-center">
                <p class="mb-0">&copy; 2030 Brownies Gacor. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Handle add to cart form submissions
            const forms = document.querySelectorAll('.add-to-cart-form');
            forms.forEach(form => {
                form.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    try {
                        const response = await fetch(this.action, {
                            method: 'POST',
                            body: new FormData(this),
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                            }
                        });
                        
                        if (response.ok) {
                            // Update cart count
                            const cartCount = document.querySelector('.cart-btn .badge');
                            const currentCount = parseInt(cartCount.textContent);
                            cartCount.textContent = currentCount + 1;
                            
                            // Show success message
                            const button = this.querySelector('button');
                            const originalText = button.innerHTML;
                            button.innerHTML = '<i class="fas fa-check me-2"></i>Added to Cart';
                            button.classList.add('btn-success');
                            
                            setTimeout(() => {
                                button.innerHTML = originalText;
                                button.classList.remove('btn-success');
                            }, 1500);
                        } else {
                            // Handle server error
                            alert('Failed to add item to cart.');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php /**PATH D:\Rio\ecommers\resources\views/layouts/main.blade.php ENDPATH**/ ?>