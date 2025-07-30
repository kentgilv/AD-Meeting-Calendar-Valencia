<header>
    <nav role="navigation" aria-label="Main Navigation">
        <div class="navbar-brand">
            <a href="/" title="Brand Logo">
                <img class="brand-logo" src="/assets/img/logo.png" height="40" alt="Baxcalibur Logo" />
            </a>
            <a class="brand-name" href="/" title="Brand Name">Meeting Calendar</a>
        </div>

        <div class="toggle-menu">
            <button id="toggleMenuBtn" class="toggle-menu-btn" onclick="toggleMenu()" title="Toggle Navigation"
                aria-controls="navbarLinks" aria-expanded="false">
                <span id="toggleIcon" class="material-icons">menu</span>
            </button>
        </div>

        <div>
            <ul id="navbarLinks" class="navbar-links">
                <li><a class="active-link" href="/" title="View Homepage">Home</a></li>
                <li><a id="loginBtnLink" href="/login" title="Log In to Your Account">Log
                        In</a>
                </li>
                <li><a id="signUpBtnLink" href="/signup" title="Create New Account">Sign
                        Up</a>
                </li>
            </ul>
        </div>
    </nav>
</header>