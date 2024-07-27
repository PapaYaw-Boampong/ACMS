class SpecialHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <header class="section-header">
            <section class="header-main shadow-sm bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <a href="home.php" class="brand-wrap mb-0">
                                <img alt="#" class="img-fluid" src="../img/logo.png" />
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="search.html" class="widget-header me-4 text-dark">
                                    <div class="icon d-flex align-items-center">
                                        <i class="feather-search h6 me-2 mb-0"></i>
                                        <span>Search</span>
                                    </div>
                                </a>
                                <a href="login.php" class="widget-header me-4 text-dark m-none">
                                    <div class="icon d-flex align-items-center">
                                        <i class="feather-user h6 me-2 mb-0"></i>
                                        <span>Sign in</span>
                                    </div>
                                </a>
                                <div class="dropdown me-4 m-none">
                                    <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img alt="#" src="../img/user/1.jpg" class="img-fluid rounded-circle header-user me-2 header-user" />
                                        Hi Osahan
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="profile.html">My account</a>
                                        <a class="dropdown-item" href="contact-us.html">Contact us</a>
                                        <a class="dropdown-item" href="terms.html">Term of use</a>
                                        <a class="dropdown-item" href="login.html">Logout</a>
                                    </div>
                                </div>
                                <a href="checkout.html" class="widget-header me-4 text-dark">
                                    <div class="icon d-flex align-items-center">
                                        <i class="feather-shopping-cart h6 me-2 mb-0"></i>
                                        <span>Cart</span>
                                    </div>
                                </a>
                                <a class="toggle" href="#">
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        `;
    }
}

class SpecialFooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <footer class="section-footer border-top bg-dark">
            <div class="container">
                <div class="footer-top padding-y py-5">
                <div class="row">
                    <aside class="col-md-4 footer-about">
                    <article class="d-flex pb-3">
                        <div>
                        <img
                            alt="#"
                            src="../img/logo.png"
                            class="logo-footer me-3"
                        />
                        </div>
                        <div>
                        <h6 class="title text-white">About Us</h6>
                        <p class="text-muted">
                            Ashesi Eats aims to connect the Ashesi community with their favorite meals in the most convenient way possible.
                        </p>
                        <div class="d-flex align-items-center">
                            <a
                            class="btn btn-icon btn-outline-light me-1 btn-sm"
                            title="Facebook"
                            target="_blank"
                            href="#"
                            ><i class="feather-facebook"></i
                            ></a>
                            <a
                            class="btn btn-icon btn-outline-light me-1 btn-sm"
                            title="Instagram"
                            target="_blank"
                            href="#"
                            ><i class="feather-instagram"></i
                            ></a>
                            <a
                            class="btn btn-icon btn-outline-light me-1 btn-sm"
                            title="Youtube"
                            target="_blank"
                            href="#"
                            ><i class="feather-youtube"></i
                            ></a>
                            <a
                            class="btn btn-icon btn-outline-light me-1 btn-sm"
                            title="Twitter"
                            target="_blank"
                            href="#"
                            ><i class="feather-twitter"></i
                            ></a>
                        </div>
                        </div>
                    </article>
                    </aside>
                    <aside class="col-sm-3 col-md-2 text-white">
                    <h6 class="title">Error Pages</h6>
                    <ul class="list-unstyled hov_footer">
                        <li>
                        <a href="not-found.html" class="text-muted">Not found</a>
                        </li>
                        <li>
                        <a href="maintence.html" class="text-muted">Maintence</a>
                        </li>
                        <li>
                        <a href="coming-soon.html" class="text-muted">Coming Soon</a>
                        </li>
                    </ul>
                    </aside>
                    <aside class="col-sm-3 col-md-2 text-white">
                    <h6 class="title">Services</h6>
                    <ul class="list-unstyled hov_footer">
                        <li>
                        <a href="faq.html" class="text-muted">Delivery Support</a>
                        </li>
                        <li>
                        <a href="contact-us.html" class="text-muted">Contact Us</a>
                        </li>
                        <li>
                        <a href="terms.html" class="text-muted">Terms of use</a>
                        </li>
                        <li>
                        <a href="privacy.html" class="text-muted">Privacy policy</a>
                        </li>
                    </ul>
                    </aside>
                    <aside class="col-sm-3 col-md-2 text-white">
                    <h6 class="title">For users</h6>
                    <ul class="list-unstyled hov_footer">
                        <li>
                        <a href="login.html" class="text-muted"> User Login </a>
                        </li>
                        <li>
                        <a href="signup.html" class="text-muted"> User register </a>
                        </li>
                        <li>
                        <a href="forgot_password.html" class="text-muted">
                            Forgot Password
                        </a>
                        </li>
                        <li>
                        <a href="profile.html" class="text-muted">
                            Account Setting
                        </a>
                        </li>
                    </ul>
                    </aside>
                    <aside class="col-sm-3 col-md-2 text-white">
                    <h6 class="title">More Pages</h6>
                    <ul class="list-unstyled hov_footer">
                        <li>
                        <a href="trending.html" class="text-muted"> Trending </a>
                        </li>
                        <li>
                        <a href="most_popular.html" class="text-muted">
                            Most popular
                        </a>
                        </li>
                        <li>
                        <a href="restaurant.html" class="text-muted">
                            Restaurant Details
                        </a>
                        </li>
                        <li>
                        <a href="favorites.html" class="text-muted"> Favorites </a>
                        </li>
                    </ul>
                    </aside>
                </div>
                </div>
            </div>

            <div class="footer-copyright border-top py-3 bg-light">
                <div class="container d-flex align-items-center">
                <p class="mb-0">© CAPD (2024) All rights reserved</p>
                </div>
            </div>
        </footer>
        `;
    }
}

customElements.define('special-header', SpecialHeader);
customElements.define('special-footer', SpecialFooter);
