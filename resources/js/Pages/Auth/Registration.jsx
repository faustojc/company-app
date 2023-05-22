import {useState} from "react";
import {router, usePage} from "@inertiajs/react";
import route from "ziggy-js/src/js";
import Main from "@/Pages/Layouts/Main";

function Registration() {
    const { errors } = usePage().props;

    const regions = [
        'Ilocos (Region I)',
        'Cagayan Valley (Region II)',
        'Central Luzon (Region III)',
        'Calabarzon (Region IV-A)',
        'Mimaropa (Region IV-B)',
        'Bicol Region (Region V)',
        'Western Visayas (Region VI)',
        'Central Visayas (Region VII)',
        'Eastern Visayas (Region VIII)',
        'Zamboanga Peninsula (Region IX)',
        'Northern Mindanao (Region X)',
        'Davao Region (Region XI)',
        'Soccsksargen (Region XII)',
        'Caraga (Region XIII)',
        'Cordillera Administrative Region (CAR)',
        'Autonomous Region in Muslim Mindanao (ARMM)',
        'National Capital Region (NCR)',
    ];

    const [values, setValues] = useState({
        firstname: '',
        lastname: '',
        username: '',
        email: '',
        sex: 'male',
        password: '',
        address: '',
        region: regions[0],
    });

    const [wasValidated, setWasValidated] = useState(false);

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value;

        setValues((values) => ({
            ...values,
            [key]: value,
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

        router.post(route('register'), values);
    }

    return (
        <>
            <Main>
                <section className="h-100 py-5">
                    <div className="row justify-content-center">
                        <div className="col-md-10 col-lg-5">
                            <h5 className="mb-4">SIGN UP</h5>
                            <form className={`row g-3 mb-3 needs-validation ${wasValidated ? 'was-validated' : ''}`} onSubmit={handleSubmit} noValidate>
                                <div className="col-lg-6">
                                    <label htmlFor="firstname" className="form-label">First Name</label>
                                    <input type="text" id="firstname" name="firstname" className="form-control rounded-0" value={values.firstname} onChange={handleChange} required />
                                    <div className="invalid-feedback">Please enter your first name</div>
                                </div>
                                <div className="col-lg-6">
                                    <label htmlFor="lastname" className="form-label">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" className="form-control rounded-0" value={values.lastname} onChange={handleChange} required />
                                    <div className="invalid-feedback">Please enter your last name</div>
                                </div>
                                <div className="col-12">
                                    <label htmlFor="username" className="form-label">Username</label>
                                    <input type="text" id="username" name="username" className={`form-control rounded-0 ${errors.username ? 'is-invalid' : ''}`} value={values.username} onChange={handleChange} required/>
                                    <div className="invalid-feedback">Please enter your username</div>
                                </div>
                                <div className="col-12">
                                    <label htmlFor="email" className="form-label">Email Address</label>
                                    <input type="email" id="email" name="email" className={`form-control rounded-0 ${errors.email ? 'is-invalid' : ''}`} value={values.email} onChange={handleChange} required />
                                    <div className="invalid-feedback">Please enter your email address</div>
                                </div>
                                <div className="col-lg-6">
                                    <label htmlFor="sex" className="form-label">Sex</label>
                                    <select className="form-select rounded-0" id="sex" name="sex" aria-label="Select sex" value={values.sex} onChange={handleChange}>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div className="col-lg-6">
                                    <label htmlFor="password" className="form-label">Password</label>
                                    <input type="password" id="password" name="password" className="form-control rounded-0" value={values.password} onChange={handleChange} required />
                                    <div className="invalid-feedback">Please enter your password</div>
                                </div>
                                <div className="col-12">
                                    <label htmlFor="address" className="form-label">Address</label>
                                    <input type="text" id="address" name="address" className="form-control rounded-0" value={values.address} onChange={handleChange} required />
                                    <div className="invalid-feedback">Please enter your address</div>
                                </div>
                                <div className="col-lg-6">
                                    <label htmlFor="region" className="form-label">Region</label>
                                    <select className="form-select rounded-0" id="region" name="region" aria-label="Select region" value={values.region} onChange={handleChange}>
                                        {regions.map((region) => (
                                            <option key={region} value={region}>{region}</option>
                                        ))}
                                    </select>
                                </div>
                                <div className="col-12">
                                    <button type="submit" className="btn btn-primary rounded-0">Sign up</button>
                                </div>
                            </form>
                            <p className="text-center">
                                Already have account?
                                <a href={ route('login') } className="text-decoration-none link-info">Sign in</a>
                            </p>
                        </div>
                    </div>
                </section>
            </Main>
        </>
    )
}

export default Registration;
