import {Head, Link, router} from "@inertiajs/react";
import route from "ziggy-js/src/js";
import Navbar from "@/Components/Navbar";
import OffcanvasOrders from "@/Components/OffcanvasOrders";

function Form({ product }) {

    function handleSubmit(e) {
        e.preventDefault();

        router.post(route('orders.store', {'product': product.product_id}), new FormData(e.target));
    }

    return (
        <form onSubmit={handleSubmit} className="d-flex">
            <div className="mb-3">
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="99" className="form-control rounded-0 px-2 py-1" />
            </div>
            <div className="mb-3 ms-3">
                <button className="btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1" type="submit" name="submit">
                    <span className="bi bi-cart me-2"></span>
                    Add to Cart
                </button>
            </div>
        </form>
    );
}

function Info({ product }) {
    return (
        <div className="row flex-wrap justify-content-between g-2">
            <div className="col d-flex justify-content-center">
                <img src={ product.filepath + product.filename } className="img-fluid w-75" alt=""/>
            </div>
            <div className="col-lg-6 pt-lg-0 pt-4 d-flex flex-column position-sticky">
                <div className="mb-4">
                    <p className="text-uppercase m-0 sub-title">{ product.category }</p>
                </div>
                <div className="mb-2">
                    <h1 className="fw-bolder text-body">{ product.name }</h1>
                </div>
                <div className="mb-2">
                    <h4 className="fw-bold">P{ parseFloat(product.price).toFixed(2) }</h4>
                </div>
                <div className="mb-3">
                    <p>{ product.description }</p>
                </div>
                <div className="text-muted">
                    <p>Flaws: { product.flaw }</p>
                </div>
                <hr />

                <Show.Form product={ product } />

            </div>
        </div>
    );
}

function Related({ related }) {
    return (
        <div className="card rounded-0 mx-2 mb-4" style={{width: '19rem'}}>
            <Link href={ route('products.show', [related.product_id]) }>
                <img src={ related.filepath + related.filename } className="card-img-top mb-2" alt={ related.name }/>
            </Link>
            <div className="card-body">
                <p className="card-title text-uppercase m-0 sub-title">{ related.category }</p>
                <p className="fw-bold text-body product-name text-decoration-none">
                    { related.name }
                </p>
                <p className="text-success sub-title">P { parseFloat(related.price).toFixed(2) } </p>
                <Link href={ route('products.show', [related.product_id]) } className="btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1">
                    <span className="bi bi-cart me-2"></span>
                    Add to Cart
                </Link>
            </div>
        </div>
    );
}

function Show({ product, relatedProducts }) {

    return (
        <>
            <Head>
                <title>{ product.name }</title>
            </Head>

            <Navbar />
            <OffcanvasOrders />

            <div className="container-fluid">
                <section className="w-100 p-5">
                    <Show.Info product={ product } />
                </section>
                <section className="pt-5 w-100">
                    <div className="container">
                        <div className="row mb-5">
                            <div className="col-12 text-center">
                                <h4 className="title">Related Products</h4>
                            </div>
                            <div className="d-flex flex-wrap justify-content-center pt-5">

                                {relatedProducts.map(related =>
                                    <div key={ related.product_id }>
                                        <Show.Related related={ related } />
                                    </div>
                                )}

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </>
    );
}

Show.Form = Form;
Show.Info = Info;
Show.Related = Related;

export default Show;
