import route from "ziggy-js/src/js";
import {Link} from "@inertiajs/react";
import {useState} from "react";
import {NavDropdown} from "react-bootstrap";

function AuthDisplay({ auth, customer }) {
    const [open, setOpen] = useState(false);

    if (auth) {
        return (
            <NavDropdown title={ customer.username } id="userDropdown" className="nav-link fw-light" show={open} onClick={() => setOpen(!open)} onMouseEnter={() => setOpen(true)}>
                <NavDropdown.Item href={ route('logout')} className="fw-light rounded-0">Logout</NavDropdown.Item>
            </NavDropdown>
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
