class SpecialHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <header class="section-header">
            <section class="header-main shadow-sm bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <a href="home.html" class="brand-wrap mb-0">
                                <img alt="#" class="img-fluid" src="img/logo.png" />
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
                                <a href="offers.html" class="widget-header me-4 text-white btn bg-primary m-none">
                                    <div class="icon d-flex align-items-center">
                                        <i class="feather-disc h6 me-2 mb-0"></i>
                                        <span>Offers</span>
                                    </div>
                                </a>
                                <a href="login.html" class="widget-header me-4 text-dark m-none">
                                    <div class="icon d-flex align-items-center">
                                        <i class="feather-user h6 me-2 mb-0"></i>
                                        <span>Sign in</span>
                                    </div>
                                </a>
                                <div class="dropdown me-4 m-none">
                                    <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img alt="#" src="img/user/1.jpg" class="img-fluid rounded-circle header-user me-2 header-user" />
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

customElements.define('special-header', SpecialHeader);
