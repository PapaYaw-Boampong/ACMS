export function insertNavMenu(selector) {
    const navHtml = `
      <ul class="second-nav">
        <li>
            <a href="home.html"><i class="feather-home me-2"></i> Homepage</a>
        </li>
        <li>
            <a href="my_order.html"><i class="feather-list me-2"></i> My Orders</a>
        </li>
        <li>
            <a href="favorites.html"><i class="feather-heart me-2"></i> Favorites</a>
        </li>
        <li>
            <a href="trending.html"><i class="feather-trending-up me-2"></i> Trending</a>
        </li>
        <li>
            <a href="most_popular.html"><i class="feather-award me-2"></i> Most Popular</a>
        </li>
        <li>
            <a href="restaurant.html"><i class="feather-paperclip me-2"></i> Restaurant Detail</a>
        </li>
        <li>
            <a href="checkout.html"><i class="feather-list me-2"></i> Checkout</a>
        </li>
        <li>
            <a href="#"><i class="feather-user me-2"></i> Profile</a>
        </li>
      </ul>
      <ul class="bottom-nav">
        <li class="email">
            <a class="text-danger" href="home.html">
                <p class="h5 m-0"><i class="feather-home text-danger"></i></p>
                Home
            </a>
        </li>
        <li class="github">
            <a href="faq.html">
                <p class="h5 m-0"><i class="feather-message-circle"></i></p>
                FAQ
            </a>
        </li>
        <li class="ko-fi">
            <a href="contact-us.html">
                <p class="h5 m-0"><i class="feather-phone"></i></p>
                Help
            </a>
        </li>
      </ul>
    `;
    const container = document.querySelector(selector);
    if (container) {
        container.innerHTML = navHtml;
    } else {
        console.error(`Selector ${selector} not found.`);
    }
}
