import Navbar from "@/Components/Navbar";
import OffcanvasOrders from "@/Components/OffcanvasOrders";
import Footer from "@/Components/Footer";
import {Head, Link} from "@inertiajs/react";
import route from "ziggy-js/src/js";

function List({ products }) {

    return (
        <>
            <Head>
                <title>Products</title>
            </Head>

            <Navbar />
            <OffcanvasOrders />

            <div className="container-fluid">
                <div className="d-flex flex-wrap justify-content-center pt-5">
                    {/* Display all the products */}
                    {products.map((product) => (
                        <div key={ product.product_id } className="card rounded-0 mx-2 mb-4" style={{ width: '19rem' }}>
                            <Link href={ route('products.show', [product.product_id]) }>
                                <img src={product.filepath + product.filename} className="card-img-top mb-2" alt={ product.name } />
                            </Link>
                            <div className="card-body">
                                <p className="card-title text-uppercase m-0 sub-title">{ product.category }</p>
                                <Link href={ route('products.show', [product.product_id]) } className="fw-bold text-body product-name text-decoration-none">
                                    {product.name}
                                </Link>
                                <p className="text-success sub-title">P { parseFloat(product.price).toFixed(2) }</p>
                                <Link href={ route('products.show', [product.product_id]) } className="btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1">
                                    <span className="bi bi-cart me-2"></span>
                                    Add to Cart
                                </Link>
                            </div>
                        </div>
                    ))}
                </div>
            </div>

            <Footer />
        </>
    )
}

export default List;
