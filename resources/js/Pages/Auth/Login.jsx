import Main from "@/Pages/Layouts/Main";
import { useState } from "react";
import { router, usePage } from "@inertiajs/react";
import route from "ziggy-js/src/js";

function Login() {
    const { error } = usePage().props;
    const [wasValidated, setWasValidated] = useState(false);
    const [values, setValues] = useState({
        email: '',
        password: '',
        remember: false
    });

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.type === 'checkbox' ? e.target.checked : e.target.value;

        setValues((values) => ({
            ...values,
            [key]: value
        }));
    }

    function handleSubmit(e) {
        e.preventDefault();
        const form = e.currentTarget;

        if (!form.checkValidity()) {
            e.stopPropagation();
            setWasValidated(true);
            return;
        }

        router.post(route('login'), values);
    }

    return (
        <>
            <Main>
                <section className="h-100 py-5">
                    <div className="row justify-content-center">
                        <div className="col-md-10 col-lg-5">
                            <h5 className="mb-4">SIGN IN</h5>

                            {error && <div className="my-2 text-danger fw-bold">{error}</div>}

                            <form className={`needs-validation ${wasValidated ? 'was-validated' : ''}`} onSubmit={handleSubmit} noValidate>
                                <div className="form-group mb-3">
                                    <label htmlFor="email" className="form-label fw-bold">
                                        Email
                                    </label>
                                    <input type="email" id="email" name="email" className="form-control rounded-0" value={values.email} onChange={handleChange} required/>
                                    <div className="invalid-feedback">Please enter your email</div>
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="password" className="form-label fw-bold">
                                        Password
                                    </label>
                                    <input type="password" id="password" name="password" className="form-control rounded-0" value={values.password} onChange={handleChange} required />
                                    <div className="invalid-feedback">Please enter your password</div>
                                </div>
                                <div className="form-group mb-3">
                                    <button type="submit" id="submit" name="submit" className="btn btn-outline-dark rounded-0 w-100 px-3">
                                        Log in
                                    </button>
                                </div>
                                <div className="d-flex mb-3">
                                    <div className="col form-check">
                                        <input className="form-check-input" type="checkbox" value={values.remember ? "checked" : ""} id="remember" onChange={handleChange}/>
                                        <label className="form-check-label" htmlFor="remember">
                                            Remember me?
                                        </label>
                                    </div>
                                    <div className="col text-end">
                                        <a href="#" className="text-decoration-none">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <p className="text-center">
                                Don't have account?
                                <a href={ route('register') } className="text-decoration-none link-info">
                                    Sign Up
                                </a>
                            </p>
                        </div>
                    </div>
                </section>
            </Main>
        </>
    )
}

export default Login;
