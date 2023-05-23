import route from "ziggy-js/src/js";
import AuthDisplay  from './AuthDisplay';
import {NavDropdown} from "react-bootstrap";
import {usePage} from "@inertiajs/react";

function Category() {

    return (
        <ul className="navbar-nav mx-auto">
            <li className="nav-item mx-2">
                <a href={ route('home') } className="nav-link fw-light">HOME</a>
            </li>
            <li className="nav-item mx-2">
                <a href={ route('products.index') } className="nav-link fw-light">PRODUCTS</a>
            </li>
            <li className="nav-item mx-2">
                <a href="#" className="nav-link fw-light">NEW</a>
            </li>
            <li className="nav-item mx-2">
                <NavDropdown title={ 'CATEGORY' } id="nav-category-dropdown" className="nav-link p-0 fw-light">
                    <NavDropdown.Item href={ route('products.index') } className="rounded-0">Cargo Pants</NavDropdown.Item>
                    <NavDropdown.Item href={ route('products.index') } className="rounded-0">Denim Jeans</NavDropdown.Item>
                </NavDropdown>
            </li>
            <li className="nav-item mx-2">
                <a href="#" className="nav-link fw-light">CONTACT</a>
            </li>
        </ul>
    );
}

function Navbar() {
    const { auth, orders, customer } = usePage().props;

    return (
        <nav className="navbar navbar-expand-lg py-3 bg-body-tertiary border-bottom">
            <div className="container-fluid">
                <a href="#" className="navbar-brand">
                    <img src="/resource/images/logo.png" alt="logo" style={{width: '50px'}} />
                    <span className="navbar-brand text-xl-center fw-bold mx-2">Delargo.ph</span>
                </a>
                <button className="navbar-toggler float-end border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i className="bi bi-list"></i>
                </button>
                <div className="collapse navbar-collapse" id="navbar-collapse">
                    <Navbar.Category auth={auth} />
                    <div className="d-flex align-items-center justify-content-between justify-content-lg-end mt-2 my-lg-0">
                        <div className="nav-item mx-lg-3">
                            <Navbar.AuthDisplay customer={customer} auth={auth} />
                        </div>
                        <div className="nav-item mx-lg-3">
                            <a href={
                                auth ? route('orders.index') : route('login')
                            } className="nav-link d-lg-none d-md-inline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-cart2" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg>
                                <span className="text-sm-start ms-2 ms-lg-0 fw-bold">
                                    VIEW CART
                                    <span className="badge bg-danger rounded-pill">
                                        { auth ? orders.length : 0 }
                                    </span>
                                </span>
                            </a>
                            <a href="#offcanvasCart" className="d-none d-lg-inline" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-cart2" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg>
                                <span className="position-absolute translate-middle badge rounded-pill bg-danger">
                                    { auth ? orders.length : 0}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    );
}

Navbar.Category = Category;
Navbar.AuthDisplay = AuthDisplay;

export default Navbar;
