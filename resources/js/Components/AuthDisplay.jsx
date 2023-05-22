import route from "ziggy-js/src/js";
import {Link, router} from "@inertiajs/react";

function AuthDisplay({ username }) {
    if (username) {
        return (
            <div className="dropdown">
                <a href="#userDropdown" className="nav-link" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                    <span className="text-sm-start ms-2 ms-lg-0 fw-bold"> { username } </span>
                    <div className="dropdown-menu dropdown-menu-lg-end rounded-0"
                         aria-labelledby="userDropdown">
                        <a href={ route('logout') } className="dropdown-item">Logout</a>
                    </div>
                </a>
            </div>
        );
    }
    else {
        return (
            <Link href={ route('login') } className="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
                <span className="text-sm-start ms-2 ms-lg-0 fw-bold d-md-inline d-lg-none">LOG IN</span>
            </Link>
        );
    }
}

export default AuthDisplay;
